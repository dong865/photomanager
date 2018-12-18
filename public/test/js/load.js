var nextPenSlugs=[
    "{{ route('page2') }}",
    "{{ route('page2') }}",
    "{{ route('page2') }}",
    "{{ route('page2') }}",
    "{{ route('page2') }}"
]

function getPenPath() {
    var slug = nextPenSlugs[ this.loadCount ];
    if ( slug ) {
      return  slug;
    }
  }

$('.image-grid').infiniteScroll({
    path: getPenPath,
    append: '.image-grid__item',
    outlayer: msnry,
    status: '.scroller-status',
})
