<?php

$autoLoader = realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'vendor'.
    DIRECTORY_SEPARATOR.'autoload.php');

require $autoLoader;

// Load server specific configuration data.  Should
// check an environment variable load the appropriate
// server configuration file.

//\Slim\Slim::registerAutoloader();

require 'config.php';


$app = new \Slim\Slim();

//require realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'app.php');


$app->get('/', function() {

    require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.
        'LoginForm.php');
});

$app->get('/welcome', function() {

    require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.
        'Welcome.php');
});

$app->get('/register', function() {

    require_once realpath(__DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.
        'Register.php');
});

$app->post('/api', function() use($app){

    $username = $app->request()->params('username');
    $password = $app->request()->params('password');

    $loginUser = new \Common\Authentication\SQLiteDB();


    if($loginUser->authenticate($username,$password) !== true)
    {
        $app->response()->setStatus(401);
        $app->response()->getStatus();
        return json_encode($app->response()->header('No User Created:localhost:8080/register'));
    }

    if($loginUser->authenticate($username,$password) === true)
    {
        $app->response()->setStatus(200);
        $app->response()->getStatus();

        return json_encode($app->response()->header('Welcome to your account : localhost:8080/welcome'));
    }

});
// register new user
$app->post('/api/register', function()
{
    $register = new \Common\Authentication\SQLiteDB();
});


$app->run();

