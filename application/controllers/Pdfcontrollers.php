<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfcontrollers extends CI_Controller {

	public function __construct(){
	
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('EtudiantsModels');
		$this->load->model('ParametreModels');
		$this->load->model('Anne_ScolaireModels');
		$this->load->helper('url_helper');
	
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function testpdf()
	{
		$idEtu = $this->uri->segment(3);
		// $this->load->view('temp/header.php');
		$data['etudiantsSelect'] = $this->EtudiantsModels->getOneEtudiants($idEtu);
		$this->load->view('pages/eleve/certificat.php' , $data);
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'portrait');
		$this->pdf->render();

		$this->pdf->stream("Certificat de scolarité.pdf", array("Attachment"=> 0));
	}
	public function certificat()
	{
		$idEtu = $this->uri->segment(3);
		$this->load->view('temp/header.php');	
		$data['etudiantsSelect'] = $this->EtudiantsModels->getOneEtudiants($idEtu);
		
		// var_dump($data['etudiantsSelect']);exit();
		$this->load->view('pages/eleve/certificat.php',$data );
		$this->load->view('pages/eleve/certificat.php' ,$data);
	
	}
}
?>