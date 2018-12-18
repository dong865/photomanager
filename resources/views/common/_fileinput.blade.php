
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('images/css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{asset('images/themes/explorer-fa/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
<!-- Modal -->



    @section('customJs')
        {{--  图片插件  --}}
        <script src="{{asset('images/js/plugins/sortable.js')}}" type="text/javascript"></script>
        <script src="{{asset('images/js/fileinput.js')}}" type="text/javascript"></script>
        <script src="{{asset('images/js/locales/fr.js')}}" type="text/javascript"></script>
        <script src="{{asset('images/js/locales/es.js')}}" type="text/javascript"></script>
        <script src="{{asset('images/js/locales/zh.js')}}" type="text/javascript"></script>
        <script src="{{asset('images/themes/explorer-fa/theme.js')}}" type="text/javascript"></script>
        <script src="{{asset('images/themes/fa/theme.js')}}" type="text/javascript"></script>

        {{--  瀑布流  --}}
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

        {{--  无限滚动  --}}
        <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>

        <script>
            {{--  瀑布流  --}}
            //初始化masonry
            var $grid=$('.masonry').masonry({
                itemSelector: '.item',
                percentPosition:true,//响应式
            });
            $grid.imagesLoaded().progress( function() {
                $grid.masonry();
                });
            //点击图片
            function showImg(img){
                $('.roof').fadeIn('slow');
                $('.roof img').attr('src',img)
                $('.roof img').css('display','block')
                //禁止鼠标滑动
                $(document).bind("mousewheel",function(event, delta){
                    return false;
                })
            }
            //阻止冒泡
            $('.roof img').click(function(e){
                e.stopPropagation();
            })
            //点击遮罩层关闭
            $('.roof').click(function(e){
                $(this).fadeOut('slow');
                //移除绑定的禁止鼠标移动事件。
                $(document).unbind("mousewheel");
            })

            {{-- 无限卷动 --}}
            //初始化
            // 获取masonry实例
            var msnry = $grid.data('masonry');
            $grid.infiniteScroll({
             path: '.pagination__next',
             append: '.item',
             outlayer:msnry,
             status: '.page-load-status',
            })

            {{--  点击编辑按钮  --}}
            let i=true;//点击编辑按钮的bool值，默认true
            function onEdit(){
                $('.card-picture input').toggle();
                $('.edit-group').toggle();
                if(i){//编辑状态
                    i=false;
                    $('.edit').html('<i class="fa fa-edit mr-1"></i>提交');
                    $grid.infiniteScroll( 'destroy' )//销毁无限卷轴。
                    $('.picture-card').addClass('edit-card');//阴影效果
                    $('.picture-img').removeClass('edit-img');//删除图片样式类
                    $('.picture-img').removeAttr('onclick');//移除图片上的点击事件。

                }else{
                    i=true;
                    $('.edit').html('<i class="fa fa-edit mr-1"></i>编辑');
                    //重新初始化无限卷轴
                    $grid.infiniteScroll({
                        path: '.pagination__next',
                        append: '.item',
                        outlayer:msnry,
                        status: '.page-load-status',
                       })
                }

            }


         {{--  fileinput图片上传插件  --}}

            $(document).ready(function(){
                var gid;
                //fileinput插件属性
                $("#inputimg").fileinput({
                    theme: 'fa',
                    language: 'zh',
                    uploadUrl: "{{route('picture.store')}}",//上传地址
                    allowedFileExtensions: ['jpg', 'png', 'gif','jpeg','webp'],
                    showUpload: false, //是否显示上传按钮
                    showCaption: true,//是否显示标题
                    uploadAsync: false, //默认异步上传
                    showRemove: true, //显示移除按钮
                    showPreview: false, //是否显示预览区域
                    showBrowse:true, //是否显示浏览按钮
                    browseClass: "btn btn-primary", //按钮样式
                    removeFromPreviewOnError:true, //当选择的文件不符合规则时，例如不是指定后缀文件、大小超出配置等，选择的文件不会出现在预览框中，只会显示错误信息
                    browseLabel: '选择...',
                    removeLabel: '移除',
                    removeTitle: '删除选中文件',
                    cancelLabel: '取消',
                    cancelTitle: '取消上传',
                    uploadLabel: '上传',
                    uploadTitle: '上传选中文件',
                    dropZoneTitle: "拖拽图片文件放到这里</br>",
                    dropZoneClickTitle: "或者点击此区域添加图片",
                    browseOnZoneClick:true,//点击浏览区域上传。
                    uploadExtraData: function(previewId, index) {   //额外参数
                        return {
                            'id':gid
                        };
                    },
                    initialPreview: [//初始图片
                        {{--  @php
                            if($goods->show_goods->count()){
                                foreach($goods->show_goods as $show){
                                    $src=asset("storage/goods/show/$show->image");
                                    echo "'<img width=213 src=$src />',";
                                }
                            }
                        @endphp  --}}
                    ],
                    initialPreviewConfig: [//初始图片的配置。
                        {{--  @if ($goods->show_goods->count())
                            @foreach($goods->show_goods as $show)
                                {
                                    caption:"{{$show->image}}",// 展示的图片名称
                                    width:"213px",// 图片高度
                                    url:"{{route('show_goods.destroy')}}",// 预展示图片的删除调取路径
                                    extra: {oper: 'del'} ,//调用删除路径所传参数 
                                    key: "{{$show->id}}",// 调用删除路径所传参数                     
                                },
                            @endforeach
                        @endif  --}}
                    ],

                });

                //删除预处理（删除之前想要做什么事）
                $('#inputimg').on('filepredelete', function(event, key) {
                    console.log('Key = ' + key);
                });
                //删除后的处理（删除图片时想要做什么事）
                $('#inputimg').on('filedeleted', function(event, key) {
                    console.log('Key = ' + key);
                });

                // 异步上传成功结果处理
                $('#submit_btn').click(function(){
                    //ajax发送表单请求。表单数据到后台并插入数据库。
                    $.ajax({
                        type:'PATCH',
                        url:"{{route('picture.update',1)}}",
                        dataType:'json',
                        data:$('#myform').serialize(),
                        async: false,
                        error: function(request) {  //失败的话
                            alert("Connection error");
                        },
                        success: function(data) {  //表单验证成功
                            //返回数据库自增id
                            if(data){
                                 gid=data;//保存id
                                 console.log(gid);
                                // 插件的上传事件。ajax成功返回，上传图片。
                                $("#inputimg").fileinput("upload");
                                window.location.href="{{route('picture.index')}}";
                            }
                        }
                    })
                });
            });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
@endsection
