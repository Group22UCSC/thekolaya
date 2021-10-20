<?php

class Supervisor extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        if($this->model->getStock()) {
            $stock = $this->model->getStock();
            $this->view->render('Supervisor/Supervisor', $stock);
        }else {
            $this->view->render('Supervisor/Supervisor');
        }
    }

    function updateTeaMeasure() {
        $this->view->showPage('Supervisor/updateTeaMeasure');
    }

    function manageRequests() {
        $request = $this->model->manageRequests();
        $this->view->render('Supervisor/manageRequests', $request);
    }

    function manageFertilizer() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['fertlizer_in'])) {
                $data = [
                    'stock_type' => 'in_stock',
                    'type' => 'fertilizer',
                    'price_per_unit' => trim($_POST['price_per_unit']),
                    'amount' => trim($_POST['amount'])
                ];
                $this->model->manageStock($data);
                $this->view->render('Supervisor/manageFertilizer');
            }else if(isset($_POST['fertilizer_out'])) {
                $data = [
                    'stock_type' => 'out_stock',
                    'type' => 'fertilizer',
                    'amount' => trim($_POST['amount'])
                ];
                $this->model->manageStock($data);
                $this->view->render('Supervisor/manageFertilizer');
            }
            
        }else {
            $this->view->render('Supervisor/manageFertilizer');
        }
    }

    function manageFirewood() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }
            
            $this->model->manageStock($data);
            $this->view->render('Supervisor/manageFirewood');
        }else {
            $this->view->render('Supervisor/manageFirewood');
        }
    }

    function fertilizerInStock() {
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'fertilizer',
        ];
        $_SESSION['search'] = 0;
        if(isset($_GET['search_btn'])) {
            $_SESSION['searchDate'] = trim($_GET['date']);
            $_SESSION['search'] = 1;
        }
        $instock = $this->model->stock($data);
        $this->view->render('Supervisor/fertilizerInStock', $instock);
        
    }

    function firewoodInStock() {
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'firewood',
            'date' => ''
        ];
        if(isset($_GET['search_btn'])) {
            $data['date'] = trim($_GET['date']);
            $instock = $this->model->stock($data);
            $searchResult = $this->model->searchByDate($data);
            $this->view->show('Supervisor/firewoodInStock', $instock, $searchResult);
        }else {
            $instock = $this->model->stock($data);
            $this->view->show('Supervisor/firewoodInStock', $instock);
        }
        
    }

    function fertilizerOutStock() {
        $this->view->showPage('Supervisor/fertilizerOutstock');
    }
    
    function firewoodOutStock() {
        $this->view->showPage('Supervisor/firewoodOutStock');
    }

    function profile() {
        $this->view->showPage('user/profile//profile');
    }

    function editProfile() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if(isset($_POST['accept-btn'])) {
                $data = [
                    'contact_number' => trim($_POST['contact_number']),
                    'name' => trim($_POST['name'])
                ];
    
                $_SESSION['contact_number'] = $data['contact_number'];
                $_SESSION['name'] = $data['name'];
                $this->view->render('user/profile/enterPassword');
            }else if(isset($_POST['enter_btn'])) {
                $data = [
                    'password' => $_POST['password']
                ];
                if($this->model->checkPassword($data)) {
                    $this->model->editProfile();
                    $this->view->render('user/profile/correctPassword');
                }else {
                    $this->view->render('user/profile/wrongPassword');
                }
            }
            
        }else{
            $this->view->render('user/profile/editProfile');
        }
    }

    function changePassword() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'password' => $_POST['password'],
                'new_password' => $_POST['new_password'],
                'confirm_password' => $_POST['confirm_password'],

                'password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            if(empty($data['new_password'])) {
                $data['password_err'] = "Please enter the old passoword";
            }else if(!($this->model->checkPassword($data))) {
                $data['password_err'] = "Wrong Password";
            }

            if(empty($data['new_password'])) {
                $data['new_password_err'] = "Please enter a new passoword";
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm the password";
            }else if($data['new_password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            if(!empty($data['password']) || !empty($data['new_password']) || !empty($data['confirm_password'])) {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $this->model->changePassword($data);
                unset($_SESSION['user_type']);
                redirect('login');
            }else {
                $this->view->render('User/forgetPassword/changePassword', $data);
            }
        }else {
            $_SESSION['controller'] = 'profile';
            otpSend();
            // $this->view->render('user/profile/');
        }
    }

}
