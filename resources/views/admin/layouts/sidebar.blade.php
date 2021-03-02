<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">
                <div class="logo-img">
                   {{-- <img src="{{asset('template/src/img/brand-white.svg')}}" class="header-brand-img" alt="lavalite">  --}}
                   <img src="https://static.wixstatic.com/media/843435_19ebea197738465ab4f07d4c64518959%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/843435_19ebea197738465ab4f07d4c64518959%7Emv2.png" class="header-brand-img" alt="lavalite"> 
                </div>
                <span class="text">RealHealthyMe</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>
        
        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-item active">
                        <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Staff</span> <span class="badge badge-danger">{{count(App\Models\User::where('role_id','!=',3)->get())}}</span></a>
                        <div class="submenu-content">
                            <a href="{{route('healthProfessional.index')}}" class="menu-item">Staff List</a>
                            <a href="{{route('healthProfessional.create')}}" class="menu-item">New Staff</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>