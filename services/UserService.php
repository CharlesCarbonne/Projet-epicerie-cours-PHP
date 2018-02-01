<?php
namespace Service;
use Entity\User;


class UserService
{
protected $users;

  public function __construct($users){
      $this->users = $users;
  }

    public function isUserConnected(){
        return isset($_SESSION['connectedUser']);
    }

    public function getConnectedUser(){
        if($this-> $this->isUserConnected()){
            return $_SESSION['connectedUser'];
        }
    }

    public function login($login, $password){
        /**@var User $user*/
        foreach($this->users as $user){
            if($user->getLogin() == $login && $user->getPassword() == $password){
                $_SESSION['connectedUser'] = $user;
                return true;
            }
        }
        return false;
    }

    public function logout(){
        if($this->isUserConnected()){
            unset($_SESSION['connectedUser']);
        }
    }

}