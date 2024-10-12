<?php //建立購物車查詢資料
    $SQLstring = "SELECT*FROM cart,product,product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid IS NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
    $cart_rs = $link->query($SQLstring);
    $ptotal = 0; //設定累加的變數，初始=0;
    ?>

    <div class="container" style="font-family:  'Noto Sans TC', sans-serif;">




      <div class="row mt-2"> <!----小標題的row------->

        <div class="col-md-8"><h3>Cart&nbsp;購物車</h3></div>

        <?php if ($cart_rs->rowCount() != 0) { ?>

            <div class="col-md-4"><a href="index.php" type="button" id="btn01" name="btn01" class="btn btn-cart">繼續購物</a>
              <button type="button" id="btn01" name="btn01" class="btn btn-cart" onclick="window.history.go(-1)">回到上一頁</button>
              <button type="button" id="btn01" name="btn01" class="btn btn-cart" onclick="btn_confirmLink('確定清空購物車?','shopcart_del.php?mode=2');">清空購物車</button>
            </div>

      </div><!----小標題的row結尾------->

      <div class="row mt-2 mb-3">
        <div class="col-md-9 col-12 p-4">
          <!-- table開始 -->
          <div class="table-responsive-md docline bg-light p-3">
            <table class="table table-hover text-center tabsty">
          <thead>
            <tr class=" text-info">
              <td width="5%">#</td>
              <td width="15%">商品</td>
              <td width="25%"></td>
              <td width="15%">價格</td>
              <td width="10%">數量</td>
              <td width="15%">小計</td>
              <td width="15%">取消</td>
              </tr>
              </thead>

              <tbody class="mx-auto">
                <?php while ($cart_data = $cart_rs->fetch()) { ?>
                  <tr class="m-5" style="height: 150px;border: 1px solid #fff;">
                    <td style="color: #938d99;font-size:xx-small"><?php echo $cart_data['p_id']; ?></td>
                    <td><img src="./product_img/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid" style="width: 50%;"></td>
                    <td class="text-start"><?php echo $cart_data['p_name']; ?></td>
                    <td>
                      <h4 class="color_e600a0 pt-1">$<?php echo $cart_data['p_price']; ?></h4>
                    </td>
                    <td style="min-width: 100px;">
                      <div class="input-group">
                        <input type="number" class="form-control" id="qty[]" value="<?php echo $cart_data['qty']; ?>" min="1" max="49" cartid="<?php echo $cart_data['cartid']; ?>" required style="min: width 60px;">
                      </div>
                    </td>
                    <td>
                      $<?php echo $cart_data['p_price'] * $cart_data['qty']; ?>
                    </td>
                    <td><button type="button" id="btn[]" name="btn[]" class="btn btn-cart" onclick="btn_confirmLink('確定刪除本筆資料?','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>');"><i class="fa-solid fa-trash"></i></button></td>
                  </tr>
                <?php $ptotal += $cart_data['p_price'] * $cart_data['qty'];
                } ?>

              </tbody>
            </table>


          </div> <!-- table結尾 -->
        </div>

        <div class="col-md-3 col-12 p-3 mt-1 ">
          <table class="docline" bgcolor="#fff">
            <tfoot class="text-end">
              <tr>
                <td colspan="7" class="p-3"><span style="float: inline-start; padding-left:1vw;">累計</span><span style="float: inline-end; padding-right:1vw;">NT$<?php echo $ptotal; ?></span></td>
              </tr>
              <tr>
                <td colspan="7" class="p-3"><span style="float: inline-start;padding-left:1vw;"> 運費</span><span style="float: inline-end; padding-right:1vw;">NT$100</span></td>
              </tr>

              <tr class="">
                <td colspan="7" class="p-3 fs-3"><span style="float: inline-start;padding-left:1vw;"> 合計</span><span style="float: inline-end; padding-right:1vw;" class="color_e600a0">NT$<?php echo $ptotal + 100; ?></span></td>
              </tr>
              <tr>
                <td colspan="7" class="p-3 fs-3"><a href="checkout.php" class="btn btn-lg btn-total">
                    前往結帳
                  </a></td> <!------前往結帳按鈕------->
              </tr>
            </tfoot>
          </table>
        </div>

      </div>





    <?php } else { ?>
      <div class="alert alert-info" role="alert" style="margin-bottom: 300px;">購物車是空的。</div>
    <?php } ?>


    </div><!---container結尾----->
