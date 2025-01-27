<?php
return [
    'routes' => [
        // Zeigt das Registrierungsformular
        ['name' => 'user#showRegisterForm', 'url' => '/register/form', 'verb' => 'GET'],

        // Bearbeitet die Registrierung
        ['name' => 'user#register', 'url' => '/register', 'verb' => 'POST']
    ]
];
