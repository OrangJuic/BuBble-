<!-- 資造庫連線程式載入 -->
<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once("php_lib.php") ?>

<!doctype html>
<html lang="zh-TW">

<head>
  <?php require_once('headfile.php'); ?>
</head>

<body>
  <section id="header">
  <?php require_once('navbar.php'); ?>
  </section>





  <section id="content" class="mx-auto">
  <?php require_once('carousel.php'); ?>


    <?php require_once('welcome.php'); ?>
  </section>



  <section id="scontent">
    <?php require_once('scontent.php'); ?>
  </section>



  <section id="about">
    <?php require_once('about.php'); ?>
  </section>



  <section id="footer">
    <?php require_once('footer.php'); ?>
  </section>




  <?php require_once('jsfile.php'); ?>
</body>

</html>

