<div class="main">
      <div class="section section-pagination">
        <div class="container">
           <!-- Section candidatos de interes -->
          <div class="row">
          <h2 class="col text-center">Candidatos</h2>
            <div class="col-12">
              <div id="carousel-demo" class="carousel">

              <?php
              $counta=0;
              foreach ($candidatos as $row)
                {
                  if($row['nombres'] != "Voto en Blanco"){
                    $counta=$counta+1;
                    $classPrint='<div class="item-'.(string)$counta.'">';
                    echo($classPrint);
                    echo'<div class="card text-center" style="width: 22rem;">';
                    echo'<img class="card-img-top" src="'.base_url().'orm/public/thumbnail/_/200/200/crop/good/'.$row['filename'].'" alt="" class="rounded" >';
                    echo '<div class="card-body">';
                        echo'<h4 class="card-title">'.$row['nombres']." ".$row['apellidos'].'</h4>';
                        echo' <p class="card-text">'.$row['descripcion'].'</p>';    
                        echo'<a href="'.$row['link_pagina'].'"class="btn btn-primary" target="_blanck">Ver más</a>';
                    echo'</div>';
                    echo'</div>';
                    echo'</div>';
                    
                  }
                }
                ?>
                
                </div>
              </div>
              </div>
              <br>
              <!-- Section Temas de interes -->
              <div class="row">
              <?php
              $i=1;
              foreach ($contenido as $key => $valor)
                {
                  if ($key !='id') {
                    echo '<div class="col-lg-6 col-sm-12">';
                    echo $valor;
                    echo '</div>';
                  }
                  
                  /*foreach ($row as $row2)
                  {
                    echo $row2;
                    
                  }*/
                  //echo $row->contenido_1;
                  
                }
                ?>

              </div>

            
         
        </div>
      </div>
</div>