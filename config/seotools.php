<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => "MrSmart Cleaning Services", // set false to total remove
            'titleBefore' => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description' => 'We are a commercial and domestic cleaning services company based in Lamu Kenya offering  home, office, sofa and carpet cleaning.', // set false to total remove
            'separator' => ' - ',
            'keywords' => ["upholstery cleaning", "carpet cleaning", "dry cleaning", "car interior cleaning", "cleaning services", "cleaners", "cleaning"],
            'canonical' => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots' => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => "MrSmart Cleaning Services", // set false to total remove
            'description' => 'We are a commercial and domestic cleaning services company based in Lamu Kenya offering  home, office, sofa and carpet cleaning.', // set false to total remove
            'url' => null, // Set null for using Url::current(), set false to total remove
            'type' => 'website',
            'site_name' => "MrSmart Cleaning Services",
            'images' => [asset('storage/images/mrsmart-og.webp')],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => "MrSmart Cleaning Services", // set false to total remove
            'description' => 'We are a commercial and domestic cleaning services company based in Lamu Kenya offering home, office, sofa and carpet cleaning.', // set false to total remove
            'url' => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [asset('storage/images/mrsmart-og.webp')],
        ],
    ],
];