 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      {{-- <img src="" alt="Leading Estate" class="brand-image img-circle elevation-3"
      style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Student Details</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Add Student
              </p>
            </a>
          </li> --}}
          <li class="nav-item">
            <a href="{{ route('user.profile') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('user.logout') }}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>Logout</p>
            </a>
          </li>
  
          <li class="nav-header">SETTINGS & SECURITY</li>
          <!-- User Menu -->
          <li class="nav-item">
            <a href="{{ route('user.signups') }}" class="nav-link">
             <i class="far fa-user nav-icon"></i>
             <p>
              Register User
            </p>
          </a>
        </li><!-- /.user menu -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-image nav-icon"></i>
            <p>
              Audit Logs
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
  </aside>
  