    <footer class="footer" data-background-color="black">
      <div class=" container ">
        <nav>
          <ul>
            <li>
              <a href="<?php echo base_url(); ?>nosotros">
                Nosotros
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>terminos">
                Terminos y Condiciones
              </a>
            </li>
            <li>
              <a href="<?php echo base_url(); ?>politicas">
                Politicas de privacidad
              </a>
            </li>
          </ul>
        </nav>
        <div class="copyright" id="copyright">
          &copy;
          <script>
            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
          </script>, Desiñado por
          <a href="https://www.invisionapp.com" target="_blank">Invision</a>. y
          <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
        </div>
      </div>
    </footer>
  
  
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  JS Intenro-->
  <script src="<?php echo base_url(); ?>assets/js/jspaginas/tema.js" type="text/javascript"></script>  
  <script src="<?php echo base_url(); ?>assets/js/jspaginas/pregunta.js" type="text/javascript"></script>  
  <script src="<?php echo base_url(); ?>assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // the body of this function is in assets/js/now-ui-kit.js
      nowuiKit.initSliders();
    });

    function scrollToDownload() {

      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script>
</body>

</html>