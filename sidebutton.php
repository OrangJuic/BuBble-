<?php  //列出產品類別第一層
$SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER by sort";
$pyclass01 = $link->query($SQLstring);
$i=1;//控制順序編號
?>


<div class="col-md-3 text-center" id="sidebutton">

<?php while ($pyclass01_Rows = $pyclass01->fetch()) {
?>

          <div class="">
            <a href="drugstore.php?classid=<?php echo $pyclass01_Rows['classid'] ?>&level=<?php echo $pyclass01_Rows['level'] ?>">
              <button class="btnchgingSIDE text-center" style="background-image: url(./images/btnbg/1.png);">
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



        </div>
