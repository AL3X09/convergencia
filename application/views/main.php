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
                        echo '<img src="'.base_url().'orm/public/thumbnail/_/200/200/crop/good/'.$row['filename'].'" alt="" class="rounded" style="max-width: 80%;">';
                        echo $row['descripcion'];
                        echo "<br>";
                        echo '<a href="'.$row['link_pagina'].'" target="_blanck">Ver más</a>';
                        echo "<br>";
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