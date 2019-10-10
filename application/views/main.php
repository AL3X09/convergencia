<div class="main">

      <div class="section section-pagination">
        <div class="container">
        <h2 class="text-center">Candidatos</h2>
           <!-- Section Temas de interes -->
          <div class="row">
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
                    echo'<img class="card-img-top" src="http://186.145.37.212/legoria/orm/public/thumbnail/_/200/200/crop/good/'.$row['filename'].'" alt="" class="rounded" >';
                    echo '<div class="card-body">';
                       // echo '<img src="http://186.145.37.212/legoria/orm/public/thumbnail/_/200/200/crop/good/'.$row['filename'].'" alt="" class="rounded" style="max-width: 80%;">';
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
        </div>

      </div>

</div>