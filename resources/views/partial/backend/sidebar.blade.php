        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">



            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>


            @can('List-Jobs' ,'Create-Jobs' , 'Edit-Jobs' , 'Delete-Jobs')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1One"
                    aria-expanded="true" aria-controls="collapse1One">
                    <i class="fa fa-tasks"></i>
                    <span>Jobs</span>
                </a>
                <div id="collapse1One" class="collapse" aria-labelledby="heading1One" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('List-Jobs')
                        <a class="collapse-item" href="{{route('jobs.index')}}">Jobs</a>
                        @endcan
                        @can('Create-Jobs')
                        <a class="collapse-item" href="{{route('jobs.create')}}">Create Job</a>
                        @endcan
                    </div>
                </div>
            </li>
            @endcan

            @can('List-Employees' ,'Create-Employees' , 'Edit-Employees' , 'Delete-Employees')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-users"></i>
                    <span>Employees</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('List-Employees')
                        <a class="collapse-item" href="{{route('employees.index')}}">Employees</a>
                        @endcan
                        @can('Create-Employees')
                        <a class="collapse-item" href="{{route('employees.create')}}">Create Employee</a>
                        @endcan
                    </div>
                </div>
            </li>
            @endcan


            @can('List-Employees' ,'Create-Employees' , 'Edit-Employees' , 'Delete-Employees')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fa fa-file"></i>
                    <span>Employees Reports</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @can('List-Reports')
                             <a class="collapse-item" href="{{route('reports.index')}}">Employees Reports</a>
                        @endcan

                    </div>
                </div>
            </li>
            @endcan

            @can('Show-Statistics')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefour"
                    aria-expanded="true" aria-controls="collapsefour">
                    <i class="fa fa-pen"></i>
                    <span>Statistics</span>
                </a>
                <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('statistics.index')}}">Statistics</a>
                    </div>
                </div>
            </li>
            @endcan



            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission"
                    aria-expanded="true" aria-controls="collapsePermission">
                    <i class="fa fa-lock"></i>
                    <span>Permissions</span>
                </a>
                <div id="collapsePermission" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('roles.index')}}">List Roles</a>

                        <a class="collapse-item" href="{{route('roles.create')}}">Create Role</a>

                    </div>
                </div>
            </li>



        </ul>
        <!-- End of Sidebar -->
