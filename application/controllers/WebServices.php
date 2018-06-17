<?php
/**
 * Created by PhpStorm.
 * User: remy
 * Date: 07/12/2017
 * Time: 10:13
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class WebServices extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('odoo_model');

    }

    public function index($method = NULL, $id = NULL){

        switch ($method){
            case 'receiptOrder' :
                //appel fonction
                $this->receiptOrder($id);
                break;

            default : break;
        }
    }

    private function receiptOrder($idOrder){
        echo  $this->odoo_model->state($idOrder) == True ? "relais" : "";
    }

}