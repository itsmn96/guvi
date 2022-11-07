<?php

class User
{
    private $conn;



    public function __call($name, $arguments)
    {
        $property = preg_replace("/[^0-9a-zA-z]/","",substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        // print($name);
        if(substr($name,0, 3)== "get"){ 
            return $this->_get_data($property);
        }elseif (substr($name,0, 3)== "set"){
            return $this->_set_data($property, $arguments[0]);
        }else {
          throw new Exception("User::_call()-> $name, function unavailable");
        }
    }

    public static function signup($user, $pass, $email, $phone)
    {
      $options=[
        'cost' => 8,
      ];
      $pass= password_hash($pass, PASSWORD_BCRYPT, $options);
      $conn=Database::getConnection();
      $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`)
      VALUES ('$user', '$pass', '$email', '$phone');";
      $error=false;
      if ($conn->query($sql) === true) {
        $error=false;
      } else {

        $error=$conn->error;
      }
      
      //$conn->close();
      return $error;
    }

    public static function login($user, $pass)
    {
        $query="select * from `auth` where `username` = '$user'";
        $conn = Database::getConnection();
        $result = $conn->query($query);
        if($result->num_rows==1){
          $row = $result->fetch_assoc();
            if(password_verify($pass, $row['password'])){
              /*
              1.Generate session token
              2.Insert session token
              3.Build session and give session to user
              */
            return $row['username'];
            // return true;
          }else{
            // echo "Failure";
            return false;
          }
        }else{
          // echo "Failure no row";
          return false;
        }
    }

    // user object can be constructed with both UserID and Username.
    public function __construct($username)
    {
        $this->conn=Database::getConnection();
        $this->username = $username;
        $this->id=null;
        // $this->conn->query();
        $sql="SELECT `id` FROM `auth` WHERE `username` = '$username' OR `id`='$username' LIMIT 1";
        $result=$this->conn->query($sql);
        if ($result->num_rows){
          $row = $result->fetch_assoc();
            $this->id=$row['id'];
        }else{
          throw new Exception("username does'nt exists");
        }
    }
    private function _get_data($var)
    {
        if(!$this->conn){
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT `$var` FROM `users` WHERE `id` = $this->id";
        $result = $this->conn->query($sql);
        if($result and $result->num_rows == 1){
          return $result ->fetch_assoc()["$var"];
        }else {
          return null;
      }
}
    private function _set_data($var, $data)
    {
        if(!$this->conn){
          $this->conn = Database::getConnection();
      }
      $sql = "UPDATE `users` SET `$var`=`$data` WHERE `id` = $this->id ";
      if($this->conn->query($sql)){
        return true;
      }else {
        return false;
    }
}
    public function authenticate()
    {

    }
    public function getUsername()
    {
      return $this->username;
    }
    // public function setBio($bio){
    //     return $this->_set_data('bio', $bio);
    // }
    // public function getBio(){
    //     return $this- _get_data('bio');
    // }
    // public function setAvatar($link){
    //     return $this->_set_data('avatar', $link);
    // }
    // public function getAvatar(){
    //     return $this- _get_data('avatar');
    // }
    // public function setFirstname($name)
    // {
    //     return $this->_set_data("firstname", $name);
    // }
    // public function getFirstname()
    // {
    //     return $this- _get_data('firstname');
    // }
    // public function setLastname($name)
    // {
    //     return $this->_set_data("lastname", $name);
    // }
    // public function getLastname()
    // {
    //     return $this- _get_data('lastname');
    // }
    // public function setDob($year, $month, $day)
    // {
    //   if(checkdate($month, $day, $year)){
    //     return $this->_set_data('dob',"$year.$month.$day");
    //   }else return false;  
    // }
    // public function getDob()
    // {
    //   return $this- _get_data('dob');
    // }
    // public function setInstagramLink($link)
    // {
    //   return $this->_set_data('instagram', "$link");
    // }
    // public function getInstagramLink()
    // {
    //   return $this- _get_data('instagram');
    // }
    // public function setTwitterLink($link)
    // {
    //   return $this->_set_data('twitter', "$link");
    // }
    // public function getTwitterLink()
    // {
    //   return $this- _get_data('twitter');
    // }
    // public function setFacebookLink($link)
    // {
    //   return $this->_set_data('facebook', "$link");
    // }
    // public function getFacebookLink()
    // {
    //   return $this- _get_data('facebook');
    // }
}
 