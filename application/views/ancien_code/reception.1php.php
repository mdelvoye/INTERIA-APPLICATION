<?php
header( 'content-type: text/html; charset=utf-8' );
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/kanban.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Agrikolis - Réception</title>
</head>
<body>
<div id="menu-container" class="container-fluid">
    <div id="menu-row" class="row justify-content-center">
        <div id="logo" class="logo">
            <a href="<?php echo site_url('membre/menu');?>">
                <img src="../../assets/img/logo.png" class="px-auto" height="134" width="320">
            </a>
        </div>
        <div id="title" class="bg-green-agrikolis text-center col-12 py-2 text-white">
            <h2>Réception</h2>
        </div>
        <div class="container">
            <div class="list-group">
                <div  class="row">

                    <?php
                    foreach ($orders as $order){?>
                        <div class="col-lg-4 col-md-6" id="elem-<?php echo $order['id'];?>">
                            <div class="list-group-item active listeli">
                                <div class="titleclient">
                                    <h6 class="list-group-item-heading tittleRequirement"><?php echo encoding($order['name']);?></h6>
                                    <p class="list-group-item-text nameclient"> <?php echo encoding($order['client_name']);?></p>
                                    <p class="list-group-item-text nameclient"> <?php echo encoding($order['client_street']);?></p>
                                    <p class="list-group-item-text nameclient"> <?php echo encoding($order['client_street2']);?></p>
                                    <p class="list-group-item-text nameclient"> <?php echo encoding($order['client_zip']." - ".$order['client_city']);?></p>
                                    <div class="fix"></div>
                                </div>
                                <div class="listeboutton">
                                    <?php
                                    echo form_open('membre/receipt_order_process');
                                    ?>
                                    <form id="login-form" class="col-12 py-4">
                                        <input type="hidden" name="order_id" value="<?php echo $order['id'];?>">
                                        <button type="submit">
                                            <i  class="material-icons icon-validation"
                                                aria-hidden="true">
                                                move_to_inbox
                                            </i>
                                        </button>
                                    </form>
                                    <div class="fix"></div>
                                </div>
                                <div class="fix"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>