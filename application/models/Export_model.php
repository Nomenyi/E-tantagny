<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
    class Export_model extends CI_Model {
 
        public function __construct()
        {
            $this->load->database();
        }
        
        public function exportList() {
            $this->db->select(array('matiere_id', 'matiere_fullname', 'matiere_abrev'));
            $this->db->from('MATIERES');
            $query = $this->db->get();
            return $query->result();
        }
        /***
         * select etudiants
         */

        function etudiantInsctes()
        {
            $this->db->select('*');
            $this->db->from('ETUDIANTS_SCOLAIRE_CLASSE');
            $this->db->join('CLASSES', 'ETUDIANTS_SCOLAIRE_CLASSE.id_classe = CLASSES.classe_id');
            $this->db->join("ANNE_SCOLAIRE","ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire ");
            $this->db->join('ETUDIANT', 'ETUDIANTS_SCOLAIRE_CLASSE.etudiant_im = ETUDIANT.etudiant_im');
            $this->db->join("PARENTS","ETUDIANTS_SCOLAIRE_CLASSE.parent_id = PARENTS.parent_id");
            $this->db->join("ETUDIANT_SCOLARITE","ETUDIANTS_SCOLAIRE_CLASSE.id_scolarite = ETUDIANT_SCOLARITE.id_scolaire ");
           
            $query = $this->db->get();
            // $sql = "SELECT * FROM ETUDIANT INNER JOIN ETUDIANTS_SCOLAIRE_CLASSE ON ETUDIANT.etudiant_im = ETUDIANTS_SCOLAIRE_CLASSE.id_etudiant
            //         INNER JOIN ANNE_SCOLAIRE ON ANNE_SCOLAIRE.id_anne_scolaire = ETUDIANTS_SCOLAIRE_CLASSE.id_anne_scolaire
            //         INNER JOIN CLASSES ON CLASSES.classe_id = ETUDIANTS_SCOLAIRE_CLASSE.id_classe";
            // $query = $this->db->query($sql);
            return $result = $query->result();
            
        }
        // export Caisses 

        function exportCaisse()
        {
            $this->db->select(('*'));
            $this->db->from('CAISSES');
            $this->db->join('ANNE_SCOLAIRE', 'CAISSES.id_anne_scolaire = ANNE_SCOLAIRE.id_anne_scolaire');
        
            $query = $this->db->get()->result();
            // var_dump($query);exit;
            $totalEntre = 0;
            $totalSortie = 0;
            for($i=0;$i < count($query); $i++)
            {
                
                $totalEntre += $query[$i]->entrant;
                $totalSortie += $query[$i]->sortie;
                
            }
            $reste = $totalEntre - $totalSortie;
            // var_dump($reste);exit;
            return array($query, $reste, $totalEntre, $totalSortie);
        }
    }
?>