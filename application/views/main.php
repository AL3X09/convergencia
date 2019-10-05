<div class="main">

      <div class="section section-pagination">
        <div class="container">
           <!-- Section Temas de interes -->
          <div class="row">
            <div class="col-md-8 col-sm-12">
                <?php
                $cont = 0;
                foreach ($contenido as $row)
                {
                  if ($cont > 0) {
                    echo'<div class="col-md-12 col-sm-12">';
                        echo $row;
                    echo'</div>';
                  }
                  $cont ++;
                }
                ?>
              </div>
              <div class="col-md-4 col-sm-12">
              <?php
              foreach ($candidatos as $row)
                {
                  if($row['nombres'] != "Voto en Blanco"){
                    echo'<div class="col-md-12 col-sm-12">';
                        echo $row['nombres']." ".$row['apellidos'];
                        echo "<br>";
                        echo base_url();
                        echo base_url().$row['filename'];
                        echo $row['descripcion'];
                    echo'</div>';
                  }
                }
                ?>
              </div>
            </div>
            
          <br>
        </div>

      </div>

</div>