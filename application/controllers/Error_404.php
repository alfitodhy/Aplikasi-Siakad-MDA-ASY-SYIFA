<?php
class Error_404 extends CI_Controller
{

    public function index()
    {
        $data['login'] = 'this is error';
        $this->load->view('templates/header');
        $this->load->view('errors/404');
        $this->load->view('templates/footer', $data);
    }
}

/* End of file Error.php */
