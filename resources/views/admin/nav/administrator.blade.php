<section class="sidebar" xmlns="http://www.w3.org/1999/html">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/photo/{{Auth::user()->photo}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{!! Auth::user()->username !!}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        {{--Menu Admininstrator--}}
        <li class="treeview"><a href="#"><i class="fa fa-lock"></i> <span>Administrator</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu user--}}
                    <li class="treeview"><a href="#"><i class="fa fa-user fa-fw"></i> User <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('/admin/user')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add User</a></li><li class="treeview">
                            {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Login</a></li><li class="treeview">--}}
                            {{--<li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Reset Password</a></li><li class="treeview">--}}
                        </ul>
                    </li>

                {{--Roles--}}

                {{--<li class="treeview"><a href="#"><i class="fa fa-address-book-o fa-fw"></i> Roles <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>--}}
                    {{--<ul class="treeview-menu">--}}
                        {{--<li><a href="{{url('/role/view')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">--}}
                    {{--</ul>--}}

                {{--</li>--}}

                {{--position--}}

                <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Positions <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/admin/position/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>

                </li>

                <li class="treeview"><a href="#"><i class="fa fa-table" aria-hidden="true"></i> Menu <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li> <a href="{{URL::to('/admin/brand/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Create</a></li><li class="treeview">
                    </ul>

                </li>

                {{--category--}}
                <li class="treeview"><a href="#"><i class="fa fa-users" aria-hidden="true"></i> Category <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('category.index')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                    </ul>

                </li>

                {{--end Roles--}}


                {{--End menu user--}}
                    <li class="treeview"><a href="#"><i class="fa fa-address-book-o fa-fw"></i> Testing <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            {{--Menu Province--}}
                            <li class="treeview"><a href="#"><i class="fa fa-map-marker fa-fw"></i> Provinces <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View</a></li><li class="treeview">
                                </ul>
                            </li>

                            {{--End menu Province--}}

                            {{--Menu Distric--}}
                            <li class="treeview"><a href="#"><i class="fa fa-map-pin fa-fw"></i> Districts <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                                </ul>
                            </li>
                            {{--End menu Distric--}}

                            {{--Menu Commune--}}
                            <li class="treeview"><a href="#"><i class="fa fa-map-o fa-fw"></i> Communes <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                                </ul>
                            </li>
                            {{--End menu Commune--}}

                            {{--Menu Village--}}
                            <li class="treeview"><a href="#"><i class="fa fa-home fa-fw"></i> Villages <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                                </ul>
                            </li>
                            {{--End menu Village--}}


                            {{--Menu Set Value--}}
                            <li class="treeview"><a href="#"><i class="fa fa-sliders fa-fw"></i> Set-Values <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                                <ul class="treeview-menu">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; Add New</a></li><li class="treeview">
                                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp; View All</a></li><li class="treeview">
                                </ul>
                            </li>
                        </ul>

                    </li>


            </ul>
        </li>
        {{--End menu administrator--}}
        {{--Menu School mgr--}}
        <li class="treeview"><a href="#"><i class="fa fa-building"></i> <span>School Manager</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu year--}}
                    <li class="treeview"><a href="#"><i class="fa fa-calendar fa-fw"></i> Year <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('/admin/year/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Year</a></li><li class="treeview">
                        </ul>
                    </li>
                {{--Menu Turn--}}
                <li class="treeview"><a href="#"><i class="fa fa-calendar-times-o fa-fw"></i> Session <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/session/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Session</a></li><li class="treeview">
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-google fa-fw"></i> Generation <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/generation/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Generation</a></li><li class="treeview">
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-mortar-board fa-fw"></i> Students <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/student/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Student</a></li><li class="treeview">
                    </ul>
                </li>
                <li class="treeview"><a href="#"><i class="fa fa-user-md fa-fw"></i> Teachers <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/teacher/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Teacher</a></li><li class="treeview">
                    </ul>
                </li>
            </ul>
        </li>
        {{--End menu School mgr--}}
    </ul>
</section>