<div class="row no-gutters inputnew mx-auto mb-5 "> <!-- card裡的row -->

  <div class="col-md-5 text-center d-flex justify-content-center align-items-center dohcline"> <!-- 圖片區 -->

    <?php
    //取得產品圖片檔名資料
    $SQLstring = sprintf("SELECT * FROM product_img WHERE product_img.p_id=%d ORDER BY sort", $_GET['p_id']);
    $img_rs = $link->query($SQLstring);
    $imgList = $img_rs->fetch();
    ?>

    <img id="showGoods" name="showGoods" src="./product_img/<?php echo $imgList['img_file']; ?>" alt="<?php echo $data['p_name']; ?>" title="<?php echo $data['p_name']; ?>" class="img-fluid rounded-start imgfix fancybox goodsbox" >

  </div> <!-- 圖片區結尾 -->


  <div class="col-md-7 p-5"> <!-- 文字區 -->
    <div class=""> <!---不曉得該叫甚麼的div--->
      <p style="color:#B072FF ;font-size:0.7em;">#<?php echo $data['p_sku']; ?></p> <!---貨號--->
      <p><span style="font-size: 2.3rem;" class="title"><?php echo $data['p_name']; ?></span><!---名稱--->
      <h6><span style="font-size: 0.85em;" class="text-muted"> <?php echo $data['p_intro']; ?></span></p> </h6> <!---簡介--->


      <div id="material" class="mt-3 mb-3"> <!--原料--->
        <?php //echo $data['p_material']; ?>
      </div> <!--原料結尾--->


      <span class="content"><?php echo $data['p_content']; ?> </span><!---詳細內容--->
      <div class="pt-5">
        <h2> NT$ <?php echo $data['p_price']; ?></h2><!---價格--->
      </div>


      <div class="row" style="margin-top: 5vw;"> <!---按鈕區--->
        <div class="col-md-5 "> <!---數量--->
          <div class="input-group input-group-lg">
            <span class="input-group-text docline" id="inputGroup-sizing-lg" style="border-radius: 0; background-color:black; color:#fff;font-size: 1em;">數量</span>
            <input type="number" class="form-control docline" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" id="qty" name="qty" value="1" style="border-radius: 0px;font-size: 1em;">
          </div>
        </div><!---數量 結尾--->

        <div class="col-md-7"> <!---加入購物車--->
          <button name="button01" id="button01" type="button" class="btn btn-card btn-lg" style="font-size: 1em;" onclick="addcart(<?php echo $data['p_id']; ?>)">
            <i class="fa-solid fa-bag-shopping me-3"></i>Add to Cart
          </button>
        </div> <!---加入購物車結尾--->
      </div> <!---按鈕區結尾--->
    </div> <!---不曉得該叫甚麼的div結尾--->
  </div> <!-- 文字區結尾 -->
</div> <!-- card裡的row結尾 -->
