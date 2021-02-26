<?php
use CodeIgniter\Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

class ParametreControllers extends CI_Controller {

	public function __construct(){
	
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('ClasseModels');
			$this->load->model('EtudiantsModels');
			$this->load->model('Anne_ScolaireModels');
            $this->load->model('EnseignantsModels', 'em');
			$this->load->model('ParametreModels');
			$this->load->helper('url_helper');
	
    }

	// liste Anne scolaire
	public function listeAnnescolaire()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);						
		$data['liste'] = $this->load->Anne_ScolaireModels->select_anne();							
		$this->load->view('pages/parametres/anne_scolaire.php', $data);
		$this->load->view('temp/script.php');
	}

	// addd Anne Scolaire
	public function annescolaire()
	{
		if($this->input->post('enregistrer'))
		{
            $anne = $this->input->post('input_val');
			// var_dump($anne);
			// var_dump($is_inserted);
			$inserted = $this->Anne_ScolaireModels->add_scolaire($anne);
			// if($inserted)
				redirect(base_url() . 'ParametreControllers/listeAnnescolaire');
		// 	else
		// 		echo " Veuillez reesseyer";
		}
		else if($this->input->post('modifier'))
		{
            $anne = $this->input->post('input_val');
			// $id = $this->input->post('count');
			$inserted = $this->Anne_ScolaireModels->up_add_scolaire($anne);
			// if($inserted)
				redirect(base_url() . 'ParametreControllers/listeAnnescolaire');
			// else
			// 	echo " Veuillez reesseyer";

			
		}else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}
	// Classe
    public function addClasse()
	{
		if($this->input->post('save'))
		{
            $parm = $this->input->post('input_val');
			
			$inserted = $this->ClasseModels->add_classe($parm);
			// var_dump($parm);
			// var_dump($is_inserted);
			if($inserted)
				redirect(base_url() . 'ParametreControllers/listeClasse');
			else
				echo " Veuillez reesseyer";
		}
		else if($this->input->post('modifier'))
		{
            $up_classes =array(
				
				'id_econome_etudiant' => $this->input->post('id_econome_etudiant'),
				'designation' => $this->input->post('designation'),
				'montant' => $this->input->post('montant'),
				'id_anne_scolaire' => $this->input->post('id_anne_scolaire')
			);
			$inserted = $this->ClasseModels->update_classe($up_classes);
			if($inserted)
				redirect(base_url() . 'ParametreControllers/listeClasse');
			else
				echo " Veuillez reesseyer";
		}
		else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}
	// mise a jour
	public function update_classe()
	{
		if($this->input->post('ajour'))
		{
			// $id = $this->input->post('classe_id');
			$param = array(
				'classe_id' => $this->input->post('classe_id'),
				'classe_nom' => $this->input->post('classe_nom'),
				'classe_serie' => $this->input->post('classe_serie'),
				'nombre_matiere' => $this->input->post('nombre_matiere')
			);	
			$inserted = $this->ParametreModels->update_classe($param);
			// var_dump($parm);
			// var_dump($is_inserted);
			$this->session->set_flashdata('success', 'Enregistrement réussite');
				redirect(base_url() . 'ParametreControllers/classeSelect');
			
		}
		else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}
	// listes Classes
	public function listeClasse()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);						
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$data['annescolaire'] = $this->load->ClasseModels->select_classes();
		$this->load->view('pages/parametres/classes.php', $data);
		$this->load->view('temp/script.php');
	}
	

	public function classeSelect($id_element = NULL)
	{	
		$idClasse = $this->uri->segment(3);
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');	
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['listematiere'] = $this->ParametreModels->get_matiere_on_classe($idClasse);	
		$data['anne_scolaire'] = $this->load->Anne_ScolaireModels->select_anne();	
		$data['professeurs'] = $this->em->liste();
		$data['classe_etudiants'] = $this->EtudiantsModels->classeSelect_etu($idClasse);
		$data['get_matProfClasse'] = $this->ParametreModels->get_mat_professeur_classe($idClasse);
		// if($id_element != NULL){
		// 	$data['data_element'] = $this->ParametreModels->get_element($id_element);
		// }
		// var_dump();exit;
		$data['classe_id'] = $idClasse;
 		$this->load->view('pages/parametres/ClasseSelect.php', $data);
		$this->load->view('temp/script.php');
	}



	public function assigne()
	{
		
		if($this->input->post('save'))
		{
			$numbersMat = $this->EtudiantsModels->classeSelect_etu($this->input->post('classe_id')[0])[0]->nombre_matiere;
			$numbersMatTmp = $this->EtudiantsModels->get_numbers_mat($this->input->post('classe_id')[0]);
			$insert_or_update = null;
			$prof_test = $this->input->post('professeur_id');
			$mat_test = $this->input->post('matiere_id');
			$coef_test = $this->input->post('coefficient');
			$anne_test = $this->input->post('id_anne_scolaire');
			$classe_test = $this->input->post('classe_id');
			$prof = array();
			$matiere = array();
			$coefficient = array();
			$classe = array();
			$anne = array();
			// var_dump($this->input->post('classe_id'));exit;
			if( $numbersMat == $numbersMatTmp )
			{
				$insert_or_update = 1;
			}
			else{
				$insert_or_update = 0;
			}
			// var_dump($this->input->post('professeur_id'));exit();
			$count = 0;
			for ($i=0; $i < count($prof_test); $i++) { 
				if($count > 0)
				{
					break;
				}
				elseif(($prof_test[$i] == "") OR $mat_test[$i] == "" )
				{
					$count += 1;
				}
			}
			if($count > 0)
			{
				
				for($i = 0; $i < count($prof_test); $i++){
					if($prof_test[$i] != "")
					{ 
						$prof[] = $prof_test[$i];
						$matiere[] = $mat_test[$i];
						$coefficient[] = $coef_test[$i];
						$classe[] = $classe_test;
						$anne[] = $anne_test[$i];
					}
					
				}
				$data= array(
					'professeur_id'=> $prof,
					'classe_id'=> $classe,
					'matiere_id'=> $matiere,
					'coefficient'=> $coefficient,
					'id_anne_scolaire'=> $anne
				);
				$inserted = $this->ParametreModels->assin_classe($data, $insert_or_update);
				$this->session->set_flashdata('error', 'Vous pouvez enregistrer toute les matieres apres !!');
			}
			else{
				for ($i=0; $i < count($prof_test); $i++) { 
					$classe[] = $classe_test;
				}
				$data= array(
					'professeur_id'=> $prof_test,
					'classe_id'=> $classe,
					'matiere_id'=> $mat_test,
					'coefficient'=> $coef_test,
					'id_anne_scolaire'=> $anne_test
				);
				
				
				$inserted = $this->ParametreModels->assin_classe($data, $insert_or_update);
				
			}
			// var_dump($data['classe_id']);exit;

			$this->session->set_flashdata('success', 'Enregistrement réussite');
			redirect(base_url() . 'ParametreControllers/classeSelect/'.$data['classe_id'][0]);
				
		}
	}

	public function updateProf_mat()
	{	
		$id = $this->uri->segment(3);

		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');	
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['listematiere'] = $this->ParametreModels->matiereListe();	
		$data['anne_scolaire'] = $this->Anne_ScolaireModels->select_anne();	
		$data['professeurs'] = $this->em->liste();
		$data['classe_etudiants'] = $this->EtudiantsModels->classeSelect_etu($id);
		$data['get_matProfClasse'] = $this->ParametreModels->get_mat_professeur_classe($id);
		$data['update'] = $this->ParametreModels->fetch_single_attr($id);
		$this->load->view('pages/parametres/update_prof_matiere_classe.php',$data);
		$this->load->view('temp/script.php');
		
	}

	public function update_one()
	{
		if($this->input->post('update'))
		{
			$data= array(
                'professeur_id'=> $this->input->post('professeur_id'),
                'classe_id'=> $this->input->post('classe_id'),
				'matiere_id'=> $this->input->post('matiere_id'),
                'coefficient'=> $this->input->post('coefficient'),
                'id_anne_scolaire'=> $this->input->post('id_anne_scolaire')
			);
			$num = $this->input->post('id');
			$this->ParametreModels->mise_a_jour($num,$data);
			
			$this->session->set_flashdata('success', 'Modification des proffesseur  Reussite réussite');
			redirect(base_url() . 'ParametreControllers/classeSelect/'.$data['classe_id'][0]);
		}
	}

	/** Mise a jours des professeurs dans une Classes
	 * Get id where is true in Classe id
	 * 
	 */

	public function get_prof_classe()
	{
		$idClasse = $this->uri->segment(3);
		$data['get_matProfClasse'] = $this->ParametreModels->get_mat_professeur_classe($idClasse);
	}
	
	/**fin get professeurs in classe */

	



	// { Parametrer les fonctions d'etablissement !!}
	public function listeFonctions()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);							
		$data['liste_fonctions'] = $this->ParametreModels->liste_fonctions();							
		$this->load->view('pages/parametres/fonction_liste.php', $data);
		$this->load->view('temp/script.php');
	}
	// { add fonctions }
	public function add_fonctions()
	{
		if($this->input->post('save'))
		{
            $new_fonctions = $this->input->post('input_val');
			
			$inserted = $this->ParametreModels->newFonctions($new_fonctions);
			// var_dump($new_fonctions);
			// var_dump($is_inserted);
			if($inserted)
				redirect(base_url() . 'ParametreControllers/listeFonctions');
			else
				echo " Veuillez reesseyer";
		}
		else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}
	// {liste Matiere}
	public function listeMatiere()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);						
		$data['listematiere'] = $this->ParametreModels->matiereListe();							
		$this->load->view('pages/parametres/Listematiere.php', $data);
		$this->load->view('temp/script.php');
	}
	public function add_matiere()
	{
		if($this->input->post('save'))
		{
            $new = $this->input->post('input_val');
			
			$inserted = $this->ParametreModels->newMatiere($new);
			// var_dump($new_fonctions);
			// var_dump($is_inserted);
			if($inserted)
				redirect(base_url() . 'ParametreControllers/listeMatiere');
			else
				echo " Veuillez reesseyer";
		}
		else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}

	public function ListePersonnels()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);							
		$this->load->model('EnseignantsModels', 'em');
		$data['liste'] = $this->em->liste();	
		$data['listematiere'] = $this->ParametreModels->matiereListe();	
		$data['personnelesListe'] = $this->ParametreModels->listePersonnels();
        $data['liste_fonctions'] = $this->ParametreModels->liste_fonctions();							
		$this->load->view('pages/parametres/personnels.php', $data);
		$this->load->view('temp/script.php');
	}
	/**
	 * ensregistrer Personnels
	 */
	public function addPersonnels()
	{
		if($this->input->post('save')){

            $id_fonctions = $this->input->post('id_fonction');
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
					'fonction'=> $this->input->post('id_fonction'),
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_De_naissance'=> $this->input->post('date_De_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'contacte'=> $this->input->post('contacte')

                );

                $professeur_id = $this->ParametreModels->add_personnels($parm,$id_fonctions,$user);
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
					'fonction'=> $this->input->post('id_fonction'),
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_De_naissance'=> $this->input->post('date_De_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'contacte'=> $this->input->post('contacte')

                );
                $professeur_id = $this->ParametreModels->add_personnels($parm,$id_fonctions,$user);
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				return redirect('ParametreControllers/ListePersonnels');
			}
           
        }else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
			return redirect('ParametreControllers/ListePersonnels');
		}
	}
	/**
	 * Modification des Personnels
	 */
	function recuperationPerso($id = null){
        $data['personnels'] = $this->ParametreModels->getOnePerso($id);
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$data['classeListe'] = $this->load->ClasseModels->select_classes();
		$this->load->view('temp/sidebar.php', $data);
		$data['liste_fonctions'] = $this->ParametreModels->liste_fonctions();	
		$data['listematiere'] = $this->load->ParametreModels->matiereListe();
		// $data['compteProfesseur'] = $this->load->em->compte();
		$this->load->view('pages/parametres/ModifierPerso', $data);
		$this->load->view('temp/script.php');
       
    }
	/**
	 * Modification Personnels
	 */
	public function update_Personnels()
	{
		if($this->input->post('save')){

            $id_fonctions = $this->input->post('id_fonction');
            $id_personnels = $this->input->post('id_personnel');
            $user_id = $this->input->post('user_id');
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
					'fonction'=> $this->input->post('id_fonction'),
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_De_naissance'=> $this->input->post('date_De_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'contacte'=> $this->input->post('contacte')

                );

                $professeur_id = $this->ParametreModels->update_personnels($parm,$id_personnels,$user,$user_id,$id_fonctions);
				$this->session->set_flashdata('success', 'Modification réussite, mais photo non enregistre');
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
					'fonction'=> $this->input->post('id_fonction'),
                    'nom'=> $this->input->post('nom'),
                    'prenom'=> $this->input->post('prenom'),
                    'CIN'=> $this->input->post('CIN'),
                    'IM'=> $this->input->post('IM'),
                    'sexe'=> $this->input->post('sexe'),
                    'date_De_naissance'=> $this->input->post('date_De_naissance'),
                    'code_cadre'=> $this->input->post('code_cadre'),
                    'corps_grade'=> $this->input->post('corps_grade'),
                    'date_entre'=> $this->input->post('date_entre'),
                    'CRPS'=> $this->input->post('CRPS'),
                    'diplome_academique_eleves'=> $this->input->post('diplome_academique_eleves'),
                    'diplome_pedagogique_eleves'=> $this->input->post('diplome_pedagogique_eleves'),
                    'contacte'=> $this->input->post('contacte')

                );
                $professeur_id = $this->ParametreModels->update_personnels($parm,$id_personnels,$user,$user_id,$id_fonctions);
				$this->session->set_flashdata('success', 'Modification réussite');
				return redirect('ParametreControllers/ListePersonnels');
			}
           
        }else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
			return redirect('ParametreControllers/ListePersonnels');
		}
	}
	/**
	 * Details sur une Personnels
	 */
	// Enseignat parametre
	public function Insertion (){
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
                $professeur_id = $this->em->add_Enseignants($parm,$id_fonctions,$id_matiere,$user);
				$this->session->set_flashdata('success', 'Enregistrement réussite');
				return redirect('ParametreControllers/ListePersonnels');
			}
           
        }else
		{
			$this->session->set_flashdata('error', 'Pas de enregisrement faite !!');
			return redirect('EnseignantsControllers/enseignant');
		}
    }

	// trimestre
	public function trimestre()
	{
		$this->load->view('temp/header.php');
		$this->load->view('temp/menuBar.php');
		$this->load->view('temp/sidebar.php');							
        $data['liste'] = $this->ParametreModels->liste_trimestre();							
		$this->load->view('pages/parametres/trimestre.php', $data);
		$this->load->view('temp/script.php');
	}
	public function add_trimestre()
	{
		if($this->input->post('save'))
		{
            $new_trime = $this->input->post('input_val');
			
			$inserted = $this->ParametreModels->newtrimestre($new_trime);
			// var_dump($new_fonctions);
			// var_dump($is_inserted);
			if($inserted)
				redirect(base_url() . 'ParametreControllers/listeFonctions');
			else
				echo " Veuillez reesseyer";
		}
		else
		{
			echo " pas d'enregistrement faite !! ";
		}
	}
	
}
	
?>
