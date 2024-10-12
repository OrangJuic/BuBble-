<!-- 資造庫連線程式載入 -->
<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once("php_lib.php") ?>

<!doctype html>
<html lang="zh-TW">

<head>
  <?php require_once('headfile.php'); ?>
  <style>
    #cart {
      background-repeat: no-repeat;
      background-image: linear-gradient(rgb(255, 255, 255), rgb(204, 222, 120));
    }

    /*輸入錯誤時，顯示紅框*/
    table input:invalid {
      border: solid red 3px;
    }


    .btn-cart {
      text-decoration: underline;
      border-radius: 0px;
      margin: 1rem;
      --bs-btn-color: #000;
      /* --bs-btn-bg: rgb(255, 255, 255); */
      /* --bs-btn-border-color: rgb(184, 183, 183); */
      --bs-btn-hover-color: #ffffff;
      --bs-btn-hover-bg: #8c52ff;
      --bs-btn-hover-border-color: #000000;
      /* --bs-btn-focus-shadow-rgb: 208, 88, 242; */
      --bs-btn-active-color: #000;
      --bs-btn-active-bg: #C1FF72;
      /* --bs-btn-active-border-color: #ffffff; */
      /* --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg:#b42ec1;
  --bs-btn-disabled-border-color: #6c088c; */
    }

    .btn:hover {
      text-decoration: none;
    }

    .btn-total {
      padding-bottom: 3vw;
      width: 20vw;
      height: 3vw;
      /* height: 1vw; */
      font-size: 1.5vw;
      border-radius: 0px;
      margin: 1rem;
      --bs-btn-color: #fff;
      --bs-btn-bg: #000;
      /* --bs-btn-border-color: rgb(184, 183, 183); */
      --bs-btn-hover-color: #ffffff;
      --bs-btn-hover-bg: #8c52ff;
      --bs-btn-hover-border-color: #000000;
      /* --bs-btn-focus-shadow-rgb: 208, 88, 242; */
      --bs-btn-active-color: #000;
      --bs-btn-active-bg: #C1FF72;
      /* --bs-btn-active-border-color: #ffffff; */
      /* --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg:#b42ec1;
  --bs-btn-disabled-border-color: #6c088c; */
    }



  </style>
</head>

<body>
  <section id="header">
    <?php require_once('navbar.php'); ?>
  </section>






  <section id="cart" style="padding-top: 7rem;padding-bottom: 7rem;">
    <?php require_once('cart_content.php'); ?>
  </section>








  <section id="footer">
    <?php require_once('footer.php'); ?>
  </section>




  <?php require_once('jsfile.php'); ?>


  <script type="text/javascript">
    //將變更的數量寫入後台資料庫
    $("input").change(function() {
      var qty = $(this).val();
      const cartid = $(this).attr("cartid");
      if (qty <= 0 || qty >= 50) {
        alert("更改數量需大於0以上，以及小於50以下。");
        return false;
      }
      $.ajax({
        url: 'change_qty.php',
        type: 'post',
        dataType: 'json',
        data: {
          cartid: cartid,
          qty: qty,
        },
        success: function(data) {
          if (data.c == true) {
            // alert(data.m);
            window.location.reload();
          } else {
            alert(data.m);
          }
        },
        error: function(data) {
          alert("系統目前無法連接到後台資料庫。");
        }
      });
    });
  </script>
</body>

</html>
