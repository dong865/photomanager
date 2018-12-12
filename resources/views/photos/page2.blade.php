

  <style>
body {
  font-family: sans-serif;
  line-height: 1.4;
  font-size: 18px;
  padding: 20px;
  max-width: 640px;
  margin: 0 auto;
}

.grid {
  max-width: 1200px;
}

/* reveal grid after images loaded */
.grid.are-images-unloaded {
  opacity: 0;
}

.grid__item,
.grid__col-sizer {
  width: 32%;
}

.grid__gutter-sizer { width: 2%; }

/* hide by default */
.grid.are-images-unloaded .image-grid__item {
  opacity: 0;
}

.grid__item {
  margin-bottom: 20px;
  float: left;
}

.grid__item--height1 { height: 140px; background: #EA0; }
.grid__item--height2 { height: 220px; background: #C25; }
.grid__item--height3 { height: 300px; background: #19F; }

.grid__item--width2 { width: 66%; }

.grid__item img {
  display: block;
  max-width: 100%;
}


.page-load-status {
  display: none; /* hidden by default */
  padding-top: 20px;
  border-top: 1px solid #DDD;
  text-align: center;
  color: #777;
}

/* loader ellips in separate pen CSS */

</style>


<body translate="no">

  <h1>Infinite Scroll - Masonry page 3</h1>

<div class="grid" style="position: relative; height: 1438.38px;">
  <div class="grid__col-sizer"></div>
  <div class="grid__gutter-sizer"></div>
  <div class="grid__item grid__item--height2" style="position: absolute; left: 0%; top: 0px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 33.9984%; top: 0px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 67.9967%; top: 0px;"></div>
  <div class="grid__item grid__item--width2" style="position: absolute; left: 33.9984%; top: 160px;">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/grapes.jpg" alt="drizzle">
  </div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 0%; top: 239.985px;"></div>
  <div class="grid__item grid__item--height2" style="position: absolute; left: 0%; top: 399.985px;"></div>
  <div class="grid__item grid__item--width2" style="position: absolute; left: 33.9984%; top: 496.786px;">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" alt="grapes">
  </div>
  <div class="grid__item grid__item--height2" style="position: absolute; left: 0%; top: 639.97px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 33.9984%; top: 798.378px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 67.9967%; top: 798.378px;"></div>
  <div class="grid__item grid__item--height2" style="position: absolute; left: 0%; top: 879.955px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 33.9984%; top: 958.378px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 67.9967%; top: 958.378px;"></div>
  <div class="grid__item grid__item--height3" style="position: absolute; left: 33.9984%; top: 1118.38px;"></div>
  <div class="grid__item grid__item--height1" style="position: absolute; left: 67.9967%; top: 1118.38px;"></div>
  <div class="grid__item grid__item--height2" style="position: absolute; left: 0%; top: 1119.94px;"></div>
</div>

</body>
