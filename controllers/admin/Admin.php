<?php

    class Admin extends Controller {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->showPage('Admin/Admin');
        }

        public function createAccount() {
            $this->view->showPage('Admin/createAccount');
        }

         public function viewAccount() {
            $this->view->showPage('Admin/viewAccount');
        }

         public function viewAccount1() {
            $this->view->showPage('Admin/viewAccount1');
        }

         public function updateAccount() {
            $this->view->showPage('Admin/updateAccount');
        }

         public function updateAccount1() {
            $this->view->showPage('Admin/updateAccount1');
        }

        public function deleteAccount() {
            $this->view->showPage('Admin/deleteAccount');
        }

          public function deleteAccount1() {
            $this->view->showPage('Admin/deleteAccount1');
        }

        public function admin() {
            $this->view->showPage('Admin/Admin');
        }

        public function setTeaPrice() {
            $this->view->showPage('Admin/setteaprice');
        }
    }

?>
