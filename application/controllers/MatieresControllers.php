<?php 
use CodeIgniter\Controller;
defined ("BASEPATH") OR exist('no direct script acces allowed');

class MatieresControllers extends CI_Controllers{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('');
        $this->load->helper('url_helper');
    }
    
    function listMatieres()
    {
        // $this->load->model('EnseignantsModels', 'em');
		// $data['liste'] = $this->em->liste();
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');
		// $this->load->view('pages/prof/listeprofs.php',$data);
		$this->load->view('temp/script.php');
    }
}
?>