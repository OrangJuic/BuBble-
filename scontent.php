<?php
$SQLstring = "SELECT * FROM hot,product,product_img WHERE hot.p_id=product_img.p_id AND hot.p_id=product.p_id AND product_img.sort=1 ORDER BY h_sort";
$hot = $link->query($SQLstring);
?>

<div class="container-fluid deskpd text-center">
  <div class="row mt-5">
    <div class="col-12 text-center mx-4 mt-4 mb-2">
      <p class="texttitle">

        HOT

      </p>
    </div><!------hot 標題 ---->
  </div>

  <div class="row justify-content-center mb-5">

    <?php while ($pList01_Rows = $hot->fetch()) { ?>

      <div class="col-md-2 mb-5">
        <div class="card text-center">
          <a href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>"><img src="product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="HOT<?php echo $pList01_Rows['h_sort']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>"></a>

          <div class="card-body">
            <h5 class="card-title"><?php echo $pList01_Rows['p_name'] ?></h5>
            <p class="card-text"><?php echo $pList01_Rows['p_intro'] ?></p>
            <span class="card-prize ">
              NT$ <?php echo $pList01_Rows['p_price'] ?>

              &nbsp;&nbsp;

              <!-- <a href="#" class="btn btn-card mt-1" style="float: inline-end;"><i class="fa-solid fa-bag-shopping"></i></a> -->
              <button type="button" id="button01[]" name="button01[]" class="btn btn-cardR mb-1" onclick="addcart(<?php echo $pList01_Rows['p_id']; ?>)"> <i class="fa-solid fa-bag-shopping"></i> </button>
            </span>

          </div><!--cardbody--->

        </div><!--card--->
      </div><!-----col-2---->

    <?php } ?>




  </div><!----row---->




</div>
