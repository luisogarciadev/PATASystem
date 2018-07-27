<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('LoadViews'))
{
    function LoadViews($var = '', $data)
    {
    	$CI = &get_instance();
    	$CI->load->view('templates/header', $data);
        $CI->load->view($var, $data);
        $CI->load->view('templates/footer', $data);
    }   
}
