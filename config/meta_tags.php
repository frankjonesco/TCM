<?php

use Butschster\Head\MetaTags\Viewport;

return [
    /*
     * Meta title section
     */
    'title' => [
        'default' => 'True Crime Metrix - News & statistics',
        'separator' => '-',
        'max_length' => 255,
    ],


    /*
     * Meta description section
     */
    'description' => [
        'default' => 'True crime news & statistics from your favourite true crime cases. True crime information library the criminal, lawyers, judges and victims of popular true crime cases.',
        'max_length' => 255,
    ],


    /*
     * Meta keywords section
     */
    'keywords' => [
        'default' => 'true crime, crime news, true crime news, trial news',
        'max_length' => 255
    ],

    /*
     * Default packages
     *
     * Packages, that should be included everywhere
     */
    'packages' => [
        // 'jquery', 'bootstrap', ...
    ],

    'charset' => 'utf-8',
    'robots' => null,
    'viewport' => Viewport::RESPONSIVE,
    'csrf_token' => true,
];