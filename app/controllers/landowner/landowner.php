<?php

class landowner extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->showPage('landowner/landowner');
    }

    function Make_Requests()
    {
        $this->view->showPage('landowner/Make_Requests');
    }

    function Update_Tea_Availability()
    {
        $this->view->showPage('landowner/Update_Tea_Availability');
    }

    function Monthly_Income()
    {
        $this->view->showPage('landowner/Monthly_Income');
    }

    function Daily_Net_Weight()
    {
        $this->view->showPage('landowner/Daily_Net_Weight');
    }

    function Monthly_Tea_Price()
    {
        $this->view->showPage('landowner/Monthly_Tea_Price');
    }
}