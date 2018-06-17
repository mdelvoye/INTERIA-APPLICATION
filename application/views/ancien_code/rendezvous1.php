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
            <h2>Rendez Vous</h2>
        </div>

        <div class="container">
            <div class="list-group">
                <div  class="row">
                    <?php
                    foreach ($orders as $order){?>
                    <div class="col-lg-4 col-md-6" id="elem-<?php echo $order['id'];?>">
                        <div class="list-group-item active listeli">
                            <h5 class="list-group-item-heading tittleRequirement"><?php echo encoding($order['name']);?></h5>
                            <hr/>


                            <div class="row">
                                <div class="col">
                                    <?php echo encoding($order['client_name']);?>
                                    <br/>
                                    <?php echo encoding($order['client_street']);?>
                                    <br/>
                                    <?php echo encoding($order['client_street2']);?>
                                    <br/>
                                    <?php echo encoding($order['client_zip']." - ".$order['client_city']);?>
                                </div>
                                <div class="col">
                                    Tel : xx.xx.xx.xx.xx
                                </div>
                            </div>
                            <hr/>



                            <?php
                            $devilery = formatDatetime($order['date_delivery'],"UTC");
                            $attributes = array('id' => 'delivery-form','class'=>'form-inline');
                            echo form_open('membre/delivery_order_process', $attributes);
                            ?>
                            <div class="row">
                                <form>
                                    <input type="hidden" name="order_id" value="<?php echo $order['id'];?>">

                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><i class="material-icons">date_range</i></div>
                                        <input type="text" class="form-control-sm" name="deliveryDate" id="deliveryDate" placeholder="jjmmaaaa" value="<?php echo $devilery['date'];?>">
                                    </div>

                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><i class="material-icons">access_time</i></div>
                                        <input type="text" class="form-control-sm" name="deliveryTime" id="deliveryTime" placeholder="hhmm" value="<?php echo $devilery['time'];?>">
                                    </div>

                                    <button type="submit">
                                        <i class="material-icons icon-validation">event</i>
                                    </button>
                                </form>
                            </div>


                        </div>




                    </div>
                    <?php } ?>

                </div><!-- End Row -->
            </div>

        </div>
    </div>
</body>
</html>
