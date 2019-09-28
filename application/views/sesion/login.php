<!--
=========================================================
* Pagina del login
=========================================================
* Desarrollado 19-08-2019
=========================================================
-->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(<?php echo base_url(); ?>assets/img/login.jpg)"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
          <?php
            // Open form and set URL for submit form
            echo form_open('Login/acceder',array('id'=>'formsesion',));
          ?>
              <div class="card-header text-center">
                <div class="logo-container">
                  <img src="<?php echo base_url(); ?>assets/img/Logo_app.png" alt="">
                </div>
              </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="usuario" name="usuario" type="text" class="form-control" placeholder="Usuario..." required />
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input id="password" name="password" type="Password" placeholder="Contraseña..." class="form-control" required />
                </div>
              </div>
              <div class="card-footer text-center">
                  <div class="pull-left">
                    <div id="errores"></div>
                  </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Iniciar sesión</button>
                <div class="pull-left">
                  <h6>
                    <a href="<?php echo base_url(); ?>Register" class="link">Crear cuenta</a>
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