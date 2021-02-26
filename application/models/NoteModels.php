<?php
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Models;

class NoteModels extends CI_Model
{
    public function selectOneleves($id)
    {
        $this->db->from('ETUDIANTS_SCOLAIRE_CLASSE');
		    $this->db->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im');
		    $this->db->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id');
	      $this->db->join('ANNE_SCOLAIRE', 'ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire');
	      $this->db->where('ETUDIANT.etudiant_im = ', $id);
	      $query = $this->db->get();
	      return $result = $query->result();
    }

    /**
     * Select trimestre
     *
     */
    public function get_trimestre()
    {
      return $this->db->select('*')
                  ->from('TRIMESTRE')->get()
                  ->result();

    }

    /**
    *Insertion note eleves on class
    *@param array $data_utils
    *@return boolean
    */
    public function set_note_children($data_utils)
    {
        // var_dump($data_utils['id_matiere'][1]);exit();
        for ($i=0; $i < count($data_utils['valeur']); $i++) {
          $this->db->insert('NOTES', array(
            'valeur' => $data_utils['valeur'][$i],
            'id_matiere' => $data_utils['id_matiere'][$i],
            'id_etudiant' => $data_utils['id_etudiant'][$i],
            'id_classe' => $data_utils['id_classe'][$i],
            'id_anne_scolaire' => $data_utils['id_anne_scolaire'][$i],
            'id_trimestre' => $data_utils['id_trimestre'][$i]
          ));
        }
        return $this->db->insert_id();
    }

