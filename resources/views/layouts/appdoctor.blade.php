<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Bootstrap Simple Admin Template</title>
    <link href="{{asset('fonts/awesome/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/awesome/solid.min.css') }}" rel="stylesheet">
    <link href="{{asset('fonts/awesome/brands.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/master.css') }}" rel="stylesheet">
    <link href="{{asset('css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <a href="{{ url('/medic/home') }}">
                    <img src="{{asset('img/logo.png') }}" alt="bootraper logo" class="app-logo">
                </a>
            </div>
            <ul class="list-unstyled components text-secondary">               
                <li>
                    <a href="{{ url('/medic/appointment/home') }}"><i class="fas fa-layer-group"></i> Lịch hẹn</a>                    
                </li>
                <li>
                    <a href="{{ url('/medic/profile/edit') }}"><i class="fas fa-user-friends"></i> Hồ sơ cá nhân</a>                    
                </li>  
                <li>
                    <a href="{{ url('/medic/schedule-timings') }}"><i class="fas fa-user-friends"></i> Thiết lập thời gian khám</a>                    
                </li>
                <!-- <li>
                    <a href="{{ url('/medic/truyvan-benhnhan') }}"><i class="fas fa-user-friends"></i>Truy vấn thông tin bệnh nhân</a>                    
                </li>       -->          
            </ul>
        </nav>
        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-white bg-white">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="" class="dropdown-item"><i class="fas fa-list"></i> Access Logs</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-database"></i> Back ups</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-cloud-download-alt"></i> Updates</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="" class="dropdown-item"><i class="fas fa-user-shield"></i> Roles</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span>{{ Auth::user()->name }}</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">
                                        <li><a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                <!-- <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>     -->
                <div class="container">
                    @include('partials.flash')
                    <div class="card">
                    @yield('content')
                    </div>
                </div>

                <div class="container">    
                    <div class="row">
                        <a class="col-sm-6 col-md-6 col-lg-3" href="{{ url('/medic/appointment/home') }}">
                            <div >
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="dfd text-center">
                                                <i class="blue large-icon mb-2 fas fa-layer-group"></i>
                                                <!-- <h4 class="mb-0">+21,900</h4> -->
                                                <h4 class="mb-0">Lịch hẹn</h4>
                                                <!-- <p class="text-muted">Lịch hẹn</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="col-sm-6 col-md-6 col-lg-3" href="{{ url('/medic/profile/edit') }}">
                            <div >
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="dfd text-center">
                                                <i class="orange large-icon mb-2 fas fa-user-shield"></i>
                                                <h4 class="mb-0">Hồ sơ cá nhân</h4>
                                                <!-- <p class="text-muted">INSTAGRAM FOLLOWERS</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a class="col-sm-6 col-md-6 col-lg-3" href="{{ url('/medic/schedule-timings') }}">
                            <div >
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="dfd text-center">
                                                <i class="orange large-icon mb-2 fas fa-hourglass-start"></i>
                                                <h4 class="mb-0">Thời gian khám</h4>
                                                <!-- <p class="text-muted">INSTAGRAM FOLLOWERS</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        <a class="col-sm-6 col-md-6 col-lg-3" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <div class="card">
                                    <div class="content">
                                        <div class="row">
                                            <div class="dfd text-center">
                                                <i class="olive large-icon mb-2 fas fa-sign-out-alt"></i>
                                                <h4 class="mb-0">Đăng xuất</h4>
                                                <!-- <p class="text-muted">TOTAL SALES</p> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->
    <script src="{!!url('/js/jquery.min.js')!!}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
  
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>