@extends('layouts.masterdr')
@section('content')
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
                            
                        <span>{{__('localize.DropOut_System')}}</span>
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
                        
                        <!-- ============================================================== -->
                        <!-- Language -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-us"></i></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up"> <a class="dropdown-item" href="{{url('locale/dr')}}"><i class="flag-icon flag-icon-af"></i>دری</a> <a class="dropdown-item" href="#"><i class="flag-icon flag-icon-af"></i>پشتو</a> </div>
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
                           <div class="user-img"> <span class="round" style="margin-left: 10px;">{{substr(auth('admin')->user()->name , 0,3)}}</span> </div>
                        </a>
                    </div>
                      <div class="profile-text">
                          <h5>{{auth('admin')->user()->name}}</h5>
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
                        <li> <a href="{{url('index')}}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">{{__('localize.Home')}}</span></a>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" aria-expanded="false"><i class="icon-graduation"></i><span class="hide-menu">{{__('localize.students')}}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{url('all_students')}}">{{__('localize.all_students')}}</a></li>
                                <li><a href="{{url('dropedout')}}">{{__('localize.dropedout_students')}}</a></li>
                                <li><a href="{{url('black_list')}}">{{__('localize.black_list')}}</a></li>
                            </ul>
                        </li>
                        <li> <a href="documents" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">{{__('localize.Documents')}}</span></a>
                        </li>                            
                        <li> <a href="{{url('users')}}" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">{{__('localize.Users')}}</span></a>
                        </li>
                        @admin('super')                       
                        <li> <a href="{{url('syslog_dr')}}" aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">{{__('localize.sys_log')}}</span></a>
                        </li>
                        @endadmin
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
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor" style="margin-left: 15px;">{{__('localize.Reports')}}</h3>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                          <form action="{{url('search_for_report')}}" method="get">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                        <button class="btn btn-primary pull-right" style="float: right;">{{__('localize.Search')}}</button>
                                    </div>
                                <div class="col-md-3">
                                     <div class="controls">
                                         <select name="province" required id="select" class="form-control">
                                             <option value="">{{__('localize.Select_Your_Province')}}</option>
                                             @foreach($select->unique('province') as $pro)
                                             <option value="{{$pro->province}}">{{$pro->province}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                </div>                                
                                <div class="col-md-3">
                                     <div class="controls">
                                         <select name="year" required id="select" class="form-control">
                                             <option value="">{{__('localize.Select_Your_Year')}}</option>
                                             @foreach($select->unique('year') as $yea)
                                             <option value="{{$yea->year}}">{{$yea->year}}</option>
                                             @endforeach
                                         </select>
                                     </div>
                                </div>
                               <div class="col-md-3">
                                  <div class="controls">
                                      <select name="faculty" id="select" required="please choose" class="form-control">
                                          <option value="0">{{__('localize.Select_Your_Faculty')}}</option>
                                   @foreach($select->unique('faculty') as $facul)
                                          <option value="{{$facul->faculty}}">{{$facul->faculty}}</option>
                                   @endforeach   
                                      </select>
                                  </div>
                               </div> 
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive m-t-20">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">{{__('localize.Name')}}</th>
                                                    <th class="text-center">{{__('localize.Father_Name')}}</th>
                                                    <th class="text-center">{{__('localize.Province')}}</th>
                                                    <th class="text-center">{{__('localize.Year')}}</th>
                                                    <th class="text-center">{{__('localize.Faculty')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($select as $se)
                                                <tr>
                                                    <td class="text-center">{{$se->name}}</td>
                                                    <td class="text-center" style="width: 193px;">{{$se->father_name}}</td>                          
                                                    <td class="text-center" style="width: 194px;">{{$se->province}}</td>
                                                    <td class="text-center" style="width: 154px;">{{$se->year}}</td>
                                                    <td style="width: 270px;" class="text-center">{{$se->faculty}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                                <form action="{{url('export')}}" method="get">
                                <div class="col-md-12">
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="submit">{{__('localize.Download_As_Excel')}}</button>
                                        <button id="print" class="btn btn-default btn-outline" type="button"> <span> {{__('localize.Print')}} <i class="fa fa-print"></i></span> </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
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
@endsection
