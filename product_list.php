<!----PHP開始--->
<?php
$maxRows_rs = 12;
$pageNum_rs = 0;  //起始頁=0
if (isset($_GET['pageNum_rs'])) {
  $pageNum_rs = $_GET['pageNum_rs'];
}

$startRows_rs = $pageNum_rs * $maxRows_rs;

if (isset($_GET['search_name'])) {
  //使用關鍵字查詢
  $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND (product.p_name LIKE '%s' OR product.p_price LIKE '%s' ) ORDER BY product.p_id DESC", '%' . $_GET['search_name'] . '%', '%' . $_GET['search_name'] . '%');
} elseif (isset($_GET['level']) && $_GET['level'] == 1) {

  // 使用第一層類別查詢
  $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND pyclass.uplink = '%d' ORDER BY product.p_id DESC", $_GET['classid']);
} elseif (isset($_GET['classid'])) {
  //使用產品類別查詢
  $queryFirst = sprintf("SELECT*FROM product,product_img WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id AND product.classid='%d' ORDER BY product.p_id DESC", $_GET['classid']);
} else {
  // 列出產品資料查詢
  $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort = 1 AND product.p_id=product_img.p_id ORDER BY product.p_id DESC");
}


$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRows_rs, $maxRows_rs);
$pList01 = $link->query($query);
$i = 1; //控制每列row產生

?>

<?php if ($pList01->rowCount() != 0) { ?>


  <?php
  while ($pList01_Rows = $pList01->fetch()) { ?>
    <?php if ($i % 4 == 1) { ?>


      <!--card區-->
      <div class="row mt-2 "><!--productlist第一列-->
      <?php } ?>

      <div class="col-md-3 pt-1">
        <div class="mr">
          <div class="card text-center">
            <a href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>" class="imgbor"><img src="./product_img/<?php echo $pList01_Rows['img_file']; ?>" class=" img-fluid" alt="<?php echo $pList01_Rows['p_name'] ?>" title="<?php echo $pList01_Rows['p_name'] ?>"></a>
            <div class="card-body">
              <h5 class="card-title"><?php echo $pList01_Rows['p_name'] ?></h5>
              <p class="card-text"><?php echo $pList01_Rows['p_intro']; ?></p>
              <span class="card-prize">
                NT$ <?php echo $pList01_Rows['p_price'] ?>

                &nbsp;&nbsp;

                <button type="button" id="button01[]" name="button01[]" class="btn btn-cardR" onclick="addcart(<?php echo $pList01_Rows['p_id']; ?>)"><i class="fa-solid fa-bag-shopping"></i></button>
              </span>

            </div><!--cardbody--->

          </div><!--card--->
        </div>
      </div><!--col-3--->
      <?php if ($i % 4 == 0 || $i == $pList01->rowCount()) { ?>
      </div>


    <?php } ?>
  <?php $i++;
  } ?>



  <div class="row px-1 mt-5">

    <?php    //取得目前頁數

    if (isset($_GET['totalRows_rs'])) {
      $totalRows_rs = $_GET['totalRows_rs'];
    } else {
      $all_rs = $link->query($queryFirst);
      $totalRows_rs = $all_rs->rowCount();
    }

    $totalRows_rs = ceil($totalRows_rs / $maxRows_rs) - 1;  //呼叫分頁函數功能
    $prev_rs = "&laquo;";
    $next_rs = "&raquo;";
    $separator = "|";
    $max_links = 20;
    $pages_rs = buildNavigation($pageNum_rs, $totalRows_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");

    ?>

    <!--分頁案扭-->
    <nav aria-label="Page navigation example" class="ml-3 ">
      <ul class="pagination justify-content-end pagination-lg">
        <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>

      </ul>
    </nav>
  </div>

<?php } else { ?>
  <div class="alert alert-info" role="alert">
    Oops, looks like this party is a solo act. No related products in sight!
  </div>
<?php } ?>



</div><!--productlist一列的結尾-->
