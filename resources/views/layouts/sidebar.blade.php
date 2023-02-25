 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      {{-- <img src="" alt="Leading Estate" class="brand-image img-circle elevation-3"
      style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">LANI Scholarship</span>
    </a>

    @if (Auth::check())
      @if (auth()->user()->role === 'employee')
  
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
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                  Add Student
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('getStudents') }}" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Students
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('getEmployees') }}" class="nav-link">
                <i class="nav-icon far fa-user"></i>
                <p>Employees</p>
              </a>
            </li>
    
            <li class="nav-header">ACCOUNT</li>
            <!-- User Menu -->
            <li class="nav-item">
              <a href="{{ route('employee.profile') }}" class="nav-link">
              <i class="far fa-user nav-icon"></i>
              <p>
                Profile
              </p>
            </a>
          </li><!-- /.user menu -->
          <li class="nav-item">
            <a href="{{ route('user.logout') }}" class="nav-link">
              <i class="far fa-image nav-icon"></i>
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

    @elseif (auth()->user()->role === 'student')

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
              </li>
              <li class="nav-item">
                <a href="{{ route('getStudents') }}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                    Students
                  </p>
                </a>
              </li>
  
              <li class="nav-item">
                <a href="{{ route('getEmployees') }}" class="nav-link">
                  <i class="nav-icon far fa-user"></i>
                  <p>Employees</p>
                </a>
              </li> --}}
      
              <li class="nav-header">ACCOUNT</li>
              <!-- User Menu -->
              <li class="nav-item">
                <a href="{{ route('user.profile') }}" class="nav-link">
                <i class="far fa-user nav-icon"></i>
                <p>
                  Profile
                </p>
              </a>
            </li><!-- /.user menu -->
            <li class="nav-item">
              <a href="{{ route('user.logout') }}" class="nav-link">
                <i class="far fa-image nav-icon"></i>
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

    @endif
  @endif

  </aside>
  