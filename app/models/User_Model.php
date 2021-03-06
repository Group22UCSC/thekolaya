<?php

class User_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }

    function changePassword($data = []) {
        $new_password = $data['new_password'];
        $contact_number = $_SESSION['contact_number'];
        
        $query = "UPDATE user SET password='$new_password' WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if($row) {
            return true;
        }else {
            return false;
        }
    }

    function profileUpload($image) {
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET profile_picture='$image' WHERE user_id = '$user_id'";
        $this->db->runQuery($query);

        $query = "SELECT * FROM user WHERE user_id = '$user_id'";
        $row = $this->db->runQuery($query);
        $_SESSION['profile_picture'] = $row[0]['profile_picture'];
        $_SESSION['profile_picture'] = strtolower($_SESSION["user_type"])."/".$_SESSION['profile_picture'];
    }

    function isPasswordCorrect($contact_number, $password)
    {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number'";

        $row = $this->db->runQuery($query);

        $hashed_password = $row[0]['password'];

        if (password_verify($password, $hashed_password)) {
            return true;
        } else {
            return false;
        }
    }

    function checkPassword($password) {
        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM user WHERE user_id = '$user_id'";

        $row = $this->db->runQuery($query);
        
        $hashed_password = $row[0]['password'];

        if(password_verify($password, $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

    function editProfile() {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    function editName($name, $user_id) {
        $query = "UPDATE user SET name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
        $_SESSION['name'] = $name;
    }

    function getNotSeenNotification() {
        $user_type = $_SESSION['user_type'];
        $query = "SELECT * FROM notification 
        WHERE receiver_type='$user_type' AND seen_not_seen=0 
        ORDER BY notification_id DESC";
        $row = $this->db->runQuery($query);
        if(count($row)) {
            return $row;
        }else {
            return false;
        }
    }

}
?>