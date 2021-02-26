<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		ob_start();
	}

	public function index()
	{
		echo "erreur 404";
	}

	public function deconnexion()
	{
		$this->load->driver('cache');
		$this->session->sess_destroy();
		$this->cache->clean();
		ob_clean();
		redirect('');
	}
}
