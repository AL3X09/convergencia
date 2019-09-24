<div class="main">
    <!-- End Section Tabs -->
    <div class="section section-pagination">
        <div class="container">
            <!-- pk usuario-->
            <div class="input-group no-border input-lg">
                <input name="pkusuario" id="pkusuario" type="hidden" class="form-control"
                    value="<?php echo $usuario['id']; ?>" required />
            </div>
            <!-- <div class="bd-example" id="listapreguntas">
            </div>Section Temas de interes -->
            <h3 class="title">Preguntas por Temas de Interes</h3>

            
            <form id="formrespuestas" onsubmit="validarresp()">

            <div class="input-group no-border input-lg">
                  <input name="conser" id="conser" type="hidden" class="form-control" value="<?php echo intval($_GET['se']); ?>" required  />
                </div>

            </form>

        </div>
    </div>
</div>