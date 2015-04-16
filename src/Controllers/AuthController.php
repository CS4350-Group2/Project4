<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */


namespace Controllers;
use Common\Authentication\IAuthenticate;
use Views\LoginForm;
// add more views


/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */
    public function action()
    {
        $postData = $this->request->getPost();

        echo 'Authenticate the above two different ways' . var_dump($postData);

        if ($postData->authSelect =='FileBased') {
            $loggingUser = new fileLoaded($postData);
        }
        else if ($postData->authSelect =='InMemory'){
            $loggingUser = new inMemory($postData) ;
        }
        else if ($postData->authSelect =='mySQL'){
            $loggingUser = new mySQL($postData) ;
        }
        if ($loggingUser->authenticate()) {
             echo "Thanks for logging in";       
        } else {
             echo "Sorry Please try again";
        }

        // example code: $auth = new Authentication($postData['username'], $postData['password']);
    }
}
