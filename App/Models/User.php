<?php

namespace App\Models;

use MF\Model\Model;
use PDOException;

// use MF\Model\Model as ModelModel;

class User extends Model
{

  private $id;
  private $name;
  private $email;
  private $password;

  public function __get($attribute)
  {
    return $this->$attribute;
  }

  public function __set($attribute, $value)
  {

    $this->$attribute = $value;
  }

  public function save()
  {
    $query = "INSERT INTO user(name, email, password) VALUES (:name, :email, :password)";
    $stmt = $this->db->prepare($query);

    $stmt->bindValue(':name', $this->__get('name'));
    $stmt->bindValue(':email', $this->__get('email'));
    $stmt->bindValue(':password', md5($this->__get('password')));

    $stmt->execute();

    return $this;
  }

  public function verify()
  {
    $verify = true;

    if (strlen($this->__get('name')) < 3)
      return $verify = false;

    if (strlen($this->__get('email')) < 3)
      return $verify = false;

    if (strlen($this->__get('password')) < 3)
      return $verify = false;

    return $verify;
  }

  public function getUsers()
  {
    $query = "SELECT name, email FROM users WHERE email = :email";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':email', $this->__get('email'));

    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function autenticateModel()
  {

    $query = "SELECT iduser, name, email FROM user WHERE email = :email AND password = :password";
    
    $stmt = $this->db->prepare($query);
   
    $stmt->bindValue(':email', $this->__get('email'));
    $stmt->bindValue(':password', md5($this->__get('password')));
    
    $stmt->execute();
   
    $user = $stmt->fetch(\PDO::FETCH_ASSOC);
   
    if(!empty($user['iduser'])){
      return $user;
    } else {
      return false;
    }

  }

  function getAll()
  {

    $query = "SELECT idUser, name, email FROM user WHERE name LIKE :name";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(':name', '%' . $this->__get('name') . '%');
    $stmt->execute();

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
}
