
  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
        <center><img src="<?php echo site_url(); ?>assets/img/image.png" /> </center>

      <div class="login_wrapper">
        <div class="animate form login_form">
          
          <section class="login_content">
          
          <?php
          $attributes = array('id' => 'login-form');
          echo form_open('membre/user_login_process', $attributes);
          ?>
            <form id="login-form">
                         
              <h1>Authentification</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="user"/>
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" name="passwd"/>
              </div>
              <div>
                <button class="btn btn-default submit">Log in</button>
              </div>

              <div class="clearfix"></div>

              
            </form>
          </section>
        </div>


      </div>
    </div>
  </body>
</html>
