<!doctype html>
<html lang="en" class="export">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">

  <title>Infinite Scroll &#xB7; Masonry images</title>

    <link rel="stylesheet" href="{{ asset('test/css/infinite-scroll-docs.css') }}" media="screen">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    {{-- <script src="{{ asset('test/js/load.js') }}"></script> --}}
    {{-- <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script> --}}
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

</head>

<body>

<ol class="site-nav">
  <li class="site-nav__item site-nav__item--homepage">
    <a href="../../.">Infinite Scroll</a>
  </li>
  <li class="site-nav__item site-nav__item--options">
    <a href="../../options.html">Options</a>
  </li>
  <li class="site-nav__item site-nav__item--api">
    <a href="../../api.html">API</a>
  </li>
  <li class="site-nav__item site-nav__item--events">
    <a href="../../events.html">Events</a>
  </li>
  <li class="site-nav__item site-nav__item--extras">
    <a href="../../extras.html">Extras</a>
  </li>
  <li class="site-nav__item site-nav__item--license">
    <a href="../../license.html">License</a>
  </li>
</ol>

<div class="main">
    <div class="container container--wide">
      <h1 class="page-title">Masonry images</h1>
        <div class="image-grid are-images-unloaded" data-js="image-grid">
        <div class="image-grid__col-sizer"></div>
        <div class="image-grid__gutter-sizer"></div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/laIuV0D.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/777dcVU.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/ZPPFND3.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/EpYbuG7.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/kXUHDn5.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/Qmz61wo.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/aPia86B.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/iQRKg2a.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/XREWwIc.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/MV9SvaP.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/qjQ9XWl.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/ZJ088Tk.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/SuZLV2U.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/71H2B0k.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/vxOA4hg.jpg">
            </div>
            <div class="image-grid__item">
            <img class="image-grid__image" src="https://i.imgur.com/8kLXqdP.jpg">
            </div>

        </div>

        <div class="scroller-status">
            <div class="loader-ellips infinite-scroll-request">
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
                <span class="loader-ellips__dot"></span>
            </div>
            <p class="scroller-status__message infinite-scroll-last">End of content</p>
            <p class="scroller-status__message infinite-scroll-error">No more pages to load</p>
        </div>

      <p class="pagination">
        <a class="pagination__next" href="{{ route('page2') }}">Next page</a>
      </p>

        {{-- <footer class="full-page-demo-footer"></footer> --}}

    </div>
</div>


  <script src="{{ asset('test/js/infinite-scroll-docs.min.js?3') }}"></script>
<script>


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

        $('.image-grid').infiniteScroll({
            path: '.pagination__next',
            append: '.image-grid__item',
            status: '.scroller-status',
        })


</script>
{{-- <script src="{{ asset('test/js/infinite-scroll-docs.min.js?3') }}"></script> --}}
</body>
</html>
