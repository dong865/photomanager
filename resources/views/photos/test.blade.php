<script src="{{asset('photostyle/vendors/jquery/js/jquery.min.js')}}"></script>
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<h1>Infinite Scroll - Masonry image grid</h1>
<div class="grid are-images-unloaded">
  <div class="grid__col-sizer"></div>
  <div class="grid__gutter-sizer"></div>
  <div class="grid__item grid__item--height2"></div>
  <div class="grid__item grid__item--width2">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" alt="orange tree" />
  </div>
  <div class="grid__item grid__item--height3"></div>
  <div class="grid__item grid__item--height1"></div>
  <div class="grid__item grid__item--height2"></div>
  <div class="grid__item">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" alt="look out" />
  </div>

  <div class="grid__item grid__item--height1"></div>
  <div class="grid__item grid__item--height3"></div>
  <div class="grid__item grid__item--height1"></div>
  <div class="grid__item grid__item--height3"></div>
  <div class="grid__item grid__item--height1"></div>
  <div class="grid__item grid__item--height1"></div>
  <div class="grid__item grid__item--width2">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/raspberries.jpg" alt="rasberries" />
  </div>
  <div class="grid__item grid__item--height2"></div>
  <div class="grid__item grid__item--height2"></div>
  <div class="grid__item grid__item--height3"></div>
  <div class="grid__item grid__item--height1"></div>
  <div class="grid__item grid__item--height2"></div>
</div>

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

</style>


<script>
    var $grid = $('.grid').masonry({
        itemSelector: 'none', // select none at first
        columnWidth: '.grid__col-sizer',
        gutter: '.grid__gutter-sizer',
        percentPosition: true,
        stagger: 30,
        // nicer reveal transition
        visibleStyle: { transform: 'translateY(0)', opacity: 1 },
        hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
      });

      // get Masonry instance
      var msnry = $grid.data('masonry');

      // initial items reveal
      $grid.imagesLoaded( function() {
        $grid.removeClass('are-images-unloaded');
        $grid.masonry( 'option', { itemSelector: '.grid__item' });
        var $items = $grid.find('.grid__item');
        $grid.masonry( 'appended', $items );
      });

      //-------------------------------------//
      // hack CodePen to load pens as pages

      var nextPenSlugs = [
        "{{ route('page2') }}",
        "{{ route('page2') }}",
        "{{ route('page2') }}",
      ];

      function getPenPath() {
        var slug = nextPenSlugs[ this.loadCount ];
        if ( slug ) {
          return  slug;
        }
      }

      //-------------------------------------//
      // init Infinte Scroll

      $grid.infiniteScroll({
        path: getPenPath,
        append: '.grid__item',
        outlayer: msnry,
        status: '.page-load-status',
      });

</script>