    /**
    *@param array $data_param
    *@return object $id_eleves
    */
    private function get_eleves_not_notes($data_param, $id_trimestre)
    {
      $eleve_existed = $this->db->distinct()->select('id_etudiant')->from('NOTES')
                                ->where('id_classe', $data_param['classe_id'])
                                ->where('id_anne_scolaire', $data_param['id_anne_scolaire'])
                                ->where('id_trimestre', $id_trimestre)
                                ->get()->result_array();

      foreach ($eleve_existed as $key => $value) {
        $im_etude_exist [] =$value['id_etudiant'];
      }
      // var_dump($im_etude_exist);exit;
      return $this->db->distinct()->from('ETUDIANTS_SCOLAIRE_CLASSE')
                                ->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.id_scolarite = ETUDIANT.etudiant_im')
                                ->where('id_classe', $data_param['classe_id'])
                                ->where('id_anne_scolaire', $data_param['id_anne_scolaire'])
                                ->where_not_in('ETUDIANTS_SCOLAIRE_CLASSE.id_scolarite', $im_etude_exist)
                                ->select('ETUDIANT.etudiant_im')->get()->result_array();
    }
    /**
    *Get all note children
    *@param array $data_param
    *@return array
    */
    public function get_note_eleves($data_param, $note = NULL)
    {
      $data = $this->db->select('id_etudiant, valeur, MATIERES.matiere_abrev')->from('NOTES')
                        ->join('MATIERES', 'NOTES.id_matiere = MATIERES.matiere_id')
                        ->where('id_classe', $data_param['classe_id'])
                        ->where('id_anne_scolaire', $data_param['id_anne_scolaire'])
                        ->where('id_trimestre', 1)
                        ->get()->result();
//

      $trimestre = array(
        '1ERTRIM' => 1,
        '2EMTRIM' => 2,
        '3EMTRIM' => 3
      );
      $note_per_eleve = array(
        '1ERTRIM' => NULL,
        '2EMTRIM' => NULL,
        '3EMTRIM' => NULL
      );

      // var_dump($ele_not_notes);exit;
      foreach ($trimestre as $keys => $values) {
        $this->db->distinct()->select('id_etudiant')->from('NOTES')
                                ->where('id_classe', $data_param['classe_id'])
                                ->where('id_anne_scolaire', $data_param['id_anne_scolaire'])
                                ->where('id_trimestre', $values);
        // var_dump($values);exit;
        foreach ($this->db->get()->result() as $key => $value) {
          // print_r($value->id_etudiant);exit;

          switch ($values) {
            case 1:
              $note_per_eleve['1ERTRIM'] [$value->id_etudiant]= array();
              // var_dump($note_per_eleve);exit;
              break;

            case 2:
              // var_dump($value);exit;
              $note_per_eleve['2EMTRIM'] [$value->id_etudiant]= array();
              // var_dump($note_per_eleve);exit;
              break;
            case 3:
              $note_per_eleve['3EMTRIM'] [$value->id_etudiant]= array();
              break;

          }


        }

      }


      // var_dump($note_per_eleve);exit;
      foreach ($trimestre as $key => $value) {

      $note_mat_per_eleve = $this->db->select('MATIERES.matiere_abrev, NOTES.valeur, NOTES.id_etudiant')->from('NOTES')
                                  ->join('MATIERES', 'NOTES.id_matiere = MATIERES.matiere_id')
                                  ->where('NOTES.id_classe', $data_param['classe_id'])
                                  ->where('NOTES.id_anne_scolaire', $data_param['id_anne_scolaire'])
                                  ->where('NOTES.id_trimestre', $value)
                                  ->get()->result();
        for ($i=0; $i < count($note_mat_per_eleve); $i++) {
          for($j=0; $j < count($note_per_eleve[$key]); $j++){
            if(key_exists($note_mat_per_eleve[$i]->id_etudiant, $note_per_eleve[$key])){
              $note_per_eleve[$key][$note_mat_per_eleve[$i]->id_etudiant] [$note_mat_per_eleve[$i]->matiere_abrev]= $note_mat_per_eleve[$i]->valeur;
              // print_r($note_per_eleve);exit;
            }
            break;
          }
        }
      }
      // var_dump($note_per_eleve['1ERTRIM']);exit;
      if($note == NULL){
        $moyenne_per_eleve = array(
          '1ERTRIM' => NULL,
          '2EMTRIM' => NULL,
          '3EMTRIM' => NULL
        );
        foreach ($trimestre as $nom_tri => $id_tri) {
          if($note_per_eleve[$nom_tri] == NULL)
          {
            // var_dump("Mandalo");exit;
            break;
          }
          else{
            foreach ($note_per_eleve[$nom_tri] as $key => $value) {
              // var_dump($note_per_eleve['1ERTRIM'][$key]);exit;
              $moyenne_tmp = 0;
              foreach ($note_per_eleve[$nom_tri][$key] as $keys => $values) {
                $moyenne_tmp += $values;
              }
              // var_dump($note_per_eleve);exit;
              $moyenne_per_eleve[$nom_tri] [$key] =  doubleval($moyenne_tmp /count($note_per_eleve[$nom_tri][$key]));
              // var_dump($moyenne_per_eleve);exit;
            }
          }

        }

        // $note_per_eleve = array(
        //   '1ERTRIM' => NULL,
        //   '2EMTRIM' => NULL,
        //   '3EMTRIM' => NULL
        // );
        // var_dump($this->get_eleves_not_notes($data_param));exit;
        if (count($moyenne_per_eleve['1ERTRIM']) > 0)
        {
          foreach ( $this->get_eleves_not_notes($data_param, 1) as $key => $value){
            $moyenne_per_eleve['1ERTRIM'] [$value['etudiant_im']] = NULL;
          }
        }

        if (count($moyenne_per_eleve['2EMTRIM']) > 0)
        {
          foreach ( $this->get_eleves_not_notes($data_param, 2) as $key => $value){
            $moyenne_per_eleve['2EMTRIM'] [$value['etudiant_im']] = NULL;
          }
        }

        if (count($moyenne_per_eleve['3EMTRIM']) > 0)
        {
          foreach ( $this->get_eleves_not_notes($data_param, 3) as $key => $value){
            $moyenne_per_eleve['3EMTRIM'] [$value['etudiant_im']] = NULL;
          }
        }

//
        // var_dump($moyenne_per_eleve);exit;
        return $moyenne_per_eleve;
      }
      else{
        // var_dump($note_per_eleve);exit;
        return $note_per_eleve;
      }
    }

