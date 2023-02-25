<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  

<div class="login-box">

  @if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
  @endif

  @if ($message = Session::get('success'))
  <div class="alert alert-light alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
  @endif
  
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form class="" action="{{ route('user.signin') }}" method="post">
        @csrf
         <div class="input-group mb-3">
           <input type="email" name="email" class="form-control" placeholder="Email" required>
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-envelope"></span>
             </div>
           </div>
         </div>
         <div class="input-group mb-3">
           <input type="password" id="myInput" name="password" class="form-control" placeholder="Password" required>
           <div class="input-group-append">
             <div class="input-group-text">
               <span class="fas fa-lock"></span>
             </div>
           </div>
          
         </div> 
         <input type="checkbox" onclick="myFunction()">Show Password
         <div class="row">
           <div class="col-8">
             
           </div>
           <!-- /.col -->
        
           <div class="col-md-12">
            <button type="submit" class="btn btn-block btn-primary">Sign In</button>
          </div>
           <!-- /.col -->
         </div>
       </form>

       <br>
      <p>Not registered yet?</p>
      
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="{{ route('user.signups') }}" class="btn btn-outline-secondary">
          Signup as Student
        </a>
        <a href="{{ route('employee.signups') }}" class="btn btn-outline-secondary">
          Signup as Employee
        </a>
      </div>

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
