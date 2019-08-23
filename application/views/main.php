<div class="main">
      <div class="section section-images">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="hero-images-container">
                <img src="assets/img/hero-image-1.png" alt="">
              </div>
              <div class="hero-images-container-1">
                <img src="assets/img/hero-image-2.png" alt="">
              </div>
              <div class="hero-images-container-2">
                <img src="assets/img/hero-image-3.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- End Section Tabs -->


      <div class="section section-pagination">
        <div class="container">
<?php
echo $retorno;
        foreach ($retorno as $row)
        {
          echo $row;
          echo $row->title;
          echo $row->name;
          echo $row->body;
        }
?>

           <!-- Section Temas de interes -->

          <h3 class="title">Temas de Interes</h3>
          <div class="row">
            <div class="col-md-12">


                <ul class="ks-cboxtags">
                  <li><input type="checkbox" id="checkboxOne" value="Rainbow Dash"><label for="checkboxOne">Educacion</label></li>
                  <li><input type="checkbox" id="checkboxTwo" value="Cotton Candy" checked><label for="checkboxTwo">Salud</label></li>
                  <li><input type="checkbox" id="checkboxThree" value="Rarity" checked><label for="checkboxThree">Transporte</label></li>
                  <li><input type="checkbox" id="checkboxFour" value="Moondancer"><label for="checkboxFour">Infraestructura</label></li>
                  <li><input type="checkbox" id="checkboxFive" value="Surprise"><label for="checkboxFive">Seguridad</label></li>
                  <li><input type="checkbox" id="checkboxSix" value="Twilight Sparkle" checked><label for="checkboxSix">Impuestos</label></li>
                  <li><input type="checkbox" id="checkboxSeven" value="Fluttershy"><label for="checkboxSeven">Fluttershy</label></li>
                  <li><input type="checkbox" id="checkboxEight" value="Derpy Hooves"><label for="checkboxEight">Derpy Hooves</label></li>
                  <li><input type="checkbox" id="checkboxNine" value="Princess Celestia"><label for="checkboxNine">PrincessCelestia</label></li>
                </ul>
                <!-- End Section temas de interes -->
            </div>



           
          </div>
          <br>
          
        </div>
      </div>


    </div>