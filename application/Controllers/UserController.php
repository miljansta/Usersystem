<?php
namespace Application\Controllers;

use Application\Models\User;
use Application\Validators\LoginValidator;
use Application\Validators\RegisterValidator;

class UserController extends Controller{


    /**
     * Login user
     * @return bool
     */
    public function login(){

        $data = $_POST;
        $validator = new LoginValidator($data);

        $formValidation = $validator->isValid();

        if(is_array($formValidation)){
            echo $this->view->render('login.html', ['errorMsg' => 'Error logging you in.', 'errors' => $formValidation, 'oldInput' => $data]);
        }

        $userModel = new User();

        $checkAuth = $userModel->existingUser($data['email'], $data['password']);
        if($checkAuth){
            $_SESSION['user'] = $checkAuth;
            header("Location: /");
            echo $this->view->render('index.html');
            return true;
        }

        echo $this->view->render('login.html', ['errorMsg' => 'Error logging you in.', 'oldInput' => $data]);
    }

    /**
     * Register user
     * @return bool
     */
    public function register(){
        $data = $_POST;
        $validator = new RegisterValidator($data);

        $formValidation = $validator->isValid();

        if(is_array($formValidation)){
            echo $this->view->render('register.html', ['errors' => $formValidation, 'oldInput' => $data]);
            return true;
        }

        $userModel = new User();

        $checkUserExist = $userModel->checkUser($data['email']);

        if($checkUserExist){
            echo $this->view->render('register.html', ['errorMsg' => 'User exist. Please login or choose different email']);
            return true;
        }

        $userModel->addUser($data);

        echo $this->view->render('register.html', ['success' => 'Successful registration. Please login.']);
    }

    /**
     * Logout user
     */
    public function logout(){
        unset($_SESSION['user']);
        header("Location: /");
        echo $this->view->render('index.html');
    }
}
