<!DOCTYPE html>
<html>
  <head>
    <?php $page_title = 'JavaScript Slider by UMAIR YAQUOOB'; ?>
	<?php include("header.php"); ?>
    <link rel="stylesheet" href="css/slider.css" />
  </head>
  <body>
    <section>

      <div class="slider">
        <div class="slide-viewer">
          <div class="slide-group">
            <div class="slide slide-1">
              <img src="img/slide-1.jpg" alt="No two are the same" />
            </div>
            <div class="slide slide-2">
              <img src="img/slide-2.jpg" alt="Monsieur Mints"  />
            </div>
            <div class="slide slide-3">
              <img src="img/slide-3.jpg" alt="The Flower Series"  />
            </div>
          </div>
        </div>
        <div class="slide-buttons"></div>
      </div>

    </section>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/slider.js"></script>
	<?php include("footer.php"); ?>
  </body>
</html>