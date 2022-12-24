<!-- Footer -->
<footer class="page-footer fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">
    <div class="container">
      <div class="row">
        <div class="copyright-text col-xl-6 col-lg-6 col-md-6 col-sm-12"><span>© <?php echo date('Y'); ?> Copyright: <a class="dark-grey-text" href="/">  <?php bloginfo(); ?></a></span></div>
        <div class="studio-logo col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <a href="/">
            <img src="<?php echo get_stylesheet_directory_uri()."/assets/img/logo.png"; ?>" width="50" height="50">
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

    <!-- Plugin JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php bloginfo('stylesheet_directory'); ?>/assets/js/custom.js"></script>
    <?php wp_footer(); ?>
  </body>

</html>
