<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membre extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    private function hashPassword($password, $login){
        $dateJour = date('Y-m-d');
        $password = hash('sha256', $password);
        $newCrypt = hash('sha256', $password.$login.$dateJour);
        return $newCrypt;
    }

    private function formatDateTimeParis($dateTime){
        // Transformation
        $dateDay =substr($dateTime,0,2);
        $dateMonth =substr($dateTime,2,2);
        $dateYear =substr($dateTime,4,4);
        $timeHour =substr($dateTime,0,2);
        $timeMinute =substr($dateTime,2,2);
        $dateDeliveryPhp = $dateYear."-".$dateMonth."-".$dateDay." ".$timeHour.":".$timeMinute.":00";
        #$dateDeliveryOdoo = formatDatetime($dateDeliveryPhp,"PARIS");
        return $dateDeliveryPhp;
    }


    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('odoo');
        // Load encryption library
        $this->load->library('encryption');
        //Form
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Models
        $this->load->model('odoo_model');

        $this->load->helper('odoo_helper');



    }

    public function index(){

        $this->load->view('membre/header');
        $this->load->view('membre/login');
        $this->load->view('membre/footer');
    }
    public function pointage(){
        $data = array();
        $data['attendances'] = $this->odoo_model->getCurrentDateAttendances($this->session->idBadge);        
        $this->load->view('membre/header');
        $this->load->view('membre/pointage', $data);
        $this->load->view('membre/footer');
        
        
    }


    public function user_login_process(){

        $this->form_validation->set_rules('user', 'N° de Bagde', 'required');
        $this->form_validation->set_rules('passwd', 'Mot de passe', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo "ERREUR sur le formulaire";
        }
        else{
            //Recuperation des données du formulaire
            $username = $this->input->post('user');
            $password = $this->input->post('passwd');

            //Validation du couple Login / mot de passe auprés de Odoo
            $hmacKey = $this->hashPassword($password, $username);
            $is_member = $this->odoo_model->is_member($username,$hmacKey);
            

            if ($is_member >= 1){
                $attendance = $this->odoo_model->checkAttendance($username);
                if ( $attendance == True ){
                    $this->session->set_userdata('idAttendance', $attendance);
                }
                $this->session->set_userdata('logged_in', true);
                $this->session->set_userdata('idBadge', $username);
                
                
                redirect('membre/pointage');
            }
            else{
                redirect('membre/index');
            }
        }
    }
    public function doAttendance(){

        $idBadge = $this->session->idBadge;
        
        if (isset($this->session->idAttendance)){
            # Si c'est une sortie
            
            $response = $this->odoo_model->doAttendanceCheckOut($idBadge, $this->session->idAttendance);
            $dateAttendance = $this->odoo_model->dateTimeOdooServer($this->session->idAttendance, 'check_out');
            $humanDate = DateTime::createFromFormat("Y-m-d H:i:s", formatDateTime($dateAttendance, 'UTC')['datetime']);
            $this->session->set_userdata('dateAttendance', $humanDate->format("d/m/Y \à H:i:s"));
            $this->session->unset_userdata('idAttendance');
            redirect('membre/pointage');
            
        
            
        }else{
            
            #Si c'est une entrée
            $attendance = $this->odoo_model->doAttendanceCheckIn($idBadge);
            $this->session->set_userdata('idAttendance', $attendance);
            $dateAttendance = $this->odoo_model->dateTimeOdooServer($this->session->idAttendance, 'check_in');
            $humanDate = DateTime::createFromFormat("Y-m-d H:i:s", formatDateTime($dateAttendance, 'UTC')['datetime']);
            $this->session->set_userdata('dateAttendance', $humanDate->format("d/m/Y \à H:i:s"));
            redirect('membre/pointage');
        }



    }

    public function disconnect() {
        session_destroy();
        redirect('membre/index');
    }











    

}
