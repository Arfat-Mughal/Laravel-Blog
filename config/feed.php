<?php

return [
    'feeds' => [
        'main' => [
            'items' => 'App\Models\Article@getFeedItems',

            'url' => '/feeds',

            'title' => 'Laravel-Blog',
            'description' => 'Laravel-Blog Multi-language blog post.',
            'language' => 'en-US',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::atom',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',

            /*
             * 👇 REQUIRED in v3/v4
             */
            'format' => 'atom', // could be 'atom', 'rss', or 'json'
        ],
    ],
];
