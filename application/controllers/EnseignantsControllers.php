<?php 
use CodeIgniter\Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

class EnseignantsControllers extends CI_Controller{

    public function __construct(){
        
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            $this->load->model('EnseignantsModels', 'em');
            $this->load->model('ParametreModels');
            $this->load->model('ClasseModels');
            $this->load->helper('url_helper');
        
        }

    function Insertion (){
        if($this->input->post('save')){

            $id_fonctions = $this->input->post('id_fonction');
            $id_matiere = $this->input->post('id_matiere');
            // $user = array(
            //     'user_name' => $this->input->post('user_name'),
            //     'user_password' => $this->input->post('user_password'),
            //     'id_fonction' => $this->input->post('id_fonction')
            // );
            
			$Img = array(
				'upload_path' => './image',
				'allowed_types' => 'jpg|png|jpeg',
				'max_size' => 4000
			);
			$this->load->library("upload",$Img);
			if(!$this->upload->do_upload('enseignatImage'))
			{
                // var_dump("le tsy mande");exit;
                $fd = $this->upload->data();
				$fn = $fd['file_name'];
                // add proffesseurs compte
                $user = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => $this->input->post('user_password'),
                    'id_fonction' => $this->input->post('id_fonction')
                );

            
                $parm= array(
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_de_naissance'=> $this->input->post('date_de_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'matiere_enseigne'=>  $this->input->post('id_matiere'),
                    'contacte'=> $this->input->post('contacte')

                );

                $professeur_id = $this->em->add_Enseignants($parm,$id_fonctions,$id_matiere,$user);
				$this->session->set_flashdata('success', 'Enregistrement réussite, mais photo non enregistre');
				return redirect('EnseignantsControllers/enseignant');
            }
			else 
			{
                // var_dump("le mande");exit;
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
                 // add proffesseurs compte
                 $user = array(
                    'image' => $fn,
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => $this->input->post('user_password'),
                    'id_fonction' => $this->input->post('id_fonction')
                );
                $parm= array(
                    'image' => $fn,
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_de_naissance'=> $this->input->post('date_de_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'matiere_enseigne'=>  $this->input->post('id_matiere'),
                    'contacte'=> $this->input->post('contacte')

                );
                $professeur_id = $this->em->add_Enseignants($parm,$id_fonctions,$id_matiere,$user);
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				return redirect('EnseignantsControllers/enseignant');
			}
           
        }else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
			return redirect('EnseignantsControllers/enseignant');
		}
    }


    function Modification()
    {
       //raha miexiste io table professeur io da modifievagny
        if(isset($_POST) && count($_POST)>0){

            $id_fonctions = $this->input->post('id_fonction');
            $professeur_id = $this->input->post('professeur_id');
            $id_matiere = $this->input->post('id_matiere');
            $user_id = $this->input->post('user_id');
            // $parm = array (
            //     'professeur_nom'=> $this->input->post('nom'),
            //     'professeur_prenom'=> $this->input->post('prénom'),
            //     'professeur_contact'=> $this->input->post('contact')
            // );
            
              
			$Img = array(
				'upload_path' => './image',
				'allowed_types' => 'jpg|png|jpeg',
				'max_size' => 4000
			);
			$this->load->library("upload",$Img);
			if(!$this->upload->do_upload('enseignatImage'))
			{
                // var_dump("le tsy mande");exit;
                $fd = $this->upload->data();
				$fn = $fd['file_name'];
                // add proffesseurs compte
                $user = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => $this->input->post('user_password'),
                    'id_fonction' => $this->input->post('id_fonction')
                );

            
                $parm= array(
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_de_naissance'=> $this->input->post('date_de_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'matiere_enseigne'=>  $this->input->post('id_matiere'),
                    'contacte'=> $this->input->post('contacte')

                );

                $this->em->update_profeseur($professeur_id,$parm,$user,$user_id,$id_fonctions,$id_matiere);
				$this->session->set_flashdata('success', 'Enregistrement réussite, mais photo non enregistre');
                return redirect('ParametreControllers/ListePersonnels');
            }
			else 
			{
                // var_dump("le mande");exit;
				$fd = $this->upload->data();
				$fn = $fd['file_name'];
                 // add proffesseurs compte
                 $user = array(
                    'image' => $fn,
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => $this->input->post('user_password'),
                    'id_fonction' => $this->input->post('id_fonction')
                );
                $parm= array(
                    'image' => $fn,
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_de_naissance'=> $this->input->post('date_de_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'matiere_enseigne'=>  $this->input->post('id_matiere'),
                    'contacte'=> $this->input->post('contacte')

                );
                $this->em->update_profeseur($professeur_id,$parm,$user,$user_id,$id_fonctions,$id_matiere);
				$this->session->set_flashdata('success', 'Enregistrement réussite');
                return redirect('ParametreControllers/ListePersonnels');
			}
           
            // /////
            // $this->em->update_profeseur($professeur_id,$parm);            
            // redirect('EnseignantsControllers/enseignant');
        }
    }


    function suppression ($professeur_id=null){
        $this->em->delete_Enseignants($professeur_id);
        redirect('EnseignantsControllers/enseignant');
    }
    
    
    public function enseignant() 
	{
		$this->load->model('EnseignantsModels', 'em');
		$data['liste'] = $this->em->liste();
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$this->load->view('pages/prof/listeprofs.php',$data);
		$this->load->view('temp/script.php');
    }
    
    
    public function Nouveaux_enseignants()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
        $data['liste_fonctions'] = $this->ParametreModels->liste_fonctions();	
        $data['listematiere'] = $this->load->ParametreModels->matiereListe();
		$this->load->view('pages/prof/nouveaux.php', $data);
		$this->load->view('temp/script.php');
	}
    
    
    function recuperation($id = null){
        $data['professeur'] = $this->em->getOneEnseignant($id);
            $this->load->view('temp/header.php');
            $this->load->view('temp/menuBar.php');
            $data['classeListe'] = $this->load->ClasseModels->select_classes();
            $this->load->view('temp/sidebar.php', $data);
            $data['liste_fonctions'] = $this->ParametreModels->liste_fonctions();	
            $data['listematiere'] = $this->load->ParametreModels->matiereListe();
            // $data['compteProfesseur'] = $this->load->em->compte();
            $this->load->view('pages/prof/Modifier', $data);
            $this->load->view('temp/script.php');
       
    }

    function profil($id = null){
        $data['professeur'] = $this->em->getOneEnseignant($id);
            $this->load->view('temp/header.php');
            $this->load->view('temp/menuBar.php');
            $data['classeListe'] = $this->load->ClasseModels->select_classes();
            $this->load->view('temp/sidebar.php', $data);
            $data['liste_fonctions'] = $this->ParametreModels->liste_fonctions();	
            $data['listematiere'] = $this->load->ParametreModels->matiereListe();
            // $data['compteProfesseur'] = $this->load->em->compte();
            $this->load->view('pages/prof/profil', $data);
            $this->load->view('temp/script.php');
       
    }
}
?>