

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a class="site_title"><i class="fa fa-truck"></i> <span>INTERIA</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Pointages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="pointage.html">Pointer</a></li>
                    </ul>
                  </li>
      
                  
                </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo site_url('membre/disconnect');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">

              <div class="title_right">

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pointer</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <?php
                      $attributes = array('id' => 'pointage');
                      echo form_open('membre/doAttendance', $attributes);
                      ?>
                      <form id="pointage" style="height: 100%;">
                          <center>
                            <button class = "btn btn-info" style="height : 300px !important; width : 300px; ">
                                <i>
                                    <H1>Pointer</H1>
                                </i>
                            </button>
                          </center>
                      </form>
                      <center>
                          
                      
                      </center>
                      
                          
                          
                          <div class="x_content">

                            <table class="table table-striped">
                               <thead>
                                <tr>
                                  <th>Entrée</th>
                                  <th>Sortie</th>
                                </tr>
                              </thead>

                              <tbody>
                                 <?php
                                    foreach ($attendances as $attendance){
                                      ?>
                                        <tr>
                                          
                                          <td>
                                          <?php
                                          if (isset($attendance['x_check_in_web']) and $attendance['x_check_in_web']){
                                            $check_in = DateTime::createFromFormat("Y-m-d H:i:s", formatDateTime($attendance['x_check_in_web'], 'UTC')['datetime']);
                                            echo $check_in->format("d/m/Y \à H:i:s");
                                          }
                                          ?>
                                          </td>
                                          
                                        
                                        
                                          
                                          <td>
                                          <?php
                                          if (isset($attendance['x_check_out_web']) and $attendance['x_check_out_web']){
                                            $check_out = DateTime::createFromFormat("Y-m-d H:i:s", formatDateTime($attendance['x_check_out_web'], 'UTC')['datetime']);
                                            
                                            echo $check_out->format("d/m/Y \à H:i:s");
                                          }
                                          ?>
                                          </td>
                                        </tr>
                                    <?php
                                    }
                                  ?>
                                
                              </tbody>
                              
                            </table>

                        </div>
                         
                         
                      
                      

                 </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

    