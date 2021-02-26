<?php
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;
 
class ParametreModels extends CI_Model
{
	public function __construct(){
	
		parent::__construct();
	
	}
// create classe
    function create_classes($new_classes)
    {
        $this->db->insert('CLASSES',$new_classes);
		return $this->db->insert_id();
    }
// update classe
    function update_classe($param)
    {
        $this->db->where('CLASSES.classe_id', $param['classe_id'])
                ->update('CLASSES', array(
                    'classe_id' => $param['classe_id'],
                    'classe_nom' => $param['classe_serie'],
                    'classe_serie' => $param['classe_serie'],
                    'nombre_matiere' => $param['nombre_matiere']
                        ));
    }
    function get_classe()
    {
        $this->db->select('*');
		$this->db->from('CLASSES');
		$query = $this->db->get();
		return $result = $query->result();
    }
    function classe_section()
    {
        // $query  = $this->db->select("CLASSES.classe_id, CLASSES.classe_nom, CLASSES.max_classe,CLASSES.Titeurs, CLASSES.classe_serie,SECTION.section_nom")
        //                     ->from("SECTION")
        //                     ->join("CLASSES", "CLASSES.classe_serie = SECTION.section_id", "inner")
        //                     ->get();
        $this->db->select('*');
		$this->db->from('ETUDIANTS_SCOLAIRE_CLASSE');
		$this->db->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im');
		$this->db->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id');
		$query = $this->db->get();
        return $query->result();
        
    }
    function get_section()
    {
        $this->db->select('*');
		$this->db->from('SECTION');
		$query = $this->db->get();
		return $result = $query->result();
    }
    // {Fonxtions add }
    function newFonctions($new_fonctions)
    {
        $this->db->insert('FONCTIONS',$new_fonctions);
		return $this->db->insert_id();
    }
    
    function liste_fonctions()
    {
        $this->db->select('*');
		$this->db->from('FONCTIONS');
		$query = $this->db->get();
		return $result = $query->result();
    }
    // {trimestre }
    function newtrimestre($new_trime)
    {
        $this->db->insert('TRIMESTRE',$new_trime);
        return $this->db->insert_id();
    }
    function liste_trimestre()
    {
        $this->db->select('*');
		$this->db->from('TRIMESTRE');
		$query = $this->db->get();
		return $result = $query->result();
    }
    // { liste Matiere}
    function newMatiere($new)
    {
        $this->db->insert('MATIERES',$new);
		return $this->db->insert_id();
    }

    function matiereListe($data = NULL)
    {
        
        if($data == NULL)
        {
            // var_dump($data);exit;
            return $this->db->select('*')->from('MATIERES')
                            ->get()->result();
        }
        // else{
        //     $matiere = $this->db->select("matiere_id")
        //                     ->from('CLASSES_PROFESSEURS_MATIERE')
        //                     ->where('classe_id', $data)
        //                     ->get()->result_array();

        //     $data_id = array();
        //     foreach ($matiere as $key => $value) {
        //          $data_id[] = $value['matiere_id'];
        //     }

        //     $query = $this->db->from('MATIERES')
        //             ->where_not_in('matiere_id',array_unique($data_id))
        //             ->select('matiere_id, matiere_abrev')
        //             ->get()->result_array();
        //     // var_dump($query);exit;
        //     if(!empty($query))
        //     {
        //         return $query;
        //     }
        //     else{
        //         return array();
        //     }
        // }

		// return $result = $query->result();
    }

    /**
     * Liste matiere before set update
     * @param int $id_classe
     * @return mixed 
     */
    public function get_mat_professeur_classe($idClasse){
        $this->db->select('*')
                ->from("CLASSES_PROFESSEURS_MATIERE")
                ->join("CLASSES", "CLASSES_PROFESSEURS_MATIERE.classe_id = CLASSES.classe_id")               
                ->join("PROFESSEUR", "CLASSES_PROFESSEURS_MATIERE.professeur_id = PROFESSEUR.professeur_id")
                ->join("MATIERES", "CLASSES_PROFESSEURS_MATIERE.matiere_id = MATIERES.matiere_id")
                
                ->where('CLASSES_PROFESSEURS_MATIERE.classe_id',$idClasse);
        $query = $this->db->get();
        // var_dump($query->result());exit;
        return $query->result();
    }

