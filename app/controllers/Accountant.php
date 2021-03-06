<?php

class Accountant extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->getNotificationCount();
        $incomeBarChart = $this->model->incomeBarChart();//for the bar chart
        $paymentExp30 = $this->model->paymentExp30();
        $instockExp30 = $this->model->instockExp30(); // fertilizer expenses
        $this->view->render('accountant/accountant',$incomeBarChart,$paymentExp30,$instockExp30 );
    }  

    function getTeaPrice(){
        $result = $this->model->teaPriceTable();
        $json_arr=json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }

    function setTeaPrice() {
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            

            $result = $this->model->insertTeaPrice();
            if($result==true){
                // if there is a result which mean query is executed - > success pop up
                $_POST['success']=1;
                //$result = $this->model->teaPriceTable();
                //$this->view->render('accountant/setTeaPrice',$result);
                //echo "successfuly added";
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $this->getNotificationCount();
            $result = $this->model->teaPriceTable();
            $this->view->render('accountant/setTeaPrice',$result);
        }
        
    }
    // function to delete tea prices of a row
    function deleteSetTeaPriceRow(){
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            $result = $this->model->deleteSetTeaPriceRow();
            if($result==true){
                
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            echo "Data was not passed to the controller";
        }
    }


    function payments() {
        $this->getNotificationCount();
        $this->view->showPage('accountant/payments');
    }
    function landowners() {

        $this->getNotificationCount();
        $this->view->showPage('accountant/landowners');
    }
    function pdf($lid,$year,$month) { //payment pdf 
        //$this->getNotificationCount();
        $_POST['lid']=$lid;
        $_POST['year']=$year;
        $_POST['month']=$month;
        $result = $this->model->genLandownersMPayment();//get the details from the monthly payment table
        $result2 = $this->model->genLandownersTeaDetails();
        $monthlyTPrice=$this->model->getmonthlyTPrice();
        //$arr=array_merge($result);
        
        //$json_arr=json_encode($arr);
        $this->view->render('accountant/pdf2',$result,$result2,$monthlyTPrice);
    }
    function landownersGraphpage($lid){
        $this->getNotificationCount();
        $_POST['lid']=$lid;
        $name=$this->model->getLandownersName();
        $getLandownerTeaSupply=$this->model->getLandownerTeaSupply();
        $this->view->render('accountant/landownersGraphpage',$name,$getLandownerTeaSupply);
    }
    function getTeaDeatilsforBarchart($lid){
        $_POST['lid']=$lid;
        $getLandownerTeaSupply=$this->model->getLandownerTeaSupply();
        $json_arr=json_encode($getLandownerTeaSupply);
        //print_r($json_arr);
        echo $json_arr;
    }
    function requests(){ //advance requests
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            if($_POST['action']=='Reject'){
                $result=$this->model->rejecttAdvanceRequest();
            }
            else{
                $result=$this->model->acceptAdvanceRequest();
            }
            
            if($result==true){
                $_POST['success']=1;
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $this->getNotificationCount();
            $this->view->showPage('accountant/requests');
        }
        
    }
    // testing model
    function testModel(){
        $this->view->auction=$this->model->testModel();
        $this->view->showPage('accountant/test');
    }
    //auction details page
    function auction(){
        $result = $this->model->auction();
       // print_r($result);
       $this->getNotificationCount();
        $this->view->render('accountant/auction', $result);
        //$this->view->showPage('accountant/auction');
    }

    //Manage Profile
    function profile()
    {
        $this->getNotificationCount();
        $this->view->render('user/profile/profile');
    }
    
    function editProfile()
    {
        $this->getNotificationCount();
        include '../app/controllers/User.php';
        $user = new User();
        $user->loadModelUser('user');
        $user->editProfile();
    }

    function enterPassword()
    {   
        $this->getNotificationCount();
        $this->view->render('user/profile/enterPassword');
    }

    function getLandonwerTable(){
        $tblResult = $this->model->getLandonwerTable();
        $json_arr=json_encode($tblResult);
        echo $json_arr;// echo passes the data 
    }
    // income card - dashboard
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

    function expenses30(){ // 
        $result1 = $this->model->instockExp30();//fertilizer expenses
        $result2 = $this->model->paymentExp30();//payment expenses
        

        $arr=array_merge($result1,$result2);
        // print_r($tblResult);
        $json_arr=json_encode($arr);
        //print_r($json_arr);
        echo $json_arr;
    }
    // get advacne request details 
    function getAdvanceRequests(){
        $reslt=$this->model->getAdvanceRequests();
        $json_arr=json_encode($reslt);
        echo $json_arr;
    }

    //Get Notification
    function setNotification($notification)
    {
        if (!empty($notification)) {
            echo '<div id="all_notifications">';
            for ($i = 0; $i < count($notification); $i++) {
                switch ($notification[$i]['notification_type']) {
                    case 'warning':
                        $imgPath = URL . '/vendors/images/notifications/warning.jpg';
                        break;
                    case 'request':
                        $imgPath = URL . '/vendors/images/notifications/request.jpg';
                        break;
                }

                switch ($notification[$i]['read_unread']) {
                    case 0:
                        $notificationStatus = "unread";
                        break;
                    case 1:
                        $notificationStatus = "read";
                        break;
                }
                $dateTime = $notification[$i]['receive_datetime'];
                echo
                '<div class="sec new ' . $notification[$i]['notification_type'] . ' ' . $notificationStatus . '" id="n-' . $notification[$i]['notification_id'] . '">
                        <div class = "profCont">
                            <img class = "notification_profile" src = "' . $imgPath . '">
                        </div>
                        <div class="txt ' . $notification[$i]['notification_type'] . '">' . $notification[$i]['message'] . '</div>
                        <div class="txt sub">' . $dateTime . '</div>
                    </div>';
            }
            echo '</div>';
        } else {
            echo
            '<div id="all_notifications">
                <div class="nothing">
                    <i class="fas fa-child stick"></i>
                    <div class="cent">Looks Like your all caught up!</div>
                </div>
            </div>';
        }
    }

    public function getNotificationCount()
    {
        $notificationCount = $this->model->getNotificationCount($_GET);
        return $notificationCount;
    }

    function getNotification()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['notification_type'])) {
                $notification = $this->model->getNotification($_POST);
                $this->setNotification($notification);
            }
        }
    }


    //get all the details to the payment form 
    function loadPayment(){
        $names=$this->model->getLandownerNamePayment();//get the name of the landowner for the payment form 
        
        $teaCollection=$this->model->getteaCollection();//get the details of the tea handed over to the factory by lid in that month
        $monthlyTPrice=$this->model->getmonthlyTPrice();
        $fertilizer=$this->model->getFertilizer();
        $fertilizerPrice=$this->model->getFertilizerPrice();
        $advance=$this->model->getAdvance();
        $arr=array_merge($names,$teaCollection,$monthlyTPrice,$fertilizer,$fertilizerPrice,$advance);
        
        $json_arr=json_encode($arr);
        // $json_arr2=json_encode($reslt);
        //echo gettype($lastPaymentDate);
        echo $json_arr;
    }

    //get the gross income of a particluar landowner - Accountant payment
    function getGrossIncome(){
        $lastPaymentDate=$this->model->getLastPaymentDate();
        $grossIncome=$this->model->getGrossIncome($lastPaymentDate);
        $json_arr=json_encode($grossIncome);
        echo $json_arr;
    }

    function getLastPaymentDate(){
        $reslt=$this->model->getLastPaymentDate();
        $json_arr=json_encode($reslt);
        echo $reslt;
    }
    function getMonthlyTPrice(){
        $reslt=$this->model->getLastPaymentDate();
        $json_arr=json_encode($reslt);
        echo $reslt;
    }

    function checkPayment(){//check whether the landowner is already paid for that month
        $result=$this->model->checkPayment();
        $json_arr=json_encode($result);
        echo $json_arr;
    }

    function setPayment(){
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            $result = $this->model->setPayment();
            if($result==true){
                //$this->getNotificationCount();
                //$this->view->showPage('accountant/pdf');
                $_POST['success']=1;
            }
            else{
                echo "failed to add";
            }
        }
        else{
            echo "failed to add POST not set";
        }
        
    }

    function getPayment(){ // get the details of payments to payment form of make payment
        $reslt=$this->model->getPayment();
        $json_arr=json_encode($reslt);
        echo $json_arr;
    }

    function deletePayment(){//delete a row from payment table
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            $result = $this->model->deletePayment();
            if($result==true){
                
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to delete";
            }
        }
        else{
            echo "Data was not passed to the controller";
        }
    }

    
}

    
?>