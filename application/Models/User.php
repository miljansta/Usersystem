<?php
namespace Application\Models;

class User extends Model{

    /**
     * Return all users
     * @return \PDOStatement
     */
    public function getUsers(){
        return $this->db->from('users')->execute();
    }

    /**
     * Find existing user by email and password
     * @param $email
     * @param $password
     * @return mixed
     */
    public function existingUser($email, $password){
        $password = md5($password);

        return $this->db->from('users')->where('email = ?', $email)->where('password = ?', $password)->fetch();
    }

    /**
     * Check if user exist by email
     * @param $email
     * @return mixed
     */
    public function checkUser($email){
        return $this->db->from('users')->where('email = ?', $email)->fetch();
    }

    /**
     * Add new user
     * @param $data
     * @return bool
     */
    public function addUser($data){
        $values = [
            'email' =>  $data['email'],
            'password'  =>  md5($data['password']),
            'name'  =>  $data['name'],
            'posted'    =>  date("Y-m-d H:i:s", time())
        ];
        $this->db->insertInto('users', $values)->execute();
        return true;
    }

    /**
     * Find user by search
     * @param $urlParams
     * @return array
     */
    public function findUser($urlParams){

        $result = $this->db->from('users')
            ->where("(email LIKE ? OR name LIKE ?)", '%'.$urlParams['search'].'%', '%'.$urlParams['search'].'%')->fetchAll();

        return $result;
    }
}