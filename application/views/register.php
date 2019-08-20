<!--Vista de registro-->
<!--Desarrollo 19-08-2019-->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style="background-image:url(<?php echo base_url(); ?>assets/img/login.jpg)"></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="POST" action="">
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
                  <input name="nombres" id="nombres" type="text" class="form-control" placeholder="Nombres...">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="apellidos" id="apellidos" type="text" class="form-control" placeholder="Apellidos...">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="correo" id="correo" type="email" class="form-control" placeholder="Correo...">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input name="usuario" id="usuario" type="text" class="form-control" placeholder="Usuario...">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input name="password" id="password" type="text" placeholder="Contraseña..." class="form-control" />
                </div>
              </div>
              <div class="card-footer text-center">
                <button href="#" type="submit" class="btn btn-primary btn-round btn-lg btn-block">Crear cuenta</button>
                <div class="pull-left">
                  <h6>
                    <a href="<?php echo base_url(); ?>/Login" class="link">iniciar sesión</a>
                  </h6>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>