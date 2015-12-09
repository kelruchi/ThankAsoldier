<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 04/12/15
 * Time: 9:10 PM
 */


return [
    'facebook' => [
        'client_id' => env('FACEBOOK_ID', '899894580046709'),
        'client_secret' => env('FACEBOOK_SECRET', '765e85dd9f1cebf0068054c49262ecfe'),
        'redirect' => env('FACEBOOK_REDIRECT', 'http://localhost:8000/login/facebook')
    ],
    'twitter' => [
        'client_id' 	=> env('TWITTER_ID'),
        'client_secret' => env('TWITTER_SECRET'),
        'redirect'		=> env('TWITTER_REDIRECT')
    ],
];