<div class="page-header">
    <div class="page-header-image" data-parallax="true" style="background-image: url('assets/img/bogota.jpg');"></div>
    <div class="container" data-type="content">
        <div class="row">
            <blockquote class="blockquote">
                <p class="mb-0">Candidato/os.</p>
            </blockquote>
        </div>

        <div class="row">

            <div class="col-12 col-md-offset-2" id="listadocandidato">

            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class=" col-md-8 col-sm-12">
                <div class="container" id="valores">

                    <div class="card">
                        <div class="card-body">
                        <h3 class="card-title text-dark">Datos estadísticos según respuestas</h3>
                            <blockquote class="blockquote blockquote-primary mb-0">
                                <div class="">
                                    <canvas id="datacandidato"></canvas>
                                </div>

                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="input-group no-border input-lg">
            <input name="pkusuario" id="pkusuario" type="hidden" class="form-control"
                value="<?php echo $usuario['id']; ?>" />
        </div>
        <div class="input-group no-border input-lg">
            <input name="conser" id="conser" type="hidden" class="form-control"
                value="<?php echo intval($_GET['se']); ?>" required />
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="wrapper" id="contenidoModal">


            </div>

        </div>
    </div>
</div>