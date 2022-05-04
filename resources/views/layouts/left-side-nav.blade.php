<div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">Sales | Inventory</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label >Email | </label>
                        <label class="text-color">{{session()->get('email')}}</label>
                       
                    </li>

                    <style>
                        .text-color{
                            font-size: 15px;
                            text-transform:lowercase;
                        }
                    </style>



                    @if (Session::get('user_auth') == true && Session::get('privilege') == 1)
                        
                   
                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="{{ route('admin-dashbaord')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                     <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('admin-view-all-sales')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Sales Record</span></a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('admin-company')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Company Setup</span></a>
                    </li>
                    
                    
                    <li data-username="basic components Button Alert Badges breadcrumb Paggination progress Tooltip popovers Carousel Cards Collapse Tabs pills Modal Grid System Typography Extra Shadows Embeds" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Employees</span></a>
                        <ul class="pcoded-submenu">
                           
                             <li class=""><a href="{{ route('admin-add-new-sellers')}}" class="">Add<span class="pcoded-badge label label-danger">NEW</span></a></li>
                             <li class=""><a href="{{ route('admin-view_all')}}" class="">View</a></li>
                        </ul>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('admin-cats')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Categories</span></a>
                    </li>
					
					
					 <li data-username="Authentication Sign up Sign in reset password Change password Personal information profile settings map form subscribe" class="nav-item pcoded-hasmenu">
                        <a href="javascript:" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Products</span></a>
                        <ul class="pcoded-submenu">
                        <li class=""><a href="{{ route('admin-products')}}" class="">Add<span class="pcoded-badge label label-danger">NEW</span></a></li>
                            <li class=""><a href="{{ route('admin-view-products')}}" class=""  >View</a></li>
                        </ul>
                    </li>
                    
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('admin-discount')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Promo</span></a>
                    </li>
					
                   
                    <li data-username="Table bootstrap datatable footable" class="nav-item">
                        <a href="{{ route('admin-logs')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Sellers Logs</span></a>
                    </li>

                   

                    @else

                    <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
                        <a href="{{ route('saler-dashbaord')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('saler-overview')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Product Overview</span></a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('saler-saleP')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Sale Product</span></a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('saler-all-sales')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">All Sales</span></a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
                        <a href="{{ route('saler-notifaction')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Nofiy Admin</span></a>
                    </li>

                    @endif
                    
                    
                    <li data-username="Menu" class="nav-item">
                        <a href="{{ route('logout')}}" class="nav-link">
                            <span class="pcoded-micon"><i class="feather icon-power"></i>
                         </span>
                         <span class="pcoded-mtext">Log out</span>
                        </a>
                    </li>


                </ul>
            </div>
        </div>