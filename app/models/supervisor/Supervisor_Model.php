<?php

class Supervisor_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function editProfile() {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    function checkPassword($data) {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id='$user_id'";
        
        $row = $this->db->runQuery($query);
        $hashed_password = $row[0]['password'];

        if(password_verify($data['password'], $hashed_password)) {
            return $row;
        }else {
            return false;
        }
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

    function manageRequests() {
        $query = "SELECT request.request_id, request.lid, request.request_date, user.name, fertilizer_request.amount 
                FROM user 
                INNER JOIN request 
                ON user.user_id=request.lid 
                INNER JOIN fertilizer_request 
                ON fertilizer_request.request_id=request.request_id";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function stock($data) {
        $type = $data['type'];
        $query = "SELECT DATE(in_date) 
                AS in_date, 
                price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM ".$data['stock_type']." WHERE type='$type'";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function searchByDate($data) {
        $stock_type = $data['stock_type'];
        $type = $data['type'];
        $search_date = $data['date'];

        $query = "SELECT DATE(in_date) 
                AS in_date, 
                type, price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM '$stock_type' WHERE type='$type' WHERE in_date='$search_date'";

        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

}

?>