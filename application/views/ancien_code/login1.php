<?php
/**
 * Created by PhpStorm.
 * User: mdelvoye
 * Date: 27/11/2017
 * Time: 16:10
 */
?>


<!DOCTYPE html>
<html class="full-height" lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrikolis</title>
</head>
<body class="full-height">
<div id="" class="container-fluid full-height txt">
    <div class="row full-height">
        <div id="login-container" class="col-12 col-md-6 col-xl-5 bg-white">
            <div id="row-login-container" class="row justify-content-center">
                <div class="hidden-lg bg-agrikolis show-md col-12">
                    <h5 class="valign text-center mx-auto my-auto text-white py-2">
                        <span style="color:#F2BB32">Relais colis</span>
                        de proximité et
                        <span style="color:#F2BB32">livraison à domicile</span>
                        <span class="bitter">pour vos produits lourds et volumineux.</span>
                    </h5>
                </div>
                <div id="logo" class="logo">
                    <img src="../assets/img/logo.png" class="px-auto" height="134" width="320">
                </div>
                <div id="title" class="bg-green-agrikolis text-center col-12 py-2 text-white">
                    <h2>Identification</h2>
                </div>

                <?php
                   $attributes = array('id' => 'login-form','class'=>'col-12 py-4');
                   echo form_open('membre/user_login_process', $attributes);
                ?>



                <form id="login-form" class="col-12 py-4">
                    <div class="input-group py-2">
                        <span class="input-group-addon" id="basic-addon1"><i class="material-icons">person</i></span>
                        <input name = "username" type="text" class="form-control" placeholder="Relais" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group py-2">
                        <span class="input-group-addon" id="basic-addon1"><i class="material-icons">visibility_off</i></span>
                        <input name = "password" type="text" class="form-control" placeholder="Mot de passe" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                        <input type="submit" class="btn col my-3" value="Entrer" />

                    <a href="menu.html"> Mot de passe oublié ?</a>
                </form>
            </div>
        </div>
        <div id="side-image" class="hidden-md col-md-6 col-xl-7 bg-agrikolis" style="background-color: rgba(0,103,37,0.4);">
            <div class="row full-height">
                <h2 class="valign text-center mx-auto my-auto text-white">
                    <span style="color:#F2BB32">Relais colis</span>
                    de proximité et
                    <span style="color:#F2BB32">livraison à domicile</span>
                    <span class="bitter">pour vos produits lourds et volumineux.</span>
                </h2>
            </div>
        </div>
    </div>
</div>
</body>


