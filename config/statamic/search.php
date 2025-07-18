<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Default search index
  |--------------------------------------------------------------------------
  |
  | This option controls the search index that gets queried when performing
  | search functions without explicitly selecting another index.
  |
  */

  'default' => env('STATAMIC_DEFAULT_SEARCH_INDEX', 'default'),

  /*
  |--------------------------------------------------------------------------
  | Search Indexes
  |--------------------------------------------------------------------------
  |
  | Here you can define all of the available search indexes.
  |
  */

  'indexes' => [

    'default' => [
      'driver' => 'local',
      'sites' => ['de', 'en'],
      'searchables' => ['collection:pages'],
      'filter' => function ($item) {
        return $item->status() === 'published' && ! $item->exclude_from_search;
      },
      'fields' => [
        'title',
        'description',
        'content',
        'searchable_content',
      ],
      'stop_words' => [
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'but', 'by', 'for',
        'if', 'in', 'into', 'is', 'it', 'no', 'not', 'of', 'on', 'or',
        'such', 'that', 'the', 'their', 'then', 'there', 'these', 'they',
        'this', 'to', 'was', 'will', 'with',
        'aber', 'alle', 'allem', 'allen', 'aller', 'alles', 'als', 'also', 'am',
        'an', 'ander', 'andere', 'anderem', 'anderen', 'anderer', 'anderes',
        'anderm', 'andern', 'anderr', 'anders', 'auch', 'auf', 'aus', 'bei',
        'bin', 'bis', 'bist', 'da', 'damit', 'dann', 'der', 'den', 'des', 'dem',
        'die', 'das', 'daß', 'derselbe', 'derselben', 'denselben', 'desselben',
        'demselben', 'dieselbe', 'dieselben', 'dasselbe', 'dazu', 'dein', 'deine',
        'deinem', 'deinen', 'deiner', 'deines', 'denn', 'derer', 'dessen', 'dich',
        'dir', 'du', 'dies', 'diese', 'diesem', 'diesen', 'dieser', 'dieses',
        'doch', 'dort', 'durch', 'ein', 'eine', 'einem', 'einen', 'einer', 'eines',
        'einig', 'einige', 'einigem', 'einigen', 'einiger', 'einiges', 'einmal',
        'er', 'ihn', 'ihm', 'es', 'etwas', 'euer', 'eure', 'eurem', 'euren',
        'eurer', 'eures', 'für', 'gegen', 'gewesen', 'hab', 'habe', 'haben',
        'hat', 'hatte', 'hatten', 'hier', 'hin', 'hinter', 'ich', 'mich', 'mir',
        'ihr', 'ihre', 'ihrem', 'ihren', 'ihrer', 'ihres', 'euch', 'im', 'in',
        'indem', 'ins', 'ist', 'jede', 'jedem', 'jeden', 'jeder', 'jedes', 'jener',
        'jenem', 'jenen', 'jener', 'jenes', 'jetzt', 'kann', 'kein', 'keine',
        'keinem', 'keinen', 'keiner', 'keines', 'können', 'könnte', 'machen',
        'man', 'manche', 'manchem', 'manchen', 'mancher', 'manches', 'mein',
        'meine', 'meinem', 'meinen', 'meiner', 'meines', 'mit', 'muss', 'musste',
        'nach', 'nicht', 'nichts', 'noch', 'nun', 'nur', 'ob', 'oder', 'ohne',
        'sehr', 'sein', 'seine', 'seinem', 'seinen', 'seiner', 'seines', 'selbst',
        'sich', 'sie', 'ihnen', 'sind', 'so', 'solche', 'solchem', 'solchen',
        'solcher', 'solches', 'soll', 'sollte', 'sondern', 'sonst', 'über',
        'um', 'und', 'uns', 'unse', 'unsem', 'unsen', 'unser', 'unses', 'unter',
        'viel', 'vom', 'von', 'vor', 'während', 'war', 'waren', 'warst', 'was',
        'weg', 'weil', 'weiter', 'welche', 'welchem', 'welchen', 'welcher',
        'welches', 'wenn', 'werde', 'werden', 'wie', 'wieder', 'will', 'wir',
        'wird', 'wirst', 'wo', 'wollen', 'wollte', 'würde', 'würden', 'zu',
        'zum', 'zur', 'zwar', 'zwischen'
      ]
    ],

    'press_reviews' => [
      'driver' => 'local',
      'searchables' => 'collection:press_reviews',
      'fields' => [
        'title', 
        'description', 
        'tags'
      ],
      'stop_words' => [
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'but', 'by', 'for',
        'if', 'in', 'into', 'is', 'it', 'no', 'not', 'of', 'on', 'or',
        'such', 'that', 'the', 'their', 'then', 'there', 'these', 'they',
        'this', 'to', 'was', 'will', 'with',
        'aber', 'alle', 'allem', 'allen', 'aller', 'alles', 'als', 'also', 'am',
        'an', 'ander', 'andere', 'anderem', 'anderen', 'anderer', 'anderes',
        'anderm', 'andern', 'anderr', 'anders', 'auch', 'auf', 'aus', 'bei',
        'bin', 'bis', 'bist', 'da', 'damit', 'dann', 'der', 'den', 'des', 'dem',
        'die', 'das', 'daß', 'derselbe', 'derselben', 'denselben', 'desselben',
        'demselben', 'dieselbe', 'dieselben', 'dasselbe', 'dazu', 'dein', 'deine',
        'deinem', 'deinen', 'deiner', 'deines', 'denn', 'derer', 'dessen', 'dich',
        'dir', 'du', 'dies', 'diese', 'diesem', 'diesen', 'dieser', 'dieses',
        'doch', 'dort', 'durch', 'ein', 'eine', 'einem', 'einen', 'einer', 'eines',
        'einig', 'einige', 'einigem', 'einigen', 'einiger', 'einiges', 'einmal',
        'er', 'ihn', 'ihm', 'es', 'etwas', 'euer', 'eure', 'eurem', 'euren',
        'eurer', 'eures', 'für', 'gegen', 'gewesen', 'hab', 'habe', 'haben',
        'hat', 'hatte', 'hatten', 'hier', 'hin', 'hinter', 'ich', 'mich', 'mir',
        'ihr', 'ihre', 'ihrem', 'ihren', 'ihrer', 'ihres', 'euch', 'im', 'in',
        'indem', 'ins', 'ist', 'jede', 'jedem', 'jeden', 'jeder', 'jedes', 'jener',
        'jenem', 'jenen', 'jener', 'jenes', 'jetzt', 'kann', 'kein', 'keine',
        'keinem', 'keinen', 'keiner', 'keines', 'können', 'könnte', 'machen',
        'man', 'manche', 'manchem', 'manchen', 'mancher', 'manches', 'mein',
        'meine', 'meinem', 'meinen', 'meiner', 'meines', 'mit', 'muss', 'musste',
        'nach', 'nicht', 'nichts', 'noch', 'nun', 'nur', 'ob', 'oder', 'ohne',
        'sehr', 'sein', 'seine', 'seinem', 'seinen', 'seiner', 'seines', 'selbst',
        'sich', 'sie', 'ihnen', 'sind', 'so', 'solche', 'solchem', 'solchen',
        'solcher', 'solches', 'soll', 'sollte', 'sondern', 'sonst', 'über',
        'um', 'und', 'uns', 'unse', 'unsem', 'unsen', 'unser', 'unses', 'unter',
        'viel', 'vom', 'von', 'vor', 'während', 'war', 'waren', 'warst', 'was',
        'weg', 'weil', 'weiter', 'welche', 'welchem', 'welchen', 'welcher',
        'welches', 'wenn', 'werde', 'werden', 'wie', 'wieder', 'will', 'wir',
        'wird', 'wirst', 'wo', 'wollen', 'wollte', 'würde', 'würden', 'zu',
        'zum', 'zur', 'zwar', 'zwischen'
      ]
    ],

    'publications' => [
      'driver' => 'local',
      'searchables' => 'collection:publications',
      'fields' => [
        'title', 
        'description', 
        'tags'
      ],
      'stop_words' => [
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'but', 'by', 'for',
        'if', 'in', 'into', 'is', 'it', 'no', 'not', 'of', 'on', 'or',
        'such', 'that', 'the', 'their', 'then', 'there', 'these', 'they',
        'this', 'to', 'was', 'will', 'with',
        'aber', 'alle', 'allem', 'allen', 'aller', 'alles', 'als', 'also', 'am',
        'an', 'ander', 'andere', 'anderem', 'anderen', 'anderer', 'anderes',
        'anderm', 'andern', 'anderr', 'anders', 'auch', 'auf', 'aus', 'bei',
        'bin', 'bis', 'bist', 'da', 'damit', 'dann', 'der', 'den', 'des', 'dem',
        'die', 'das', 'daß', 'derselbe', 'derselben', 'denselben', 'desselben',
        'demselben', 'dieselbe', 'dieselben', 'dasselbe', 'dazu', 'dein', 'deine',
        'deinem', 'deinen', 'deiner', 'deines', 'denn', 'derer', 'dessen', 'dich',
        'dir', 'du', 'dies', 'diese', 'diesem', 'diesen', 'dieser', 'dieses',
        'doch', 'dort', 'durch', 'ein', 'eine', 'einem', 'einen', 'einer', 'eines',
        'einig', 'einige', 'einigem', 'einigen', 'einiger', 'einiges', 'einmal',
        'er', 'ihn', 'ihm', 'es', 'etwas', 'euer', 'eure', 'eurem', 'euren',
        'eurer', 'eures', 'für', 'gegen', 'gewesen', 'hab', 'habe', 'haben',
        'hat', 'hatte', 'hatten', 'hier', 'hin', 'hinter', 'ich', 'mich', 'mir',
        'ihr', 'ihre', 'ihrem', 'ihren', 'ihrer', 'ihres', 'euch', 'im', 'in',
        'indem', 'ins', 'ist', 'jede', 'jedem', 'jeden', 'jeder', 'jedes', 'jener',
        'jenem', 'jenen', 'jener', 'jenes', 'jetzt', 'kann', 'kein', 'keine',
        'keinem', 'keinen', 'keiner', 'keines', 'können', 'könnte', 'machen',
        'man', 'manche', 'manchem', 'manchen', 'mancher', 'manches', 'mein',
        'meine', 'meinem', 'meinen', 'meiner', 'meines', 'mit', 'muss', 'musste',
        'nach', 'nicht', 'nichts', 'noch', 'nun', 'nur', 'ob', 'oder', 'ohne',
        'sehr', 'sein', 'seine', 'seinem', 'seinen', 'seiner', 'seines', 'selbst',
        'sich', 'sie', 'ihnen', 'sind', 'so', 'solche', 'solchem', 'solchen',
        'solcher', 'solches', 'soll', 'sollte', 'sondern', 'sonst', 'über',
        'um', 'und', 'uns', 'unse', 'unsem', 'unsen', 'unser', 'unses', 'unter',
        'viel', 'vom', 'von', 'vor', 'während', 'war', 'waren', 'warst', 'was',
        'weg', 'weil', 'weiter', 'welche', 'welchem', 'welchen', 'welcher',
        'welches', 'wenn', 'werde', 'werden', 'wie', 'wieder', 'will', 'wir',
        'wird', 'wirst', 'wo', 'wollen', 'wollte', 'würde', 'würden', 'zu',
        'zum', 'zur', 'zwar', 'zwischen'
      ]
    ],

    'agenda' => [
      'driver' => 'local',
      'searchables' => 'collection:agenda',
      'fields' => [
        'title', 
        'text', 
        'summary',
        'searchable_content'
      ],
      'stop_words' => [
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'but', 'by', 'for',
        'if', 'in', 'into', 'is', 'it', 'no', 'not', 'of', 'on', 'or',
        'such', 'that', 'the', 'their', 'then', 'there', 'these', 'they',
        'this', 'to', 'was', 'will', 'with',
        'aber', 'alle', 'allem', 'allen', 'aller', 'alles', 'als', 'also', 'am',
        'an', 'ander', 'andere', 'anderem', 'anderen', 'anderer', 'anderes',
        'anderm', 'andern', 'anderr', 'anders', 'auch', 'auf', 'aus', 'bei',
        'bin', 'bis', 'bist', 'da', 'damit', 'dann', 'der', 'den', 'des', 'dem',
        'die', 'das', 'daß', 'derselbe', 'derselben', 'denselben', 'desselben',
        'demselben', 'dieselbe', 'dieselben', 'dasselbe', 'dazu', 'dein', 'deine',
        'deinem', 'deinen', 'deiner', 'deines', 'denn', 'derer', 'dessen', 'dich',
        'dir', 'du', 'dies', 'diese', 'diesem', 'diesen', 'dieser', 'dieses',
        'doch', 'dort', 'durch', 'ein', 'eine', 'einem', 'einen', 'einer', 'eines',
        'einig', 'einige', 'einigem', 'einigen', 'einiger', 'einiges', 'einmal',
        'er', 'ihn', 'ihm', 'es', 'etwas', 'euer', 'eure', 'eurem', 'euren',
        'eurer', 'eures', 'für', 'gegen', 'gewesen', 'hab', 'habe', 'haben',
        'hat', 'hatte', 'hatten', 'hier', 'hin', 'hinter', 'ich', 'mich', 'mir',
        'ihr', 'ihre', 'ihrem', 'ihren', 'ihrer', 'ihres', 'euch', 'im', 'in',
        'indem', 'ins', 'ist', 'jede', 'jedem', 'jeden', 'jeder', 'jedes', 'jener',
        'jenem', 'jenen', 'jener', 'jenes', 'jetzt', 'kann', 'kein', 'keine',
        'keinem', 'keinen', 'keiner', 'keines', 'können', 'könnte', 'machen',
        'man', 'manche', 'manchem', 'manchen', 'mancher', 'manches', 'mein',
        'meine', 'meinem', 'meinen', 'meiner', 'meines', 'mit', 'muss', 'musste',
        'nach', 'nicht', 'nichts', 'noch', 'nun', 'nur', 'ob', 'oder', 'ohne',
        'sehr', 'sein', 'seine', 'seinem', 'seinen', 'seiner', 'seines', 'selbst',
        'sich', 'sie', 'ihnen', 'sind', 'so', 'solche', 'solchem', 'solchen',
        'solcher', 'solches', 'soll', 'sollte', 'sondern', 'sonst', 'über',
        'um', 'und', 'uns', 'unse', 'unsem', 'unsen', 'unser', 'unses', 'unter',
        'viel', 'vom', 'von', 'vor', 'während', 'war', 'waren', 'warst', 'was',
        'weg', 'weil', 'weiter', 'welche', 'welchem', 'welchen', 'welcher',
        'welches', 'wenn', 'werde', 'werden', 'wie', 'wieder', 'will', 'wir',
        'wird', 'wirst', 'wo', 'wollen', 'wollte', 'würde', 'würden', 'zu',
        'zum', 'zur', 'zwar', 'zwischen'
      ]
    ]
  ],

  /*
  |--------------------------------------------------------------------------
  | Driver Defaults
  |--------------------------------------------------------------------------
  |
  | Here you can specify default configuration to be applied to all indexes
  | that use the corresponding driver. For instance, if you have two
  | indexes that use the "local" driver, both of them can have the
  | same base configuration. You may override for each index.
  |
  */

  'drivers' => [

    'local' => [
      'path' => storage_path('statamic/search'),
    ],

    'algolia' => [
      'credentials' => [
        'id' => env('ALGOLIA_APP_ID', ''),
        'secret' => env('ALGOLIA_SECRET', ''),
      ],
    ],

  ],

  /*
  |--------------------------------------------------------------------------
  | Search Defaults
  |--------------------------------------------------------------------------
  |
  | Here you can specify default configuration to be applied to all indexes
  | regardless of the driver. You can override these per driver or per index.
  |
  */

  'defaults' => [
    'fields' => ['title'],
  ],

];
