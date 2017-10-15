<?php
namespace Application\Controllers;

use Application\Models\User;

class SearchController extends Controller{

    /**
     * Search
     * @return bool
     */
    public function search(){
        if(!isset($_SESSION['user'])){
            echo $this->view->render('login.html', ['errorMsg' => "You have to login first"]);
            return true;
        }

        $userModel = new User();

        $data = $_GET;

        $result = $userModel->findUser($data);

        $users = [];
        foreach($result as $user){
            $users[] = $user;
        }
        if(sizeof($users) > 0){
            echo $this->view->render('result.html', ['result' => $users]);
        }else{
            echo $this->view->render('result.html', ['noResult' => true]);
        }

    }
}