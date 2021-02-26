<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ExportControllers extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
        $this->load->library('Excel');
        // load model
        $this->load->model('Export_model', 'export');
        $this->load->model('NoteModels');
        $this->load->model('EtudiantsModels');
    }    
 
    // create xlsx
    public function generateXls() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $listInfo = $this->export->exportList();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'LISTES DES MATIERS');
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Num');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'Matiere');
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'abrevations');     
        // set Row
        $rowCount = 3;
        foreach ($listInfo as $list) {
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->matiere_id);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->matiere_fullname);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->matiere_abrev);
            $rowCount++;
        }
        $filename = "tutsmake". date("Y-m-d-H-i-s").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }
    /***
     * export tous les  etudiants 
     */
    public function exportListeEtudiants()
    {
         // create file name
         $fileName = 'data-'.time().'.docx';  
         // load excel library
         $this->load->library('excel');
         $listInfo = $this->export->etudiantInsctes();
         $objPHPExcel = new PHPExcel();
         $objPHPExcel->setActiveSheetIndex(0);
         // set Header
 
         $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'LISTES DES ELEVES');
         $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Num');
         $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'NOM');
         $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'PRENOM');
         $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'SEXE'); 
         $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'DATE DE NAISSANCE'); 
         $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'LIEU DE NAISSANCE'); 
         $objPHPExcel->getActiveSheet()->SetCellValue('G2', 'ADRESSE');     
         // set Row
         $rowCount = 3;
         foreach ($listInfo as $list) {
             $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->etudiant_im);
             $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->etudiant_nom);
             $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->etudiant_prenom);
             $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->etudiant_sexe);
             $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->etudiant_date_de_naissance);
             $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->etudiant_lieu_de_naissance);
             $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->etudiant_adresse);
             $rowCount++;
         }
         $filename = "tutsmake". date("Y-m-d-H-i-s").".xlsx";
         header('Content-Type: application/vnd.ms-excel'); 
         header('Content-Disposition: attachment;filename="'.$filename.'"');
         header('Cache-Control: max-age=0'); 
         $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
         $objWriter->save('php://output'); 
  
    }

    /**
     * export cahier journale e
     * 
     */

    public function exportCahier() {
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $caisse = $this->export->exportCaisse();
        $data= array(
			'Total_entre' => $this->export->exportCaisse()[2],
			'Total_sortie' => $this->export->exportCaisse()[3],
			'Reste_total' => $this->export->exportCaisse()[1]
		);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'JOURNALES DES COMPTES'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'NUM');
        $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'MONTANT ENTRANT'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'MONTANT SORTIE');
        $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'DESIGNATION'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'ANNEE SCOLAIRE');   
        $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'DATE');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'TOTAL ENTRANT');
        $objPHPExcel->getActiveSheet()->setCellValue('H1', 'TOTAL SORTIE');
        $objPHPExcel->getActiveSheet()->setCellValue('I1', 'RESTE TOTAL');
        // set Row
        $rowCount = 3;
        foreach ($caisse[0] as $list) {
            // var_dump($list[0]->anne_scolaire);exit;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list->id_caisse);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->entrant);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->sortie);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->designation);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->anne_scolaire);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->date);
            
            $rowCount++;
        }
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $data['Total_entre']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $data['Total_sortie']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $data['Reste_total']);


        $filename = "cahier de journale ". date("Y-m-d").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }
    /**
     * Export bulletion 1 elleves
     */
    public function ExportBulletin() {

		$idClasse = $this->uri->segment(3);
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        
		$data['note_per_trimestre'] = $this->NoteModels->get_note_eleves(array(
			'classe_id' => $idClasse,
			'id_anne_scolaire' => $this->uri->segment(5)
        ),true); 
		$tmp_data = $this->EtudiantsModels->getOneEtudiants($this->uri->segment(4));
        $data['nom_etudiant'] = array(
			'etudiant_im'  => $tmp_data[0]->etudiant_im,
			'etudiant_nom' => $tmp_data[0]->etudiant_nom.' '.$tmp_data[0]->etudiant_prenom
		);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header

        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'BULLETIN'); 
        // $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'NUM');
        // $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'MONTANT ENTRANT'); 
        // $objPHPExcel->getActiveSheet()->SetCellValue('C2', 'MONTANT SORTIE');
        // $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'DESIGNATION'); 
        // $objPHPExcel->getActiveSheet()->SetCellValue('E2', 'ANNEE SCOLAIRE');   
        // $objPHPExcel->getActiveSheet()->SetCellValue('F2', 'DATE');
        // $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'TOTAL ENTRANT');
        // $objPHPExcel->getActiveSheet()->setCellValue('H1', 'TOTAL SORTIE');
        // $objPHPExcel->getActiveSheet()->setCellValue('I1', 'RESTE TOTAL');
        // set Row
        $rowCount = 3;
        foreach ($$note_per_trimestre[$trim][$nom_etudiant['etudiant_im']]  as $list) {
            // var_dump($list[0]->anne_scolaire);exit;
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $list,$note_per_trimestre['1ERTRIM'][$nom_etudiant['etudiant_im']]);
            // $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->entrant);
            // $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->sortie);
            // $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->designation);
            // $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->anne_scolaire);
            // $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->date);
            
            $rowCount++;
        }
        // $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $data['Total_entre']);
        // $objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $data['Total_sortie']);
        // $objPHPExcel->getActiveSheet()->setCellValue('I'.$rowCount, $data['Reste_total']);


        $filename = "cahier de journale ". date("Y-m-d").".csv";
        header('Content-Type: application/vnd.ms-excel'); 
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
        $objWriter->save('php://output'); 
 
    }
     
}
?>