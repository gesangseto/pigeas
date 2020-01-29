<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Contact');
    }


    public function Index()
    {
        $this->load->view('Compro/Templates/Header');
        $this->load->view('Compro/Index');
        $this->load->view('Compro/Templates/Footer');
    }
    public function Service()
    {
        $this->load->view('Compro/Templates/Header');
        $this->load->view('Compro/Service');
        $this->load->view('Compro/Templates/Footer');
    }
    public function About()
    {
        $this->load->view('Compro/Templates/Header');
        $this->load->view('Compro/About');
        $this->load->view('Compro/Templates/Footer');
    }
    public function Contact()
    {
        if (!empty($_POST)) {
            $id = 'CM-' . time() . '' . mt_rand();
            $customer_message = array(
                'id' => $id,
                'fullname' => $_POST['fullname'],
                'email' => $_POST['email'],
                'phone_number' => $_POST['phone_number'],
                'message' => $_POST['message']
            );
            $execute =  $this->db->insert('customer_message', $customer_message);
            if ($execute) {
                $response = array(
                    'status' => '0',
                    'message' => 'Success send message'
                );
            } else {
                $response = array(
                    'status' => '1',
                    'message' => 'Failed send message, please try again'
                );
            }
            $this->load->view('Compro/Templates/Header');
            $this->load->view('Compro/Contact', $response);
            $this->load->view('Compro/Templates/Footer');
        } else {
            $this->load->view('Compro/Templates/Header');
            $this->load->view('Compro/Contact');
            $this->load->view('Compro/Templates/Footer');
        }
    }
}

/* Index of file Controllername.php */
