 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="/" class="brand-link text-center">

         <span class="brand-text font-weight-light"><b>Admin</b></span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item ">
                     <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->is('admin/dashboard')?'active':'' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>

                 </li>

                 <li class="nav-item ">
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('admin/users')?'active':'' }}">
                        <i class=' fas fa-user-friends'></i>
                        <p>
                            Add User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link }">
                        <i class='fas fa-sign-out-alt'></i>
                        <p>
                           Logout
                        </p>
                    </a>
                </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
