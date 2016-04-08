<?php 
class Er extends Ci_Controller{
function __construct(){
parent::__construct();

}
function index(){
$this->load->view('er');
//echo '<img src="http://pixtox.com/assets/img/bg.jpg" width="100%">';
}
}