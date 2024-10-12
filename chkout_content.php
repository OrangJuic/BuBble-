<?php
//取得收件者地址資料
$SQLstring = sprintf("SELECT*,city.Name AS ctName,town.Name AS toName FROM addbook,city,town WHERE emailid='%d' AND setdefault='1' AND addbook.myzip=town.Post AND town.AutoNo=city.AutoNo", $_SESSION['emailid']);
$addbook_rs = $link->query($SQLstring);
if ($addbook_rs && $addbook_rs->rowCount() != 0) {
  $data = $addbook_rs->fetch();
  $cname = $data['cname'];
  $mobile = $data['mobile'];
  $myzip = $data['myzip'];
  $address = $data['address'];
  $ctName = $data['ctName'];
  $toName = $data['toName'];
} else {
  $cname = "";
  $mobile = "";
  $myzip = "";
  $address = "";
  $ctName = "";
  $toName = "";
}
?>

    <div class="container">
      <h3>會員 <span class="text-info"><?php echo $_SESSION['cname']; ?></span>    結帳作業 <button type="button" id="btn05" name="btn05" class="btn btn-cart mr-3" onclick="window.history.go(-1);"><i class="fas fa-undo-alt pr-2"></i>回上一頁</button></h3>
      <div class="row"><!---row--->
        <div class="col-md-8 p-3"><!---md-9--->

          <?php
          //建立結帳表格資料庫查詢
          $SQLstring = "SELECT*FROM cart,product,product_img where ip='" . $_SERVER['REMOTE_ADDR'] . "'AND orderid is NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
          $cart_rs = $link->query($SQLstring);
          $pTotal = 0; //設定累加變數$pTotal
          ?>
          <div class="table-responsive-md docline bg-light" style="font-family:  'Noto Sans TC', sans-serif;">
            <table class="table table-hover mt-3 " style="vertical-align: middle;">
              <thead>
                <tr class=" text-info text-center">
                  <td width="10%">#</td>
                  <td width="10%">商品</td>
                  <td width="25%">名稱</td>
                  <td width="15%">價格</td>
                  <td width="10%">數量</td>
                  <td width="15%">小計</td>

                </tr>
              </thead>
              <tbody>
                <?php while ($cart_data = $cart_rs->fetch()) { ?>
                  <tr class="text-center">
                    <td class="pidsty"><?php echo $cart_data['p_id'] ?></td>
                    <td><img src="product_img/<?php echo $cart_data['img_file'] ?>" alt="<?php echo $cart_data['p_name'] ?>" class="img-fluid"></td>
                    <td><?php echo $cart_data['p_name'] ?></td>
                    <td>
                      <h4 class="color_e600a0 pt-1">$<?php echo $cart_data['p_price'] ?></h4>
                    </td>
                    <td><?php echo $cart_data['qty'] ?></td>
                    <td>
                      <h4 class="pt-1">$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></h4>
                    </td>
                  </tr>
                <?php $pTotal += $cart_data['p_price'] * $cart_data['qty'];
                } ?>


              </tbody>
              <tfoot class="text-center">
                <tr>
                  <td colspan="7">累計：NT$<?php echo $pTotal; ?></td>
                </tr>
                <tr>
                  <td colspan="7">運費：NT$100</td>
                </tr>
                <tr>
                  <td colspan="7" class="fs-3">合計：<span class="color_e600a0">NT$ <?php echo $pTotal + 100; ?></span></td>
                </tr>
                <tr style="border: 1px solid white;">
                  <td colspan="7"><button type="button" id="btn04" name="btn04" class="btn btn-total mr-2"><i class="fas fa-cart-arrow down pr-2"></i>確認結帳</button>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>


        </div><!---md-9--->
        <div class="col-md-4 p-3">
          <div class="row">

            <div class="card ms-3 ">

              <div class="card-header" style="color: #007bff;"><i class="fas fa-truck fa-flip-horizontal me-1"></i>
                配送資訊
              </div>

              <div class="card-body">
                <h5 class="card-text">收件人資訊：</h5>
                <h6 class="card-text">姓名：<?php echo $cname; ?></h6>
                <h6 class="card-text">電話：<?php echo $mobile; ?></h6>
                <h6 class="card-text">郵遞區號：<?php echo $myzip . $ctName . $toName; ?></h6>
                <h6 class="card-text">地址：<?php echo $address; ?></h6>
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: inline-end;">選擇其他收件人</button>
              </div>

            </div>

            <div class="card m-3"><!---付款方式card--->

              <div class="card-header" style="color: red;"><i class="fas fa-credit-card me-1"></i>
                付款方式
              </div>

              <div class="card-body  pt-2 pb-2">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true" style="color: #007bff!important; font-size:12pt;">貨到付款</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false" style="color: #007bff!important;font-size:12pt;">信用卡</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false" style="color:#007bff!important;font-size:12pt;">銀行轉帳</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="epay-tab" data-bs-toggle="tab" data-bs-target="#epay" type="button" role="tab" aria-controls="epay" aria-selected="false" style="color:#007bff!important;font-size:12pt;">電子支付</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <h5 class="pt-3 pb-3 card-text">付款人資訊：</h5>

                    <h6 class="card-text">姓名：<?php echo $cname; ?></h6>

                    <h6 class="card-text">電話：<?php echo $mobile; ?></h6>
                    <h6 class="card-text">郵遞區號：<?php echo $address; ?></h6>
                    <h6 class="card-text">地址：<?php echo $myzip . $ctName . $toName; ?></h6>
                  </div>

                  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <h5 class="card-text pt-3">選擇付款帳戶:</h5>
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" width="5%">#</th>
                          <th scope="col" width="25%">信用卡系統</th>
                          <th scope="col" width="35%">發卡銀行</th>
                          <th scope="col" width="35%">信用卡號</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><input type="radio" name="creditCard" id="creditCard[]" checked /></th>
                          <td><img src="./images/Visa_Inc._logo.svg" alt="visa" class="img-fluid"></td>
                          <td>玉山商業銀行</td>
                          <td>1234 ****</td>
                        </tr>
                        <tr>
                          <th scope="row"><input type="radio" name="creditCard" id="creditCard[]" checked /></th>
                          <td><img src="./images/MasterCard_Logo.svg" alt="master" class="img-fluid"></td>
                          <td>玉山商業銀行</td>
                          <td>1234 ****</td>
                        </tr>
                        <tr>
                          <th scope="row"><input type="radio" name="creditCard" id="creditCard[]" checked /></th>
                          <td><img src="./images/UnionPay_logo.svg" alt="unionpay" class="img-fluid"></td>
                          <td>玉山商業銀行</td>
                          <td>1234 ****</td>
                        </tr>
                      </tbody>
                    </table>
                    <hr><button type="button" class="btn btn-outline-success">使用新信用卡付款</button>
                  </div>

                  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <h5 class="card-text pt-3">ATM匯款資訊：</h5>
                    <img src="./images/Cathay-bk-rgb-db.svg" alt="cathay" class="img-fluid">
                    <h6 class="card-text">匯款銀行：國泰世華銀行 銀行代碼：01</h6>
                    <h6 class="card-text">姓名：林小強</h6>
                    <h6 class="card-text">匯款帳號：1234-4567-7890-
                      1234</h6>
                    <h6 class="card-text">備註：匯款完成後，需要1、2
                      個工作天，待系統入款完成後，將以簡訊通知訂單完成付款。</h6>
                  </div>

                  <div class="tab-pane fade" id="epay" role="tabpanel" aria-labelledby="epay-tab" tabindex="0">
                    <table class="table caption-top">
                      <caption>選擇電子支付方式</caption>
                      <thead>
                        <tr>
                          <th scope="col" width="5%">#</th>
                          <th scope="col" width="35%">電子支付系統</th>
                          <th scope="col" width="60%">電子支付系統</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row"><input type="radio" name="epay[]" id="epay[]" checked /></th>
                          <td><img src="./images/Apple_Pay_logo.svg" alt="applepay" class="img-fluid"></td>
                          <td>Apple Pay</td>
                        </tr>
                        <tr>
                          <th scope="row"><input type="radio" name="epay[]" id="epay[]" /></th>
                          <td><img src="./images/Line_pay_logo.svg" alt="linePay" class="img-fluid"></td>
                          <td>Line Pay</td>
                        </tr>
                        <tr>
                          <th scope="row"><input type="radio" name="epay[]" id="epay[]" checked /></th>
                          <td><img src="./images/JKOPAY_logo.svg" alt="jkopay" class="img-fluid"></td>
                          <td>JKOPAY</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>

              </div> <!-----card body結尾------>

            </div><!---付款方式card結尾--->


          </div><!----row-->
        </div><!---md-5--->
      </div><!---row--->
    </div>
