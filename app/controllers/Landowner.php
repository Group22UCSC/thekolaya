<?php

class Landowner extends Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function index()
    {
        //get fertilizer usage to the dash board chart
        $result = $this->model->chartValuse();
        $this->view->render('landowner/landowner', $result);
    }


    function Make_Requests()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insertRequest($_POST);

            // $this->view->render('landowner/Make_Requests');
            // print_r($result);
        } else {
            $this->view->render('landowner/Make_Requests');
        }
    }



    function Update_Tea_Availability()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['availability'] == 'on') {
                $data = [
                    'tea_availability' => 1,
                    'no_of_estimated_containers' => ''
                ];
            }
            if ($_POST['containers']) {
                $data['no_of_estimated_containers'] = $_POST['containers'];
            }
            // echo $_POST['containers'];
            $this->model->Update_Tea_Availability($data);
        } else {
            $availability = $this->model->getAvailability();
            // print_r($availability);
            $this->view->render('landowner/Update_Tea_Availability', $availability);
        }
    }



    function Monthly_Income()
    {

        $this->view->render('landowner/Monthly_Income');
    }

    function getMonthlyIncome()
    {
        $result = $this->model->getMonthlyIncome();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }

    function getSearchMonthDetails()
    {
        $date = $_POST['date'];
        // print_r("dfs");
        $result = $this->model->getSearchMonthDetails($date);
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }


    function Daily_Net_Weight()
    {
        if (!empty($_POST)) {
            $result = $this->model->searchDailyDetails();
            if ($result) {
                // print_r($result);
                $this->view->render('landowner/Daily_Net_Weight', $result);
            } else {
                $_POST['Error'] = "Search date not found";
                $result = $this->model->getLandonwerTable();
                $this->view->render('landowner/Daily_Net_Weight', $result);
                return false;
            }
        } else {

            $result = $this->model->getLandonwerTable();
            $this->view->render('landowner/Daily_Net_Weight', $result);
        }
    }



    function Monthly_Tea_Price()
    {
        $result = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
        $this->view->showPage('landowner/Monthly_Tea_Price', $result);
    }



    //test
    public function Test()
    {
        if (!empty($_POST)) {


            $result = $this->model->searchDailyDetails();
            if ($result) {
                // print_r($result);
                $this->view->render('landowner/test', $result);
            } else {
                $this->view->render('landowner/test?', $result);
                return false;
            }
        } else {
            $result = $this->model->getLandonwerTable();
            $this->view->render('landowner/test', $result);
        }
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



    //monthly tea price
    function getTeaPrice()
    {
        $result = $this->model->teaPriceTable();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }




    //dashbord cards

    function lastMonthIncomeAndAdvance()
    {
        $result = $this->model->lastMonthIncomeAndAdvance();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }



    //get tea qulity to dashboard
    function getTeaQulity()
    {
        $result = $this->model->getTeaQulity();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }




    //get fertilizer usage to the dash board
    function fertilizerUsage()
    {
        $result = $this->model->fertilizerUsage();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }


    //last month tea price for mothly details 
    function lastMonthTeaPrice()
    {
        $result = $this->model->lastMonthTeaPrice();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }


    function abc()
    {
        $result = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
    }




    //deleteFertilizerRequestsInMakeRequests

    public function deleteFertilizerRequests()
    {
        $this->view->showPage('landowner/deleteFertilizerRequests');
    }

    function getFertilizerRequest()
    {
        $result = $this->model->requestTableFertilizer();
        $json_arr = json_encode($result);
        echo $json_arr;
    }

    function deleteRequestRow()
    {
        if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
            $result = $this->model->deleteRow();
            if ($result == true) {
            } else {
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        } else {
            echo "Data was not passed to the controller";
        }
    }





    //deleteAdvanceRequestsInMakeRequests

    public function deleteAdvanceRequests()
    {
        $this->view->showPage('landowner/deleteAdvanceRequests');
    }


    function getAdvanceRequest()
    {
        $result = $this->model->requestTableAdvance();
        $json_arr = json_encode($result);
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

    //load emergency message page
    function viewEmergencyMessage()
    {
        $this->getNotificationCount(); //This for get Notification count
        $this->view->showPage('landowner/EmergencyMessage');
    }

    //send emergency message to manager
    function sendEmergencyMessage()
    {
        $this->getNotificationCount(); //This for get Notification count
        $msg_data = [
            'message' => '',
            'agent_id' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->msg_data['message'] = trim($_POST['message']);
            $this->msg_data['agent_id'] = $_SESSION['user_id'];
            $this->model->storeEmergencyMessage($this->msg_data);
            $_SESSION['availability'] = 0;
            print_r($this->msg_data);
            $this->view->showPage('landowner/EmergencyMessage');
        }
    }
}
