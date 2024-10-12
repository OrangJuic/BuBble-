
<div class="col-md-4 p-3 pe-4" id="sidebar">


<div class="sidebar mb-4 mt-3">
  <?php ?>
  <form action="drugstore.php" method="get" id="search" name="search" class="d-flex">
    <div class="input-group">
      <input type="text " name="search_name" id="search_name" class="form-control docline-three" placeholder="Search..." aria-label="Search" size="30" value="<?php echo (isset($_GET['search_name']))?$_GET['search_name']:'';?>"required>

      <span class="input-group-btn">
        <button class="btn btn-search" type="submit">
        <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </span>
    </div>
  </form>
</div>

<?php
$SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
$pyclass01 = $link->query($SQLstring);
$i = 1
?>

<div class="accordion docline" id="accordionExample" >

  <?php
  while ($pyclass01_Rows = $pyclass01->fetch()) {
    $i = $pyclass01_Rows['classid'];
  ?>

    <div class="accordion-item bru" >
      <h2 class="accordion-header bru" id="headingOne<?php echo $i; ?>">

        <button class="accordion-button collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i; ?>" style="border-radius: 0;background-color:#ffedf9;" >



          <p ><?php echo $pyclass01_Rows['cname']; ?></p>

        </button>

      </h2>

      <?php
if(isset($_GET['p_id'])){ //如果使用產品查詢，需取得類別編號上一層類別
$SQLstring=sprintf("SELECT uplink FROM pyclass,product WHERE pyclass.classid=product.classid AND p_id=%d",$_GET['p_id']);
$classid_rs=$link->query($SQLstring);
$data=$classid_rs->fetch();
$ladder=$data['uplink'];
}


//使用第一層類別查詢
elseif(isset($_GET['level']) && $_GET['level'] == 1){
  $ladder=$_GET['classid'];
}elseif (isset($_GET['classid'])) {  //如果使用類別查詢需取得上一層類別
        $SQLstring = "SELECT * FROM pyclass WHERE level=2 AND classid=" . $_GET['classid'];
        $classid_rs = $link->query($SQLstring);
        $data = $classid_rs->fetch();
        $ladder = $data['uplink'];
      } else {
        $ladder = 1;
      }

      //列出產品第二層類別
      $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
      $pyclass02 = $link->query($SQLstring);

      ?>


      <div id="collapseOne<?php echo $i; ?>" class="accordion-collapse collapse <?php echo ($i == $ladder) ? 'show' : ''; ?> " aria-labelledby="headingOne<?php echo $i; ?>" data-bs-parent="#accordionExample">
        <div class="accordion-body">


          <table class="table">


            <tbody>

              <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>

                <tr>
                  <td>

                    <a href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">

                      <em class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></em>

                      <?php echo $pyclass02_Rows['cname']; ?>

                    </a>

                  </td>

                </tr>

              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>

    </div>

  <?php
    $i++;
  }
  ?>


</div>






</div>
