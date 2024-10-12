p<!-- 資造庫連線程式載入 -->
<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once("php_lib.php") ?>
<?php
//驗證帳號是否登入
if (!isset($_SESSION['login'])) {
  $sPath = "login.php?sPath=orderlist";
  header(sprintf("Location: %s", $sPath));
}
?>

<!doctype html>
<html lang="zh-TW">

<head>
  <?php require_once('headfile.php'); ?>
  <style>

  </style>
</head>

<body>
  <section id="header">
    <?php require_once('navbar.php'); ?>
  </section>





  <section style="margin-top: 8rem;margin-bottom: 15rem;">
<div>
  <?php require_once('order_content.php'); ?>
</div>
  </section>



  <section id="footer">
    <?php require_once('footer.php'); ?>
  </section>




  <?php require_once('jsfile.php'); ?>
</body>

</html>