    public function assin_classe($data, $insert_or_update){
        
        if($insert_or_update == 0){
            for($i = 0;$i < count($data['professeur_id']) ; $i++){

                // echo $data['professeur_id'][$i];exit();
                $this->db->insert('CLASSES_PROFESSEURS_MATIERE', array(
                    "professeur_id" => $data['professeur_id'][$i],
                    "classe_id"     => $data['classe_id'][$i],
                    "matiere_id"     => $data['matiere_id'][$i],
                    "coefficient"     => $data['coefficient'][$i],
                    "id_anne_scolaire"     => $data['id_anne_scolaire'][$i]
                ));
            }

            return $this->db->insert_id();
        }
        else{
            for($i = 0;$i < count($data['professeur_id']) ; $i++){

                // echo $data['professeur_id'][$i];exit();
                $this->db->where('professeur_id', $data['professeur_id'][$i]);
                return $this->db->update('CLASSES_PROFESSEURS_MATIERE',array(
                        "professeur_id" => $data['professeur_id'][$i],
                        "classe_id"     => $data['classe_id'][$i],
                        "matiere_id"     => $data['matiere_id'][$i],
                        "coefficient"     => $data['coefficient'][$i],
                        "id_anne_scolaire"     => $data['id_anne_scolaire'][$i]
                ));
                
            }
        }

		
		
    }

    /**
     * Get element record with id
     * @param int $id_element
     */
    function fetch_single_attr($id)
    {
        $this->db->where("num", $id)
                ->select("*")
                ->from("CLASSES_PROFESSEURS_MATIERE")
                ->join("CLASSES", "CLASSES_PROFESSEURS_MATIERE.classe_id = CLASSES.classe_id")               
                ->join("PROFESSEUR", "CLASSES_PROFESSEURS_MATIERE.professeur_id = PROFESSEUR.professeur_id")
                ->join("MATIERES", "CLASSES_PROFESSEURS_MATIERE.matiere_id = MATIERES.matiere_id");
                
        $query = $this->db->get();
        return $query->result();
    }
    function mise_a_jour($num,$data)
    {
        $this->db->where('num',$num)
                ->update('CLASSES_PROFESSEURS_MATIERE', $data);
        
    }

    // personnels

    function add_personnels($parm,$id_fonctions,$user)
    {
        $this->db->insert("	PERSONNELS_ADMINISTRATIVE",$parm);
        $personnels_id = $this->db->insert_id();

		$this->db->insert("USER",$user);
		$user_Id = $this->db->insert_id();

		$data = array(
			'id_personnels' => $personnels_id,
			'id_fonctions'	=> $id_fonctions,
			'user_id'	=> $user_Id
		);
		$this->db->insert("FONCTIONS_PERSONNELS",$data);
		return $this->db->insert_id();
    }

    function listePersonnels(){
        $this->db->select('*')
                ->from("PERSONNELS_ADMINISTRATIVE");
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Modification Personnels
     */
    function update_personnels($parm,$id_personnels,$user,$user_id,$id_fonctions)
	{
		$this->db->where('id_personnel ',$id_personnels)
		        ->update('PERSONNELS_ADMINISTRATIVE',$parm);  


		$this->db->where('user_id ',$user_id)
		        ->update('USER',$user); 
        $data = array(
            'id_personnels' => $id_personnels,
            'id_fonctions'	=> $id_fonctions,
            'user_id'	=> $user_id
        );
        $this->db->where('id_personnels ',$id_personnels);
        $this->db->update("FONCTIONS_PERSONNELS",$data);
        return $this->db->insert_id();
	}

    /**
     * get one Person
     */

    function getOnePerso($id)
	{
		$this->db->select('*')
				->from('FONCTIONS_PERSONNELS')
				->join('PERSONNELS_ADMINISTRATIVE', 'FONCTIONS_PERSONNELS.id_personnels = PERSONNELS_ADMINISTRATIVE.id_personnel')
				->join('USER', 'FONCTIONS_PERSONNELS.user_id = USER.user_id')
				->join('FONCTIONS', 'FONCTIONS_PERSONNELS.id_fonctions = FONCTIONS.id_fonctions')
				->where('id_personnels ',$id);
		$query = $this->db->get();
		return $query->result();
	}

    /**
     * Get Prof matiere
     */
    public function get_matiere_on_classe($idClasse)
    {
        $mat_assigned = $this->db->select('matiere_id')
                                     ->from('CLASSES_PROFESSEURS_MATIERE')
                                     ->where('classe_id', $idClasse) 
                                     ->get()->result_array();
        $mat_assigned_values = array();
        foreach ($mat_assigned as $key => $value) {
            $mat_assigned_values[] = $value['matiere_id'];
        }
        // var_dump($mat_assigned_values);exit;
        if(empty($mat_assigned_values)){
            return $this->db->select('*')->from('MATIERES')->get()->result();
        }
        else{
            return $this->db->select('*')->from('MATIERES')->where_not_in('matiere_id', $mat_assigned_values)
                            ->get()->result();
        }
    }

}

?>
