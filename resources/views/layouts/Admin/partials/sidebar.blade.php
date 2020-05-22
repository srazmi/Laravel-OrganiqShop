<!-- Brand Logo -->
<style>
  .brand-link {
    padding-left: 8rem!important; 
  }
</style>
<a href="/" class="brand-link pt-3 pb-5 pl-5">
    <img src="{{asset('assets/images/logo_white.png')}}" alt="logo" class="brand-image " style="margin-left: 20%" >
  </a>

  <!-- Sidebar -->
  <div class="sidebar" style="direction: ltr">
    <div style="direction: rtl">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Admin/dist/img/avatar3.png')}}"  alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> {{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                داشبوردها
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/home" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>داشبورد اول</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{"/dashboard2"}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>داشبورد دوم</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{"/dashboard3"}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>داشبورد سوم</p>
                </a>
              </li> --}}
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                مدیریت اسلایدها
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{'/slides'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده لیست اسلایدها</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                مدیریت کاربران
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{'/users'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده لیست کاربران</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                مدیریت محصولات
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{'/products'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده لیست محصولات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{'/sendproducts'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده وضعیت ارسال محصولات</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{'/stockroom'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده وضعیت انبار محصولات</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                مدیریت  پست ها
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{'/posts'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده پست ها</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                مدیریت  کامنت ها
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{'/comments'}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>مشاهده کامنت ها</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
  </div>
  <!-- /.sidebar -->