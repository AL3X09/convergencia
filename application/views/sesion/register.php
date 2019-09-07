<!--Vista de registro-->
<!--Desarrollo 19-08-2019-->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(<?php echo base_url(); ?>assets/img/login.jpg)"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">

          <?php 
            if($this->session->flashdata('success'))
            {
              echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('success').'</div>';
            }	
  				?>

          <?php
            // Open form and set URL for submit form
            echo form_open('Register/registrar',array('id'=>'formregistro',));
          ?>
              <div class="card-header text-center">
                <div class="logo-container">
                  <img src="<?php echo base_url(); ?>assets/img/now-logo.png" alt="">
                </div>
              </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="nombres" id="nombres" type="text" class="form-control" placeholder="Nombres..." required>
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="apellidos" id="apellidos" type="text" class="form-control" placeholder="Apellidos..." required>
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo..." required>
                </div>
                <div class="input-group input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>

                  <?php
                    echo form_dropdown('localidad', $municipio, '', 'class="form-control" required');
                  ?>

                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario..." required/>
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input name="password" id="password" type="password" placeholder="Contraseña..." class="form-control" required/>
                </div>
                <div class="input-group no-border input-lg">
                
              </div>
             
              <div class="card-footer text-center">
                  <div class="pull-left">
                    <div id="errores"></div>
              </div>

              <div class="card-footer text-center">
                <input type="submit" value="Crear cuenta" class="btn btn-primary btn-round btn-lg btn-block">
                
                <div class="pull-left">
                  <h6>
                    <a href="<?php echo base_url(); ?>Login" class="link">iniciar sesión</a>
                  </h6>
                </div>
                
              <?php 
              // Close Form
              echo form_close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>