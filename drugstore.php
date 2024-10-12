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
<!----引用navbar選單列----->
  <?php require_once('navbar.php'); ?>

  </section>



<!--頂部裝飾圖像 -->
  <section id="content-img" class="mx-auto" style="padding-top: 1rem;">
    <div class="container-fluid">

      <div class="row text-center p-3">
        <div class="col-md-12 mb-3 ">
          <img src="./images/1550321-1.png" class="img-fluid mt-5 docline" >
          <!-- <p class="texttitle">

            Sale

          </p> -->
        </div>
      </div>

    </div>


  </section>










<section id="product-list">
  <div class="container-fluid">

      <div class="row mb-4 deskpd"><!-- 大row開始 -->
 <!----引用側邊按鈕----->
      <?php require_once('sidebar.php'); ?>





        <div class="col-md-8 p-1">


          <div id="bread" class="row"><!-- 麵包屑那一行 -->
          <!-- 引用麵包屑跟搜尋欄 -->
          <?php require_once('breadcrumb.php'); ?>

          </div><!-- 麵包屑那一行結尾 -->


          <!----引用product list卡片區----->
          <?php require_once('product_list.php'); ?>


        </div><!-- md-10的結尾 -->

      </div><!--大row到這邊-->



  </div>  <!--  container-fluid結尾   -->
</section>





  <section id="footer">
    <!----引用footer資訊----->
    <?php require_once('footer.php'); ?>
  </section>



<!----引用js功能----->
  <?php require_once('jsfile.php'); ?>
</body>

</html>
