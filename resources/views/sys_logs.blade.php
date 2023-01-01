@extends('layouts.master')
@section('content')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/main/kankor.jpg" style="width: 50px;" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            
                        <span>DropOut System</span>
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Comment -->

                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search" action="{{url('search')}}" method="get">
                                <input type="text" class="form-control" placeholder="Search & enter" name="search"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li>
                        
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="{{url('locale/dr')}}"><i class="flag-icon flag-icon-af"></i>دری</a> <a class="dropdown-item" href="{{url('locale/ps')}}"><i class="flag-icon flag-icon-af"></i>پشتو</a> </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="profile-pic">{{ auth('admin')->user()->name }}</span></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-text">
                                                <h4>{{ auth('admin')->user()->name }}</h4>
                                                </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>@admin('super')
                                    <a class="dropdown-item" href="{{ route('admin.show') }}">{{ ucfirst(config('multiauth.prefix')) }}</a>
                                    <a class="dropdown-item" href="{{ route('admin.roles') }}">Roles</a>
                                    @endadmin</li>
                                    <a class="dropdown-item" href="{{ route('admin.password.change') }}">Change Password</a>
                                <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                </ul>
                            </div>

                        </li>



                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img">
                        <!-- this is blinking heartbit-->
                        <a href="#">
                           <div class="user-img"> <span class="round" style="margin-left: 10px;">{{substr(Auth::user()->name , 0,3)}}</span> </div>
                        </a>
                    </div>
                    <div class="profile-text">
                        <h5>{{Auth::user()->name}}</h5>
                        <a href="{{route('admin.password.change')}}" class="" data-toggle="tooltip" title="Email"><i class="mdi mdi-settings"></i></a>
                        <a href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i>
                        </a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <!-- User profile text-->
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a href="{{url('index')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="icon-graduation"></i><span class="hide-menu">Students </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('all_students')}}">All Students</a></li>
                                <li><a href="{{url('dropedout')}}">DropedOut Students</a></li>
                                <li><a href="{{url('black_list')}}">Black_List Students</a></li>
                            </ul>
                        </li>
                        <li> <a href="documents" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Documents</span></a>
                        </li>                        
                        <li> <a href="{{url('users')}}" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">Users</span></a>
                        </li>                        
                        <li> <a href="{{url('report')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Reports</span></a>
                        </li>                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">System Logs</h3>
                    </div>
                    
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Droped_By</th>
                                                <th class="text-center">Gender</th>
                                                <th class="text-center">Province</th>
                                                <th class="text-center">Result</th>
                                                <th class="text-center">Kankor_Number</th>
                                                <th class="text-center">Year</th>
                                                <th class="text-center">School</th>
                                                <th class="text-center">G_Name</th>
                                                <th class="text-center">Last_Name</th>
                                                <th class="text-center">Father_Name</th>
                                                <th class="text-center">Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($select as $se)
                                            <tr>
                                                <td class="text-center">{{$se->droped_by}}</td>
                                                <td class="text-center">{{$se->gender}}</td>
                                                <td class="text-center">{{$se->province}}</td>
                                                <td class="text-center">{{$se->faculty}}</td>
                                                <td class="text-center">{{$se->kankor_score}}</td>
                                                <td class="text-center">{{$se->year}}</td>
                                                <td class="text-center">{{$se->school}}</td>
                                                <td class="text-center">{{$se->grand_father_name}}</td>
                                                <td class="text-center">{{$se->last_name}}</td>
                                                <td class="text-center">{{$se->father_name}}</td>
                                                <td class="text-center">{{$se->name}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>


                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
 @endsection