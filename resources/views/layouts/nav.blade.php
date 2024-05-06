<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu" style='background:#ffffff;'>
            
            <li class="nav-header" style='background: #ffffff !important'>
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="rounded-circle img-lg" src="{!! asset('img/logo.png') !!}"
                            style=" width:201px;height:70px" />
                    </span>
                    
                <br/>
                <br/>
                    <div style='background-color: #1E73BE !important;padding: 7px; border-top-left-radius: 10px; border-bottom-left-radius: 10px;'>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" >
                            <span class="block m-t-xs font-bold" style='color:white'>{{ Auth::user()->name }}</span>
                            <span class="text-muted text-xs block" style='color: white !important'>System Administrator</span>
                        </a>
                    </div>
                </div>
                <div class="logo-element">

                </div>
            </li>

            <li  style='background:#ffffff;'>
                <a ><i class="fa fa-laptop" style='color: #244183'></i> <span class="nav-label" style='color: #244183'><strong> Telecom Towers</strong></span> <!--span
                        class="fa arrow"></span--></a>

                <ul class="nav nav-second-level collapse in" aria-expanded="true" >
                    <!-- <li class="active"><a href="{{ url('/mlw-dash') }}">Home</a></li> -->

                    <li class="{{ Request::is('telecom_towers') ? 'active' : '' }}" ><a href="{{ route('telecom_towers.index') }}">
                            <span class="menu-icon">
                                <i class="fa fa-window-maximize"  style='color: #244183' id="icon3"></i>
                            </span>
                            <span class="menu-title" style='color: #244183'>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('telecom_towers/reports') ? 'active' : '' }}"><a href="{{ route('telecom_towers.report') }}">
                            <span class="menu-icon">
                                <i class="fa fa-bar-chart" style='color: #244183' id="icon3"></i>
                            </span>
                            <span class="menu-title" style='color: #244183'>Reports</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="{{ Request::is('/data_centre_monitoring*') ? 'active' : '' }}" style='background:#ffffff;'>
                <a aria-expanded="true">
                    <i class="fa fa-laptop" style='color: #244183'></i> 
                    <span class="nav-label" style='color: #244183'><strong>Environmental State</strong>
                    </span> 
                    <!--span class="fa arrow"></span-->
                </a>

                <ul class="nav nav-second-level collapse in" aria-expanded="true"  style='background:#ffffff;'>
                    <!-- <li class="active"><a href="{{ url('/mlw-dash') }}">Home</a></li> -->

                    <li class="{{ Request::is('/') ? 'active' : '' }}" >
                        <a href="{{ route('data_centre.dashboard') }}">
                            <span class="menu-icon">
                                <i class="fa fa-window-maximize" style='color: #244183' id="icon3"></i>
                            </span>
                            <span class="menu-title" style='color: #244183'>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{ Request::is('data_centre_monitoring/reports') ? 'active' : '' }}" >
                        <a href="{{ route('data_centre.reports') }}">
                            <span class="menu-icon">
                                <i class="fa fa-bar-chart" style='color: #244183' id="icon3"></i>
                            </span>
                            <span class="menu-title" style='color: #244183'>Reports</span>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="">
                        <a href="{{ url('/logout') }}"><i class="fa fa-sign-out" style='color: #244183'></i> <span class="nav-label" style='color: #244183'  >Logout</span> </a>
            </li>

    </div>
</nav>