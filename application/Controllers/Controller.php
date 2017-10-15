<?php
namespace Application\Controllers;

class Controller{

    /**
     * @var \Twig_Environment
     */
    public $view;

    /**
     * Controller constructor.
     */
    function __construct(){
        $loader = new \Twig_Loader_Filesystem(__DIR__."/../../views");
        $this->view =  new \Twig_Environment($loader);
        $this->view->addGlobal('user', (isset($_SESSION['user']))?$_SESSION['user']:false);
    }
}