    /**
     * Get numbers note on classe
     */
    public function get_numbers_note($id_classe)
    {
      return $this->db->select('nombre_matiere')->from('CLASSES')
                      ->get()->result();
    }


    /**
     * Select etudiant to set notes
     * @param $data_utils
     */
    public function eleves_empty_note_mat($data_utils)
    {
      // var_dump($data_utils);exit;
      $on_bdd = $this->db->select('id_etudiant')->from('NOTES')
                         ->where('id_matiere', $data_utils['id_matiere'])
                         ->where('id_classe', $data_utils['id_classe'])
                         ->where('id_trimestre', $data_utils['id_trimestre'])
                         ->where('id_anne_scolaire', $data_utils['id_anne_scolaire'])
                         ->get()->result_array();
      // var_dump($on_bdd);exit;
      if(empty($on_bdd)){
        return $this->db->from('ETUDIANTS_SCOLAIRE_CLASSE')
                           ->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id')
                           ->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im')
                           ->where('CLASSES.classe_id', $data_utils['id_classe'])
                           ->where('ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire', $data_utils['id_anne_scolaire'])
                           ->select('ETUDIANT.*')->get()->result();
        // var_dump($all_etudiant);exit;

      }
      else{
        // var_dump($on_bdd);exit;
        $on_bdd_exist = array();
        foreach ($on_bdd as $key => $value) {
            $on_bdd_exist[] = $value['id_etudiant'];
        }
        $etu = $this->db->from('ETUDIANTS_SCOLAIRE_CLASSE')
                  ->where('id_classe', $data_utils['id_classe'])
                  ->where('id_anne_scolaire', $data_utils['id_anne_scolaire'])
                  ->where_not_in('etudiant_im', $on_bdd_exist)
                  ->select('etudiant_im')->get()->result_array();
        $all_etu_im = array();

        if(empty($etu)){
          return NULL;
        }else{
          foreach ($etu as $key => $values) {
            $all_etu_im[] = $values['etudiant_im'];
          }
          // var_dump($all_etu_im);exit;
          return $this->db->select('*')->from('ETUDIANT')
                                    ->where_in('ETUDIANT.etudiant_im', $all_etu_im)
                                    ->get()->result();
          }
        }
      // var_dump($on_bdd);exit;
      // $this->db->from('NOTES')
      //          ->join('ETUDIANT', 'NOTES.id_etudiant = ETUDIANT.etudiant_im')

    }


    /**
     * Calcul moyenne trimestrielle des eleves
     * @param $data
     * @return array
     * Hatory vet2 lets iah
     */
    public function get_avg_etu($data)
    {
        try{

          $data = $this->db->from('NOTES')
                 ->join('ETUDIANT', 'NOTES.id_etudiant = ETUDIANT.etudiant_im')
                 ->join('MATIERES', 'NOTES.id_matiere = MATIERES.matiere_id')
                 ->where('NOTES.id_anne_scolaire', $data['id_anne_scolaire'])
                 ->where('NOTES.id_etudiant', $data['etudiant_im'])
                 ->where('NOTES.id_classe', $data['classe_id'])
                 ->select('NOTES.id_etudiant as im, NOTES.valeur as note, NOTES.id_trimestre')
                 ->group_by('NOTES.id_trimestre')->get()->result();
          var_dump($data[1]);exit;
          foreach ($data as $key) {
            var_dump($key);
            exit;
          }
        }catch(Exception $e){

          echo $e->getMessage();
        }
    }


    /**
    *Get note etudiant one trimestry
    *@param array $param
    *@return object $notes
    */
    public function note_eleves($param)
    {
      // var_dump($param);exit;
      return $this->db->from('NOTES')
                      ->join('MATIERES', 'NOTES.id_matiere = MATIERES.matiere_id')
                      ->where('NOTES.id_anne_scolaire', $param['id_anne_scolaire'])
                      ->where('NOTES.id_etudiant', $param['etudiant_im'])
                      ->where('NOTES.id_classe', $param['classe_id'])
                      ->where('NOTES.id_trimestre', $param['trimestre_id'])
                      ->select('MATIERES.matiere_fullname, NOTES.valeur')
                      ->get()->result();
    }

}
