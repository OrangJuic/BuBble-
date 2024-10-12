<!-- 資造庫連線程式載入 -->
<?php require_once('connections/conn_db.php'); ?>
<?php (!isset($_SESSION) ? session_start() : ""); ?>
<?php require_once("php_lib.php") ?>
<?php
//取得要返回的php頁面
if(isset($_GET['sPath'])){
  $sPath=$_GET['sPath'].".php";
}else{
  //登入完成預設要進入首頁
  $sPath="index.php";
}
  //檢查是否完成登入驗證
  if(isset($_SESSION['login'])){
    header(sprintf("location:%s",$sPath));
  }
?>


<!doctype html>
<html lang="zh-TW">

<head>
  <?php require_once('headfile.php'); ?>
  <style>


    .fontzz{
      font-family: 'Poetsen One', 'Noto Sans TC', sans-serif;
      font-size:x-large;
      color: #000;
    }



  .signcard{
    width: 50%;
    background-color: #edd8d8;
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    -moz-border-radius:10px;
    -webkit-border-radius:10px;
    border-radius: 0;
    border: 1px solid #000;

  }


  .form-signin input[type="email"],
  .form-signin input[type="password"],
  .form-signin button{
    width: 60%;
    height: 60px;
    font-size: 16px;
    display: block;
    margin-bottom: 40px;
    margin-top: 40px;
    margin-left: auto;
    margin-right: auto;
    border-radius: 0px;
    border: 1px solid #000;
  }
  .btn.btn-signin{
    font-weight: 700;
    background-color: rgb(104, 145, 162);
    color: white;
    height: 38px;
    transition: background-color 1s;
  }
  .btn.btn-signin:hover,
  .btn.btn-signin:active,
  .btn.btn-signin:focus{
    background-color: rgb(0, 191 , 99);
  }
  .other a{
    color:#8C52FF;
    text-decoration: underline;
    font-size: 12px;
  }
  .other a:hover,
  .other a:active,
  .other a:focus{
    color: #5294ff;
  }

  </style>
</head>

<body>
  <section id="header">
  <?php require_once('navbar.php'); ?>
  </section>


<section id="login" style="margin-top: 3rem;margin-bottom: 3rem;">
  <div class="container">
<div class="row mt-5 mb-5 p-5">
  <div class="signcard text-center mb-5" >
  <p id="profile-name" class="fontzz mt-5">Login</p>

  <form action="" method="POST" class="form-signin" id="form1">
              <input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="Account" required autofocus/>
              <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required/>
              <button type="submit" class="btn btn-card mt-4 fontzz"><h4 style="color: #f7f7f7;">Sign In</h4></button>
            </form>
            <div class="other mt-5 text-center mb-5" >
              <a href="register.php">New user</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="">Forget the password</a>
            </div>

  </div>
</div>
</section>







  <!-- <section id="about">
    <?php //require_once('about.php'); ?>
  </section> -->



  <section id="footer">
    <?php require_once('footer.php'); ?>
  </section>




  <?php require_once('jsfile.php'); ?>
  <script type="text/javascript" src="commlib.js"></script>
<script type="text/javascript">
  $(function() {
    $("#form1").submit(function(){
      const inputAccount=$("#inputAccount").val();
      const inputPassword=MD5($("#inputPassword").val());
      $("#loading").show();
      //利用$ajax函數呼叫後台的auth_user.php驗證帳號密碼

      $.ajax({
        url: 'auth_user.php',
        type: 'post',
        dataType: 'json',
        data: {
          inputAccount: inputAccount,
          inputPassword: inputPassword,
        },
        success: function(data) {
          if (data.c == true) {
            alert(data.m);
            //window.location.reload();
            window.location.href="<?php echo $sPath; ?>";
          } else {
            alert(data.m);
          }
        },
        error: function(data) {
          alert("系統目前無法連接到後台資料庫。");
        }

    });
  });
});
</script>


  <div id="loading" names="loading" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,.5);z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position: absolute;top:50%;left:50%;"></i></div>
</body>

</html>

