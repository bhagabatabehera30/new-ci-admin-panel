<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
Private common functions
Author: Bhagabat Behera
*/

function get_session_details() 
{
    $CI =& get_instance();
    $data = (object)$CI->session->all_userdata();
    return $data;
}


function is_adminlogged_in()
{
  $CI =& get_instance();
  $is_logged_in = $CI->session->userdata('admindetails');
  if(!isset($is_logged_in) || $is_logged_in != true)
  {
    redirect (base_url().'administrator');
}       
}
function is_userlogged_in()
{
   $CI =& get_instance();
   $is_logged_in = $CI->session->userdata('userdetails');
   if(!isset($is_logged_in) || $is_logged_in != true)
   {
    redirect (base_url().'login');   
}       
}


