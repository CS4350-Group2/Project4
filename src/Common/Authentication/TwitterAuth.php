<?php
/**
 * Created by PhpStorm.
 * User: arielstewart
 * Date: 4/20/15
 * Time: 6:07 PM
 */

namespace Common\Authentication;

use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Oauth\Oauth1;



class TwitterAuth implements IAuthentication{


    /**
     * Function authenticate
     *
     * @param string $username
     * @param string $password
     * @return mixed
     *
     * @access public
     */
    public function authenticate($username, $password)
    {
        $client = new Client(['base_url' => 'https://api.twitter.com', 'defaults' => ['auth' => 'oauth']]);

        $oauth = new Oauth1([
            'consumer_key' => '',
            'consumer_secret' => '',
            'token' => '',
            'token_secret' => ''
        ]);
    }
}