<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Caja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('Usuario');
        $this->load->helper('url');
        $this->load->database();
    }
    
    public function indexCaja()
    {
        $this->load->view('Caja/vender');
    }
}