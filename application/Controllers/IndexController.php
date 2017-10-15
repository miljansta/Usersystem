<?php
namespace Application\Controllers;

class IndexController extends Controller {

    /**
     * Render index page
     */
    public function indexPage(){
        echo $this->view->render('index.html');
    }

    /**
     * Render login page
     */
    public function loginPage(){
        echo $this->view->render('login.html');
    }

    /**
     * Render register page
     */
    public function registerPage(){
        echo $this->view->render('register.html');
    }
}