<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Loader extends CI_Loader
{
    function __construct()
    {
        parent::__construct();
    }
    
    function publicView($load_page, $data)
    {
        $this->view('header', $data);
        $this->view($load_page, $data);
        $this->view('footer', $data);
    }
}