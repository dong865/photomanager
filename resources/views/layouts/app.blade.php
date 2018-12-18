<!DOCTYPE html>

<html lang="cn">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>@yield('title') | {{env('APP_NAME', 'Laravel')}}</title>
    <!-- Icons-->
    {{--  <link rel="icon" type="image/png" href="{{ asset('icon/icon.png') }}">  --}}
    <link href="{{asset('photostyle/vendors/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('photostyle/vendors/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('photostyle/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('photostyle/vendors/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('photostyle/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('photostyle/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">

  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    @include('layouts._header')
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="nav-icon icon-speedometer"></i> 主页
              </a>
            </li>
             {{-- <li class="nav-title">站点管理</li>
            <li class="nav-item">
              <a class="nav-link" href="colors.html">
                <i class="nav-icon icon-drop"></i> 用户</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="typography.html">
                <i class="nav-icon icon-pencil"></i> Typography</a>
            </li>
             <li class="nav-title">Components</li>  --}}

            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                  <i class="fa fa-image mr-3" aria-hidden="true"></i> 图片管理 </a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="{{route('photo.index')}}">
                      <i class="nav-icon icon-puzzle mr-3"></i> 列表</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="base/cards.html">
                    <i class="nav-icon icon-puzzle mr-3"></i> Cards</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="base/carousel.html">
                    <i class="nav-icon icon-puzzle mr-3"></i> Carousel</a>
                </li>
              </ul>
            </li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="fa fa-mortar-board mr-3"></i> 站点管理 </a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="{{route('admin.index')}}">
                    <i class="nav-icon icon-user mr-3"></i>用户管理</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="{{route('role.index')}}">
                    <i class="nav-icon fa fa-address-card-o mr-3" aria-hidden="true"></i>角色管理</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="buttons/dropdowns.html">
                    <i class="nav-icon icon-cursor mr-3"></i> Dropdowns</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link ml-2 small" href="buttons/brand-buttons.html">
                    <i class="nav-icon icon-cursor mr-3"></i> Brand Buttons</a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <!-- Breadcrumb-->
        {{--  <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Dashboard</li>
            <!-- Breadcrumb Menu-->
            <li class="breadcrumb-menu d-md-down-none">
                <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn" href="#">
                    <i class="icon-speech"></i>
                </a>
                <a class="btn" href="./">
                    <i class="icon-graph"></i>  Dashboard</a>
                <a class="btn" href="#">
                    <i class="icon-settings"></i>  Settings</a>
                </div>
            </li>
        </ol>  --}}
          <div class="container-fluid mt-4">
          <div class="animated fadeIn"></div>
        </div>
        @include('common.message')
        <div class="position-relative">
            @yield('content')
        </div>


      </main>
      <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
              <i class="icon-list"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
              <i class="icon-speech"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
              <i class="icon-settings"></i>
            </a>
          </li>
        </ul>
        <!-- Tab panes-->
        <div class="tab-content">
          <div class="tab-pane active" id="timeline" role="tabpanel">
            <div class="list-group list-group-accent">
              <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Today</div>
              <div class="list-group-item list-group-item-accent-warning list-group-item-divider">
                <div class="avatar float-right">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                </div>
                <div>Meeting with
                  <strong>Lucas</strong>
                </div>
                <small class="text-muted mr-3">
                  <i class="icon-calendar"></i>  1 - 3pm</small>
                <small class="text-muted">
                  <i class="icon-location-pin"></i>  Palo Alto, CA</small>
              </div>
              <div class="list-group-item list-group-item-accent-info">
                <div class="avatar float-right">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                </div>
                <div>Skype with
                  <strong>Megan</strong>
                </div>
                <small class="text-muted mr-3">
                  <i class="icon-calendar"></i>  4 - 5pm</small>
                <small class="text-muted">
                  <i class="icon-social-skype"></i>  On-line</small>
              </div>
              <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Tomorrow</div>
              <div class="list-group-item list-group-item-accent-danger list-group-item-divider">
                <div>New UI Project -
                  <strong>deadline</strong>
                </div>
                <small class="text-muted mr-3">
                  <i class="icon-calendar"></i>  10 - 11pm</small>
                <small class="text-muted">
                  <i class="icon-home"></i>  creativeLabs HQ</small>
                <div class="avatars-stack mt-2">
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/2.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/3.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                </div>
              </div>
              <div class="list-group-item list-group-item-accent-success list-group-item-divider">
                <div>
                  <strong>#10 Startups.Garden</strong> Meetup</div>
                <small class="text-muted mr-3">
                  <i class="icon-calendar"></i>  1 - 3pm</small>
                <small class="text-muted">
                  <i class="icon-location-pin"></i>  Palo Alto, CA</small>
              </div>
              <div class="list-group-item list-group-item-accent-primary list-group-item-divider">
                <div>
                  <strong>Team meeting</strong>
                </div>
                <small class="text-muted mr-3">
                  <i class="icon-calendar"></i>  4 - 6pm</small>
                <small class="text-muted">
                  <i class="icon-home"></i>  creativeLabs HQ</small>
                <div class="avatars-stack mt-2">
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/2.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/3.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                  <div class="avatar avatar-xs">
                    <img class="img-avatar" src="{{asset('photostyle/img/avatars/8.jpg')}}" alt="admin@bootstrapmaster.com">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane p-3" id="messages" role="tabpanel">
            <div class="message">
              <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                  <span class="avatar-status badge-success"></span>
                </div>
              </div>
              <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
              </div>
              <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
              <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                  <span class="avatar-status badge-success"></span>
                </div>
              </div>
              <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
              </div>
              <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
              <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                  <span class="avatar-status badge-success"></span>
                </div>
              </div>
              <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
              </div>
              <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
              <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                  <span class="avatar-status badge-success"></span>
                </div>
              </div>
              <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
              </div>
              <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
            <hr>
            <div class="message">
              <div class="py-3 pb-5 mr-3 float-left">
                <div class="avatar">
                  <img class="img-avatar" src="{{asset('photostyle/img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                  <span class="avatar-status badge-success"></span>
                </div>
              </div>
              <div>
                <small class="text-muted">Lukasz Holeczek</small>
                <small class="text-muted float-right mt-1">1:52 PM</small>
              </div>
              <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
              <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
            </div>
          </div>
          <div class="tab-pane p-3" id="settings" role="tabpanel">
            <h6>Settings</h6>
            <div class="aside-options">
              <div class="clearfix mt-4">
                <small>
                  <b>Option 1</b>
                </small>
                <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                  <input class="switch-input" type="checkbox" checked="">
                  <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                </label>
              </div>
              <div>
                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
              </div>
            </div>
            <div class="aside-options">
              <div class="clearfix mt-3">
                <small>
                  <b>Option 2</b>
                </small>
                <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                  <input class="switch-input" type="checkbox">
                  <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                </label>
              </div>
              <div>
                <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
              </div>
            </div>
            <div class="aside-options">
              <div class="clearfix mt-3">
                <small>
                  <b>Option 3</b>
                </small>
                <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                  <input class="switch-input" type="checkbox">
                  <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                </label>
              </div>
            </div>
            <div class="aside-options">
              <div class="clearfix mt-3">
                <small>
                  <b>Option 4</b>
                </small>
                <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                  <input class="switch-input" type="checkbox" checked="">
                  <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                </label>
              </div>
            </div>
            <hr>
            <h6>System Utilization</h6>
            <div class="text-uppercase mb-1 mt-4">
              <small>
                <b>CPU Usage</b>
              </small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">348 Processes. 1/4 Cores.</small>
            <div class="text-uppercase mb-1 mt-2">
              <small>
                <b>Memory Usage</b>
              </small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">11444GB/16384MB</small>
            <div class="text-uppercase mb-1 mt-2">
              <small>
                <b>SSD 1 Usage</b>
              </small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">243GB/256GB</small>
            <div class="text-uppercase mb-1 mt-2">
              <small>
                <b>SSD 2 Usage</b>
              </small>
            </div>
            <div class="progress progress-xs">
              <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <small class="text-muted">25GB/256GB</small>
          </div>
        </div>
      </aside>
    </div>
   {{--  <footer class="app-footer">
      <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
    </footer>  --}}
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('photostyle/vendors/jquery/js/jquery.min.js')}}"></script>
    <script src="{{asset('photostyle/vendors/popper.js/js/popper.min.js')}}"></script>
    <script src="{{asset('photostyle/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('photostyle/vendors/pace-progress/js/pace.min.js')}}"></script>
    <script src="{{asset('photostyle/vendors/perfect-scrollbar/js/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('photostyle/vendors/@coreui/coreui/js/coreui.min.js')}}"></script>
  </body>
  @yield('customJs')
</html>
