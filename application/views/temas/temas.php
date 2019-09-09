<div class="main">
    <!-- End Section Tabs -->
    <div class="section section-pagination">
        <div class="container">
            <!-- Section Temas de interes -->
            <h3 class="title">Temas de Interes</h3>

            <blockquote>
                <h4>Haga Click sobre la imagen para seleccionar.</h4>
                <p>Debe seleccionar mínimo cinco (5) temas.</p>
            </blockquote>
            <form action="" method="post" id="formtema" onsubmit="validar()">
                <hr>
                <div class="bd-example" id="listadodinamico">

                </div>
                <div class="card-footer text-center">
                    <div class="pull-left">
                        <div id="errores"></div>
                    </div>
                </div>
                <div class="input-group no-border input-lg">
                  <input name="pkusuario" name="pkusuario" type="hidden" class="form-control" value="<?php echo $usuario['id']; ?>" required  />
                </div>
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            </form>

        </div>
    </div>
</div>