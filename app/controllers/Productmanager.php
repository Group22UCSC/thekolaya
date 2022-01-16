<?php

class ProductManager extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function index() {
        $incomeBarChart = $this->model->incomeBarChart();//for the bar chart
        $this->view->render('Productmanager/Productmanager',$incomeBarChart);
    }
    
    function products() {
        $productResults = $this->model->getProductDetails();
        $this->view->render('Productmanager/products',$productResults);
    }
    function auctionDetails() {
        $tblResult = $this->model->auction();
        $this->view->render('Productmanager/auctionDetails',$tblResult);
    }
    function updateProducts() {


        if($_SERVER['REQUEST_METHOD']=='POST'){
                
            $result = $this->model->insertProduct();
            if($result==true){
            //     $buyers=$this->model->getBuyersDetails();
            // $tblResult = $this->model->auction();
            // $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            //$this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $productResults = $this->model->getProductDetails();
            $this->view->render('Productmanager/updateProducts',$productResults);   
        }
    }

    function loadProductNames(){
            $productResults = $this->model->getProductDetails();//"SELECT product_id,product_name,amount FROM product";
            return $productResults;
    }
    function updateAuction(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
                
            $result = $this->model->insertAution();
            
            if($result==true){
            //     $buyers=$this->model->getBuyersDetails();
            // $tblResult = $this->model->auction();
            // $productResults = $this->model->getProductDetails();
            
           //return($result);
            //$this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $buyers=$this->model->getBuyersDetails();
            $tblResult = $this->model->auction();
            $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            $this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
        }
            
    }
    // ==== get the details of the auction table for the updateAuction UI
    function getAuctionTable(){
        $tblResult = $this->model->auction();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }
    // get details of the products_in table
    function getProductsINTable(){
        $tblResult = $this->model->getProductsINTable();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }


    // get the data of the last row of suction(Latest updated row)
    function getLastRowAuction(){
        echo "getLastRowAuction";
        $tblResult = $this->model->getLastRowAuction();
        print_r($tblResult);
        // -- $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        // -- echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }

    //Manage Profile
    function profile()
    {
        $this->view->render('user/profile/profile');
    }
    
    function editProfile()
    {
        include '../app/controllers/User.php';
        $user = new User();
        $user->loadModelUser('user');
        $user->editProfile();
    }

    function enterPassword()
    {
        $this->view->render('user/profile/enterPassword');
    }
    
    function getProductStock(){
        // $pid=$this->input->get('pid');
        $pid=$_GET['pid'];
        $result = $this->model->getProductStock();
        // print_r($tblResult);
        $json_arr=json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
       //echo $pid;
       //return $pid;
    }
    function AuctionIncome30(){
        $tblResult = $this->model->AuctionIncome30();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    } 
    

    // tot tea sales for last 30 days
    function totSales30(){
        $tblResult = $this->model->totSales30();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }

    //get the tot tea stock available for the dashboard box
    function totTeaStockNow(){
        $tblResult = $this->model->totTeaStockNow();
        $json_arr=json_encode($tblResult);
        echo $json_arr;
    }
}

?>
