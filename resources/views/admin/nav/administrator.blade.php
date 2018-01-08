
        <li class="treeview"><a href="#"><i class="fa fa-building"></i> <span>School Manager</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
            <ul class="treeview-menu">
                {{--Menu year--}}
                    <li class="treeview"><a href="#"><i class="fa fa-calendar fa-fw"></i> Year <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                            <li><a href="{{URL::to('/admin/year/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Year</a></li><li class="treeview">
                        </ul>
                    </li>
                {{--Menu Classroom--}}
                <li class="treeview"><a href="#"><i class="fa fa-building fa-fw"></i> Class <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/classroom/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Class</a></li><li class="treeview">
                    </ul>
                </li>
                {{--Menu Turn--}}
                <li class="treeview"><a href="#"><i class="fa fa-calendar-times-o fa-fw"></i> Session <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/session/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Session</a></li><li class="treeview">
                    </ul>
                </li>
                {{--Menu Generation--}}
                <li class="treeview"><a href="#"><i class="fa fa-google fa-fw"></i> Generation <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/generation/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Generation</a></li><li class="treeview">
                    </ul>
                </li>
                {{--Menu Student--}}
                <li class="treeview"><a href="#"><i class="fa fa-mortar-board fa-fw"></i> Students <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/student/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Student</a></li><li class="treeview">
                    </ul>
                </li>
                {{--Menu Teacher--}}
                <li class="treeview"><a href="#"><i class="fa fa-user-md fa-fw"></i> Teachers <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/teacher/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add Teacher</a></li><li class="treeview">
                    </ul>
                </li>

                <li class="treeview"><a href="#"><i class="fa fa-book fa-fw"></i> Subject <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                    <ul class="treeview-menu">
                        <li><a href="{{URL::to('/admin/subject/create')}}">&nbsp;&nbsp;&nbsp;&nbsp; Add new</a></li><li class="treeview">
                    </ul>
                </li>

            </ul>
        </li>
        {{--End menu School mgr--}}
