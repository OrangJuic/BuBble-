<div class="container deskpd">

      <div class="row justify-content-center p-5">
        <div class="col-12 text-center mx-4 mt-3">
          <p class="texttitle"">Welcome!!</p>
          <h4>歡迎來到「Bubble」，您的沐浴球專賣店！</h4>
        </div>
      </div>

<?php  //列出產品類別第一層
$SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER by sort";
$pyclass01 = $link->query($SQLstring);
?>


      <div class=" row mt-2 mx-auto p-2">

<?php while ($pyclass01_Rows = $pyclass01->fetch()) {
?>

          <div class="col-4 text-center">
<a href="drugstore.php?classid=<?php echo $pyclass01_Rows['classid'] ?>&level=<?php echo $pyclass01_Rows['level'] ?>">

            <button class="btnchging text-center docline" style="background-image: url(./images/btnbg/1.png);">
<h1><?php echo $pyclass01_Rows['cname'] ?></h1>
              <span class="inner">
                <span class="blob"></span>
                <span class="blob"></span>
                <span class="blob"></span>
                <span class="blob"></span>
                <span class="blob"></span>
                <span class="blob"></span>
              </span>
            </button>

</a>

</div>
<?php } ?>



      </div><!---row結尾----->




      <div class="row mt-3 mx-auto p-2 mb-5 ">
          <div class="col-4 mx-auto "><img src="./images/contain/2.png" class="img-fluid docline"></div>

          <div class="col-4 mx-auto"><img src="./images/contain/3.png" class="img-fluid docline"></div>

          <div class="col-4 mx-auto"><img src="./images/contain/4.png" class="img-fluid docline"></div>
      </div>

    </div>
