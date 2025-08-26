<?php

return [
    '403' => [
        'title' => 'Accès refusé',
        'description' => 'Vous n’avez pas les autorisations suffisantes.'
    ],

    '404' => [
        'title' => 'Page non trouvée',
        'description' => 'La page demandée est introuvable.'
    ],

    '405' => [
        'title' => 'Méthode non autorisée',
        'description' => 'Cette action n’est probablement pas définie.'
    ],

    '419' => [
        'title' => 'Page expirée',
        'description' => 'Votre session a probablement expiré.'
    ],

    '429' => [
        'title' => 'Trop de requêtes',
        'description' => 'Veuillez patienter avant de réessayer cette action.'
    ],

    '500' => [
        'title' => 'Erreur interne du serveur',
        'description' => 'Nous sommes désolés pour les problèmes rencontrés. Nous allons les corriger dès que possible.'
    ],

    '503' => [
        'title' => 'Service indisponible',
        'description' => 'Des changements importants sont en cours de déploiement.'
    ]
];
