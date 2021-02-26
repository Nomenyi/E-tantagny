
<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  
  
class Import extends CI_Controller {  

	function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('import_model');
        $this->load->model('ClasseModels');
        $this->load->model('EtudiantsModels');
    }
      

    public function uploadCsv(){
            $this->load->view('temp/header.php');
            $this->load->view('temp/menuBar.php');
            $data['classeListe'] = $this->load->ClasseModels->select_classes();
            $this->load->view('temp/sidebar.php', $data);
            $this->load->view('pages/parametres/import.php', $data);
            $this->load->view('temp/script.php');
    }
    public function importdata()
    { 
        // $this->load->view('import_data');
        if(isset($_POST["submit"]))
        {
            $file = $_FILES['file']['tmp_name'];
            $handle = fopen($file, "r");
            $numberOfFields = 7;
            $i = 0;//
            while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
            {
                $num = count($filesop );
               
                // $fname = $filesop;
                // // $lname = $filesop[2];
                // if($c <> 0)
                // {					//SKIP THE FIRST ROW
                //     $this->import_model->inserdata($fname);
                // }
                // $c = $c + 1;
                if($numberOfFields == $num){
                    for ($c=0; $c < $num; $c++) {
                       $importData_arr[$i][] = $filesop [$c];
                    }
                }
                $i++;
                // echo "ok";
                // var_dump($importData_arr[$i]);exit;
            }
            // fclose($file);

            $skip = 0;

            // insert import data
            foreach($importData_arr as $userdata){

               // Skip first row
               if($skip != 0){
                    $this->import_model->inserdata($userdata);
               }
               $skip ++;
            }
            echo "sucessfully import data !";
                
        }
    }
}
?>
