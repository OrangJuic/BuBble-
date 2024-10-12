<header class="header" style="border: 1px solid #363837;">
  <nav class="nav container">
    <div class="nav__data">
      <a href="index.php" class="nav__logo">
        <img src="./images/navlogo.png" style="width: 70%;margin-bottom: 0.3vw;">
      </a>

      <div class="nav__toggle" id="nav-toggle">
        <i class="ri-menu-line nav__toggle-menu"></i>
        <i class="ri-close-line nav__toggle-close"></i>
      </div>
    </div>

    <!--=============== NAV MENU ===============-->
    <div class="nav__menu" id="nav-menu">
      <ul class="nav__list">
        <li>
          <a href="index.php" class="nav__link">Home</a>
        </li>

<?php   //讀取後台購物車內產品數量
$SQLstring="SELECT*FROM cart WHERE orderid is NULL AND ip='".$_SERVER['REMOTE_ADDR']."'";
$cart_rs=$link->query($SQLstring);
?>
        <!--=============== DROPDOWN 1 ===============-->
        <?php  //列出產品類別第一層
        $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER by sort";
        $pyclass01 = $link->query($SQLstring);
        ?>
        <?php while ($pyclass01_Rows = $pyclass01->fetch()) {
        ?>

          <li class="dropdown__item">
            <div class="nav__link dropdown__button">
              <span style="color:#fff;"><?php echo $pyclass01_Rows['cname'] ?></span> <i class="ri-arrow-down-s-line dropdown__arrow"></i>
            </div>
            <?php //列出產品第二層
            $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
            $pyclass02 = $link->query($SQLstring)
            ?>
            <div class="dropdown__container" style="border: 1px solid #363837;">
              <div class="dropdown__content">
                <!-- 列出產品第二層 -->
                <?php while ($pyclass02_Rows = $pyclass02->fetch()) { ?>
                  <div class="dropdown__group">
                    <div class="dropdown__icon">
                      <a href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>"><i class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></i></a>
                    </div>

                    <a href="drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>"><span class="dropdown__title"><?php echo $pyclass02_Rows['cname']; ?></span></a>


                  </div>
                <?php } ?>

              </div>
            </div>
          </li>
        <?php } ?>


        <!--=============== DROPDOWN 3 User ===============-->
        <li class="dropdown__item">
          <div class="nav__link dropdown__button">
            User <i class="ri-arrow-down-s-line dropdown__arrow"></i>
          </div>

          <div class="dropdown__container" style="border: 1px solid #363837;">
            <div class="dropdown__content">
              <div class="dropdown__group">
                <div class="dropdown__icon">
                  <i class="fa-solid fa-user"></i>
                </div>

                <span class="dropdown__title">Rgister</span>

                <ul class="dropdown__list">
                  <li>
                    <a href="login.php" class="dropdown__link">會員登入</a>
                  </li>
                  <li>
                    <a href="register.php" class="dropdown__link">會員註冊</a>
                  </li>
                  <li>
                    <a class="dropdown__link" href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出？','logout.php')" >登出</a>
                  </li>
                </ul>
              </div>

              <div class="dropdown__group">
                <div class="dropdown__icon">
                  <i class="fa-regular fa-handshake"></i>
                </div>

                <span class="dropdown__title">Support</span>

                <ul class="dropdown__list">
                  <li>
                    <a href="orderlist.php" class="dropdown__link">訂單查詢</a>
                  </li>
                  <li>
                    <a href="#" class="dropdown__link">客服專區</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </li>

        <li>  <!----購物車------>
          <a href="cart.php" class="nav__link"><i class="fa-solid fa-bag-shopping"></i>
          &nbsp;

          <span class="badge text-bg-dark rounded-pill "><?php echo ($cart_rs) ? $cart_rs->rowCount() : ''; ?></span>

        </a>
        </li>  <!----購物車結尾------>

      </ul>
    </div>
  </nav>
</header>
