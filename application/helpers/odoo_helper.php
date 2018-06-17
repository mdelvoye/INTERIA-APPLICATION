<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');





if(! function_exists('encoding')){
    function encoding($chaine){
        if($chaine != null) {
            return xmlrpc_encode($chaine);
        }
    }
}


if(! function_exists('formatDatetime')){
    function formatDatetime($date,$fromUTC)
    {
        $retour = null;
        if ($date != null) {
            # Déclaration des TimeZone
            $utc = new DateTimeZone("UTC");
            $paris = new DateTimeZone("Europe/Paris");




            if ($fromUTC =="UTC"){
                $tzFrom = $utc;
                $tzTo = $paris;
            }
            elseif ($fromUTC =="PARIS"){
                $tzFrom = $paris;
                $tzTo = $utc;
            }

            # Transformation du DateTime récupéré  et conversion vers le bon TimeZone
            $datetime = new DateTime($date, $tzFrom);
            $datetimeTo = $datetime->setTimezone($tzTo);


            # Formatage du DateTime pour renvoyer séparément la date de l'heure en string
            $retour = array();
            $retour['date'] = $datetimeTo->format("dmY");
            $retour['time'] = $datetimeTo->format("Hi");
            $retour['datetime'] = $datetimeTo->format("Y-m-d H:i:s");


        }
        return $retour;
    }
}


