<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validatie Taalregels
    |--------------------------------------------------------------------------
    |
    | De volgende regels bevatten standaard validatieberichten gebruikt door
    | Laravel. Je kunt deze aanpassen zoals je wilt.
    |
    */

    'accepted' => ':attribute moet geaccepteerd worden.',
    'active_url' => ':attribute is geen geldige URL.',
    'after' => ':attribute moet een datum na :date zijn.',
    'after_or_equal' => ':attribute moet een datum na of gelijk aan :date zijn.',
    'alpha' => ':attribute mag alleen letters bevatten.',
    'alpha_dash' => ':attribute mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => ':attribute mag alleen letters en cijfers bevatten.',
    'array' => ':attribute moet een array zijn.',
    'before' => ':attribute moet een datum voor :date zijn.',
    'before_or_equal' => ':attribute moet een datum voor of gelijk aan :date zijn.',
    'between' => [
        'numeric' => ':attribute moet tussen :min en :max zijn.',
        'file' => ':attribute moet tussen :min en :max kilobytes zijn.',
        'string' => ':attribute moet tussen :min en :max tekens zijn.',
        'array' => ':attribute moet tussen :min en :max items bevatten.',
    ],
    'boolean' => ':attribute moet true of false zijn.',
    'confirmed' => ':attribute bevestiging komt niet overeen.',
    'date' => ':attribute is geen geldige datum.',
    'date_equals' => ':attribute moet een datum gelijk aan :date zijn.',
    'date_format' => ':attribute komt niet overeen met het formaat :format.',
    'different' => ':attribute en :other moeten verschillend zijn.',
    'digits' => ':attribute moet :digits cijfers bevatten.',
    'digits_between' => ':attribute moet tussen :min en :max cijfers bevatten.',
    'dimensions' => ':attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => ':attribute bevat een dubbele waarde.',
    'email' => ':attribute moet een geldig e-mailadres zijn.',
    'ends_with' => ':attribute moet eindigen op één van de volgende: :values.',
    'exists' => 'Geselecteerd :attribute is ongeldig.',
    'file' => ':attribute moet een bestand zijn.',
    'filled' => ':attribute is verplicht.',
    'gt' => [
        'numeric' => ':attribute moet groter zijn dan :value.',
        'file' => ':attribute moet groter zijn dan :value kilobytes.',
        'string' => ':attribute moet meer dan :value tekens bevatten.',
        'array' => ':attribute moet meer dan :value items bevatten.',
    ],
    'gte' => [
        'numeric' => ':attribute moet groter dan of gelijk zijn aan :value.',
        'file' => ':attribute moet groter dan of gelijk zijn aan :value kilobytes.',
        'string' => ':attribute moet minimaal :value tekens bevatten.',
        'array' => ':attribute moet minimaal :value items bevatten.',
    ],
    'image' => ':attribute moet een afbeelding zijn.',
    'in' => 'Geselecteerd :attribute is ongeldig.',
    'in_array' => ':attribute bestaat niet in :other.',
    'integer' => ':attribute moet een geheel getal zijn.',
    'ip' => ':attribute moet een geldig IP-adres zijn.',
    'ipv4' => ':attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => ':attribute moet een geldig IPv6-adres zijn.',
    'json' => ':attribute moet een geldige JSON-string zijn.',
    'lt' => [
        'numeric' => ':attribute moet kleiner zijn dan :value.',
        'file' => ':attribute moet kleiner zijn dan :value kilobytes.',
        'string' => ':attribute moet minder dan :value tekens bevatten.',
        'array' => ':attribute moet minder dan :value items bevatten.',
    ],
    'lte' => [
        'numeric' => ':attribute moet kleiner dan of gelijk zijn aan :value.',
        'file' => ':attribute moet kleiner dan of gelijk zijn aan :value kilobytes.',
        'string' => ':attribute moet maximaal :value tekens bevatten.',
        'array' => ':attribute mag niet meer dan :value items bevatten.',
    ],
    'max' => [
        'numeric' => ':attribute mag niet groter zijn dan :max.',
        'file' => ':attribute mag niet groter zijn dan :max kilobytes.',
        'string' => ':attribute mag niet meer dan :max tekens bevatten.',
        'array' => ':attribute mag niet meer dan :max items bevatten.',
    ],
    'mimes' => ':attribute moet een bestand zijn van het type: :values.',
    'mimetypes' => ':attribute moet een bestand zijn van het type: :values.',
    'min' => [
        'numeric' => ':attribute moet minimaal :min zijn.',
        'file' => ':attribute moet minimaal :min kilobytes zijn.',
        'string' => ':attribute moet minimaal :min tekens bevatten.',
        'array' => ':attribute moet minimaal :min items bevatten.',
    ],
    'not_in' => 'Geselecteerd :attribute is ongeldig.',
    'not_regex' => 'Het formaat van :attribute is ongeldig.',
    'numeric' => ':attribute moet een getal zijn.',
    'password' => 'Wachtwoord is onjuist.',
    'present' => ':attribute moet aanwezig zijn.',
    'regex' => 'Het formaat van :attribute is ongeldig.',
    'required' => ':attribute is verplicht.',
    'required_if' => ':attribute is verplicht wanneer :other gelijk is aan :value.',
    'required_unless' => ':attribute is verplicht tenzij :other zich in :values bevindt.',
    'required_with' => ':attribute is verplicht wanneer :values aanwezig is.',
    'required_with_all' => ':attribute is verplicht wanneer :values aanwezig zijn.',
    'required_without' => ':attribute is verplicht wanneer :values niet aanwezig is.',
    'required_without_all' => ':attribute is verplicht wanneer geen van :values aanwezig zijn.',
    'same' => ':attribute en :other moeten overeenkomen.',
    'size' => [
        'numeric' => ':attribute moet :size zijn.',
        'file' => ':attribute moet :size kilobytes zijn.',
        'string' => ':attribute moet :size tekens bevatten.',
        'array' => ':attribute moet :size items bevatten.',
    ],
    'starts_with' => ':attribute moet beginnen met één van de volgende: :values.',
    'string' => ':attribute moet een tekst zijn.',
    'timezone' => ':attribute moet een geldige tijdzone zijn.',
    'unique' => ':attribute is al in gebruik.',
    'uploaded' => ':attribute uploaden is mislukt.',
    'url' => ':attribute is geen geldige URL.',
    'uuid' => ':attribute moet een geldige UUID zijn.',

    /*
    |--------------------------------------------------------------------------
    | Aangepaste validatieberichten
    |--------------------------------------------------------------------------
    |
    | Hier kun je je eigen validatieberichten toevoegen voor specifieke attributen.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'aangepast bericht',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Attribuutnamen
    |--------------------------------------------------------------------------
    |
    | Hier kun je de namen van de attributen aanpassen zodat ze menselijker
    | weergegeven worden in de foutmeldingen.
    |
    */

    'attributes' => [
        'name' => 'naam',
        'email' => 'e-mailadres',
        'password' => 'wachtwoord',
        'password_confirmation' => 'wachtwoord bevestiging',
    ],

];
