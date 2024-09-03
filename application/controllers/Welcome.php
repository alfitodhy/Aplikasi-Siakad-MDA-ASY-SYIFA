<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$username = $this->session->userdata['username'];
		$level = $this->session->userdata['level'];

		if (!isset($username)) {
			redirect('login');
		}

		if ($level == 'admin') {
			redirect('admin');
		} elseif ($level == 'guru') {
			redirect('guru');
		} elseif ($level == 'siswa') {
			redirect('siswa');
		}
	}
}
