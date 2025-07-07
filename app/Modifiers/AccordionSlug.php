<?php

namespace App\Modifiers;

use Statamic\Modifiers\Modifier;
use Statamic\Facades\Entry;
use Illuminate\Support\Str;

class AccordionSlug extends Modifier
{
    public function index($value, $params, $context)
    {
        if (empty($value) || empty($params)) {
            return null;
        }

        $pageSlug = $value; // e.g., "diskurs"
        $accordionTitle = $params[0]; // e.g., "Pressespiegel"
        $targetLocale = $params[1] ?? 'de'; // target locale, defaults to 'de'
        
        // Find the page entry by slug
        $entries = Entry::query()
            ->where('collection', 'pages')
            ->where('slug', $pageSlug)
            ->get();
        
        if ($entries->isEmpty()) {
            return null;
        }
        
        $sourceEntry = $entries->first();
        
        // Get the target entry (could be same entry or its translation)
        $targetEntry = $this->getTargetEntry($sourceEntry, $targetLocale);
        
        if (!$targetEntry) {
            return null;
        }
        
        // Find the accordion title in the target entry's content
        $accordionElements = $targetEntry->get('page_elements', []);
        
        foreach ($accordionElements as $element) {
            if ($element['type'] === 'accordion' && isset($element['accordion_elements'])) {
                foreach ($element['accordion_elements'] as $accordionElement) {
                    if (isset($accordionElement['accordion_title'])) {
                        $title = $accordionElement['accordion_title'];
                        
                        // Check if this matches our source accordion title (case-insensitive)
                        if (strtolower(trim($title)) === strtolower(trim($accordionTitle))) {
                            return 'item-' . Str::slug($title);
                        }
                        
                        // If we're looking for a translation, check if the German title matches
                        if ($targetLocale !== 'de' && $this->isGermanTitleMatch($accordionTitle, $title)) {
                            return 'item-' . Str::slug($title);
                        }
                    }
                }
            }
        }
        
        return null;
    }
    
    private function getTargetEntry($sourceEntry, $targetLocale)
    {
        // If already in target locale, return as is
        if ($sourceEntry->locale() === $targetLocale) {
            return $sourceEntry;
        }
        
        // Find translated version
        if ($sourceEntry->hasOrigin()) {
            // This is a translation, get the origin first
            $originEntry = $sourceEntry->origin();
            if ($originEntry->locale() === $targetLocale) {
                return $originEntry;
            }
            
            // Look for other translations
            $translations = Entry::query()
                ->where('collection', 'pages')
                ->where('origin', $originEntry->id())
                ->where('locale', $targetLocale)
                ->get();
                
            return $translations->first();
        } else {
            // This is the origin, find its translation
            $translations = Entry::query()
                ->where('collection', 'pages')
                ->where('origin', $sourceEntry->id())
                ->where('locale', $targetLocale)
                ->get();
                
            return $translations->first();
        }
    }
    
    private function isGermanTitleMatch($germanTitle, $translatedTitle)
    {
        // Simple mapping for known accordion titles
        $mappings = [
            'Pressespiegel' => ['Press reviews', 'press reviews'],
            'Publikationen und Vorträge' => ['Publications and lectures', 'publications and lectures'],
            'Hausbibliothek' => ['In-house library', 'in-house library'],
        ];
        
        if (isset($mappings[$germanTitle])) {
            return in_array(strtolower(trim($translatedTitle)), array_map('strtolower', $mappings[$germanTitle]));
        }
        
        return false;
    }
}