<!doctype html>
<html lang="en" class="export">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <title>Infinite Scroll &#xB7; Masonry images - page 6</title>


  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  {{-- <script src="{{ asset('test/js/load.js') }}"></script> --}}
  {{--  无限滚动  --}}
  <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
{{--  瀑布流  --}}
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>

{{--  <script src="{{ asset('test/js/infinite-scroll-docs.min.js?3') }}"></script>  --}}
</head>
<style>
    * { box-sizing: border-box; }

    body { font-family: sans-serif; }

    /* ---- grid ---- */
    .grid {
    background: #EEE;
    {{--  max-width: 1200px;  --}}
    }

    /* clearfix */
    {{--  .grid:after {
    content: '';
    display: block;
    clear: both;
    }  --}}

    /* ---- grid__item ---- */

    .grid__item ,.grid__item_sizi{
        width: 30%;
    }
    .grid__item {
    {{--  float: left;  --}}
    {{--  background: #D26;  --}}
    margin-bottom:5px;
    border-radius: 5px;
    }
    .img img{
        display: block;
        max-width: 100%;
        max-height: 100%;
    }
    .grid__item--width2 { width: 60%; }
    .grid__item--width3 { width: 30%; }
    .grid__item--width4 { width: 70%; }

    .grid__item--height1{height: 234px;}
    .grid__item--height2 { height: 200px; }
    .grid__item--height3 { height: 260px; }
    .grid__item--height4 { height: 360px; }

    .grid__item--height1{background: salmon}
    .grid__item--height2{background: darkcyan}
    .grid__item--height3{background: darkkhaki}
    .grid__item--height1,.grid__item--height2,.grid__item--height3{
        border: 2px solid #333;
        border-color: hsla(0, 0%, 0%, 0.5);
    }
</style>
<body>
    <h1>Masonry - Initialize in HTML</h1>

    <div class="grid">
        <div class="grid__item grid__item--height1">1</div>
        <div class="grid__item grid__item--height2">2</div>
        <div class="grid__item grid__item--height3">3</div>
        <div class="grid__item grid__item--height2">4</div>
        <div class="grid__item grid__item--height1">5</div>
        <div class="grid__item grid__item--height1">6</div>
        <div class="grid__item grid__item--height2">7</div>
        <div class="grid__item grid__item--width2 img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" alt="orange tree" />
            </div>
        <div class="grid__item grid__item--height2">8</div>
        <div class="grid__item grid__item--height3">9</div>
        <div class="grid__item grid__item--height1">10</div>
        <div class="grid__item grid__item--height2">11</div>
        <div class="grid__item grid__item--height1">12</div>
        <div class="grid__item grid__item--height2">13</div>
        <div class="grid__item grid__item--height1">14</div>
        <div class="grid__item grid__item--height1">15</div>
        <div class="grid__item grid__item--width3 img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/raspberries.jpg" alt="orange tree" />
        </div>
        <div class="grid__item grid__item--height2">16</div>
        <div class="grid__item grid__item--height1">17</div>
        <div class="grid__item grid__item--height1">18</div>
        <div class="grid__item grid__item--height3">19</div>
        <div class="grid__item grid__item--height2">20</div>
        <div class="grid__item grid__item--height1">21</div>
        <div class="grid__item grid__item--height1">22</div>
        <div class="grid__item grid__item--width3 img">
            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" alt="orange tree" />
        </div>
        <div class="grid__item grid__item--height2">23</div>
    </div>


    <p class="pagination">
        <a class="pagination__next" href="{{ route('page2') }}">Next page</a>
    </p>

<script>
    //初始化masonry
      var $grid=  $('.grid').masonry({

            itemSelector: '.grid__item',//子项目选择
            columnWidth:'.grid__item',//列宽
            percentPosition:true,//响应式
            gutter:10,//水平间距
            transitionDuration: ".8s",//过度时间默认0.45
            horizontalOrder:false,//水平按顺序排列
            isFitWidth:false,//自动寻找合适的宽度。
            initLayout:true,//初始化时启用布局，默认true
        });
        //加载项目中的图像
        $grid.imagesLoaded().progress( function() {
            $grid.masonry();
          });
         // 获取masonry实例
      var msnry = $grid.data('masonry');
    $grid.infiniteScroll({
        path: '.pagination__next',
        append: '.grid__item',
        outlayer: msnry,//添加masonry实例
        status: '.scroller-status',
    })
</script>

</body>
</html>
