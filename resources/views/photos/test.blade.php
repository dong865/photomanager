@extends('layouts.app')





@section('content')


    <link rel="stylesheet" href="{{ asset('demos/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('demos/css/waterfall.css') }}">

	<div id="container"></div>
<script type="text/x-handlebars-template" id="waterfall-tpl">
{{--  @{{ #result}}  --}}
    <div class="item">
        <img src="@{{image}}" width="@{{width}}" height="@{{height}}" />
    </div>
{{--  @{{ /result }}  --}}
</script>
<script src="{{ asset('demos/js/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('demos/js/libs/handlebars/handlebars.js') }}"></script>
<script src="{{ asset('demos/js/waterfall.min.js') }}"></script>
<script>
$('#container').waterfall({
    itemCls: 'item',
    colWidth: 222,
    gutterWidth: 15,
    gutterHeight: 15,
    isFadeIn: true,
    checkImagesLoaded: false,
    path: function(page) {
        return 'demos/data/data1.json?page=' + page;
    }
});
</script>


@endsection


