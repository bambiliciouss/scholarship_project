<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @include('layouts.head')
    </head>
    
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            {{-- <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
            </div> --}}
            
            <!-- Navbar -->
            @include('layouts.navbar')
            <!-- /.navbar -->
            
            <!-- Main Sidebar Container -->
            @include('layouts.sidebar')
            <!-- /.sidebar -->
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->

            </div>
            <!-- /.content-wrapper -->
            
            <footer class="main-footer">
                @include('layouts.footer')
            </footer>
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

        </div>
        <!-- ./wrapper -->
        @include('layouts.foot')
    </body>
</html>
