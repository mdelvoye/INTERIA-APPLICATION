<?php
/**
 * Created by PhpStorm.
 * User: mdelvoye
 * Date: 28/11/2017
 * Time: 15:53
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include APPPATH.'third_party/ripcord/ripcord.php';


class Odoo_model extends CI_Model
{
    public $user_id;
    public $db;
    public $url;
    public $login;
    public $password;
    public $ep_common = "/xmlrpc/2/common";
    public $ep_object = "/xmlrpc/2/object";
    public $resp_error_code = 404;
    public $resp_success_code = 200;
    public $ripcord;
    public $model;


    public function __construct()
    {
        parent::__construct();
        $this->load->config('odoo');
        $this->db = $this->config->item('db');
        $this->url = $this->config->item('url');
        $this->login = $this->config->item('login');
        $this->password = $this->config->item('password');

        $this->ripcord = new Ripcord();

        $this->user_id = $this->ripcord->client($this->url . $this->ep_common)->authenticate($this->db, $this->login, $this->password, array());

        if (!is_int($this->user_id)){
            echo "IMPOSSIBLE D'ACCEDER A LA BASE DISTANTE ! ";
        }
        $this->model = $this->ripcord->client($this->url . $this->ep_object);

    }


    public function is_member($name, $password)
    {
        $reponse = $this->model->execute_kw($this->db, $this->user_id, $this->password, 'ms.webapp', 'web_api_login',
            array(
                array($name),
                array($password),
            ));
        return $reponse;

    }
    
    public function checkAttendance($idBadge){
        $reponse = $this->model->execute_kw($this->db, $this->user_id, $this->password, 'ms.webapp', 'web_api_check_attendance',
            array(
                array($idBadge),
            ));
        return $reponse;
    }

    public function doAttendanceCheckIn($idBadge){
        $reponse = $this->model->execute_kw($this->db, $this->user_id, $this->password, 'ms.webapp', 'web_api_do_attendance_check_in',
            array(
                array($idBadge),
            ));
        return $reponse;

    }
    public function doAttendanceCheckOut($idBadge, $idAttendance){
        $reponse = $this->model->execute_kw($this->db, $this->user_id, $this->password, 'ms.webapp', 'web_api_do_attendance_check_out',
            array(
                array($idAttendance),
            ));
        return $reponse;

    }
    public function dateTimeOdooServer($idAttendance, $check){
        $reponse = $this->model->execute_kw($this->db, $this->user_id, $this->password, 'ms.webapp', 'web_api_date_time_check',
            array(
                array($idAttendance),
                array($check),
            ));
        return $reponse;
    }
    
    public function getCurrentDateAttendances($idBadge){
        $date = new DateTime('NOW');
        
        $orders = $this->model->execute_kw($this->db, $this->user_id, $this->password,
                'hr.attendance', 'search_read',
                array(
                    array(
                        array('x_check_in_web', 'like', $date->format('Y-m-d%') ),
                        )
                ),
                # donnees recuperees
                array('fields' => array('x_check_in_web', 'x_check_out_web')));
        return $orders;
        
    }



}
