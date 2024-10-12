<!-- 資造庫連線程式載入 -->
<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once("php_lib.php") ?>


<!doctype html>
<html lang="zh-TW">

<head>
  <?php require_once('headfile.php'); ?>
  <link rel="stylesheet" href="fancybox-2.1.7/source/jquery.fancybox.css">
  <style>


    .imgfix {
      width: 150%;
      /* 將圖片寬度設置為原來的2倍 */
      max-width: 100%;
      /* 確保圖片在其父容器中不會溢出 */
      height: auto;
      /* 保持圖片的縱橫比 */
    }

    .oraimg {
      max-width: 50%;
      height: auto;
    }

    .inputnew {
      font-family: "Poetsen One", "Noto Sans TC", sans-serif;
    }

    .goodsbox {
      border-radius: 0px;
      background-color: #fff;
      border: 1px solid #363837;
    }
    .goodsbox:hover{
      background-color: #cbcaeb;
    }

    .deskpd{
      padding-left: 10vw;
      padding-right: 10vw;
    }
    .title{
      color: #000;
    }

    .content{
      color: #545554;;
    }
  </style>
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

      <div class="row "><!-- 大row開始 -->
        <!----引用側邊按鈕----->
        <?php //require_once('sidebar.php'); ?>





        <div class="col-md-12 deskpd"> <!-- 扣掉sidebutton之後剩9-->
          <div id="bread" class="row"><!-- 麵包屑那一行row -->
            <!-- 引用麵包屑跟搜尋欄 -->
            <?php require_once('breadcrumb goods.php'); ?>
          </div><!-- 麵包屑那一行row結尾 -->




          <!-- 開始 -->
          <?php require_once('goods_content.php'); ?>


        </div>








      </div><!-- md-10的結尾 -->



    </div><!--大row到這邊-->

    </div> <!--  container-fluid結尾   -->
  </section>







  <section id="footer">
    <!----引用footer資訊----->
    <?php require_once('footer.php'); ?>
  </section>

  <!----引用js功能----->
  <?php require_once('jsfile.php'); ?>
  <script type="text/javascript" src="fancybox-2.1.7/source/jquery.fancybox.js"></script>


</body>

</html>
