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
@if (Session::get('user_auth') == true && Session::get('privilege') == 1)
        <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
            <a href="{{ route('admin-dashboard')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
        </li>
        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
            <a href="{{ route('admin-view-all-sales')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-address-book"></i></span><span class="pcoded-mtext">Sales Records</span></a>
        </li>
        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
          <a href="{{ route('admincompany.index')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-briefcase"></i></span><span class="pcoded-mtext">Company</span></a>
        </li>
        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
          <a href="{{ route('adminusers.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Employees</span></a>
        </li>
        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
           <a href="{{ route('admincategories.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Categories</span></a>
        </li>
		<li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
          <a href="{{ route('adminproducts.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Products</span></a>
        </li>
        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
          <a href="{{ route('admindiscounts.index')}}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-briefcase"></i></span><span class="pcoded-mtext">Discounts</span></a>
        </li>
		<li data-username="Table bootstrap datatable footable" class="nav-item">
            <a href="{{ route('adminlogs.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-server"></i></span><span class="pcoded-mtext">Sellers Logs</span></a>
        </li>
  @else
        <li data-username="dashboard Default Ecommerce CRM Analytics Crypto Project" class="nav-item active">
           <a href="{{ route('saler-dashbaord')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
        </li>

        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
            <a href="{{ route('saler-overview')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Product Overview</span></a>
        </li>

        <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item">
            <a href="{{ route('salercreatesales.index')}}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Sale</span></a>
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
                <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                <span class="pcoded-mtext">Log out</span>
            </a>
        </li>
    </ul>
   </div>
</div>
<style>
.text-color{
    font-size: 15px;
    text-transform:lowercase;
}
</style>