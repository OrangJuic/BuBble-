    // 使用jquery將img插入body中
    (function ($) {
        $("body").append("<img id ='goTopButton' style='display:none; z-index:5; cursor:pointer;width:50; height:50;'title='回到頂點'/>");
        var img = "./images/gotop.gif",         //宣告變數設定圖檔名稱
          location = 50,              // 按鈕出現在螢幕的度
          right = 13,                   //距離右邊px值
          opacity = 0.4,                //預設透明度
          speed = 1000,                  //返回TOP捲動速度
          $button = $("#goTopButton"),   //定義JQUERY呼叫圖面ID
          $body = $(document),          //定義JQUERY網頁
          $win = $(window);             //定義JQUERY瀏覽器CHROME
        $button.attr("src", img);      //將圖設定到goTopButton的src
        //建立當網頁捲動時,呼叫自訂函數
        window.goTopMove = function () {
          //從網頁取得與頂端距離的數值,約為75-165px
          var scrollH = $body.scrollTop(),
            winH = $win.height(),   //從瀏覽器取得高度
            css = { "top": winH * location + "px", "position": "fixed", "right": right, "opacity": opacity }; //將三數設定CSS
          //如果捲動與網頁頂端超過20PX時,則顯示圖片,否則隱藏圖片。
          if (scrollH > 20) {
            $button.css(css);
            $button.fadeIn("slow");
          } else {
            $button.fadeOut("slow")
            css = {"transform" : "none","transition" :"none"};
            $button.css(css);
          }
        };
        //設定瀏覽器監聽兩個動作M,分別為srcoll與resize
        $win.on({
          scroll: function () { goTopMove(); },
          resize: function () { goTopMove(); }
        });
        //設定瀏覽器監聽圖片三個動作,分別為1滑鼠華過去與2滑鼠滑出去與3按下動作
        $button.on({
          mouseover: function () { $button.css("opacity", 1); },
          mouseout: function () { $button.css("opacity", opacity); },
          click: function () {
            css ={"transform" : "rotateX(0turn) rotateY(0turn) ","transition":"transform 0.3s ease 0s"};
            $button.css(css);
            $("html, body").animate({ scrollTop: 0 }, speed); }
        });
      })(jQuery);
