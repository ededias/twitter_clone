<?php
  namespace App\Models;
  use MF\Model\Model;


class Tweet extends Model {
    private $idTweet;
    private $iduser;
    private $tweet;
    private $date;

    function __get($attribute)
    {
      return $this->$attribute;
    }

    function __set($attribute, $value)
    {
      $this->$attribute = $value;
    }

    function save() {
      $query = "INSERT INTO tweet(tweet, user_idUser) VALUES (:tweet, :user_idUser)";
      $stmt = $this->db->prepare($query);
     
      $stmt->bindValue(':user_idUser', $this->__get('iduser'));
      $stmt->bindValue(':tweet', $this->__get('tweet'));

      $stmt->execute();
      
      return $this;
    }

    function deleteTweet() {
      $query = "DELETE FROM tweet WHERE idtweet = :idtweet AND user_iduser = :iduser";
      $stmt = $this->db->prepare($query);

      $stmt->bindValue(':idtweet', $this->__get('idTweet'));
      $stmt->bindValue(':iduser', $this->__get('iduser'));
     
      $stmt->execute();

      return $this;
    }

    function getAll() {
      $query = "SELECT t.idtweet, t.user_idUser, u.name, t.tweet, DATE_FORMAT(t.date, '%d/%m/%Y %h:%i') 
                  AS data 
                  FROM tweet AS t 
                  LEFT JOIN user AS u 
                  ON (t.user_idUser = u.iduser)
                    WHERE t.user_idUser = :user_idUser
                  ORDER BY t.date DESC";

      $stmt = $this->db->prepare($query);
      $stmt->bindValue(':user_idUser', $this->__get('iduser'));
      $stmt->execute();
      return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
  }