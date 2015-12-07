<?php
/**
 * Created by PhpStorm.
 * User: Verem
 * Date: 07/12/15
 * Time: 11:19 AM
 */

namespace App;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;

class FaceBookAuth {

    public function getConfig()
    {
        return new Facebook([
            'app_id' => env('FACEBOOK_ID'),
            'app_secret' => env('FACEBOOK_SECRET'),
            'default_graph_version' => env('FACEBOOK_GRAPH_VERSION')
        ]);
    }

    public function getAccessToken()
    {
        $facebook = $this->getConfig();

        $helper = $facebook->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();

            return $accessToken;
        } catch (FacebookResponseException $fre) {
            return $fre->getRawResponse();
        }

    }


    public function faceBookLogin($accessToken)
    {
        $facebook = $this->getConfig();

        $facebook->getDefaultAccessToken();

        try {
            $response = $facebook->get('/me');
            $userNode = $response->getGraphUser();

            return $userNode;
        } catch (FacebookResponseException $fre) {
            return $fre->getRawResponse();
        }
    }

    public function postToUserTimeLine($accessToken, $request)
    {
        $facebook = $this->getConfig();
        $facebook->setDefaultAccessToken($accessToken);

        $data = [
            'message' => $request('message'),
            'source'  => $facebook->fileToUpload($request('photo'))
        ];

        try {
            $response = $facebook->post('/me/photos', $data);
            $graphNode = $response->getGraphNode();

            return $graphNode;

        } catch (FacebookSDKException $fse) {
            return $fse->getMessage();
        }
    }
}