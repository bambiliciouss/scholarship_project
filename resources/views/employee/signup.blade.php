<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        @include('layouts.head')
    </head>
<body>

<section class="content">
    <br>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-sm-2"></div>
            <!-- left column -->
            <div class="col-sm-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Employee Registration</h3>
                    </div><!-- /.card-header -->

                    <!-- form start -->
                    
                    <form method="post" action="{{route('employee.signup')}}" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            

                        <div class="card-body">
                            

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="addressline">Addressline</label>
                                        <input type="text" class="form-control" id="addressline" name="addressline" placeholder="Enter addressline">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="town">Town</label>
                                        <input type="text" class="form-control" id="town" name="town" placeholder="Enter Town">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="zipcode">Zipcode</label>
                                        <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="Enter age">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                
                               
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no.">
                                    </div>
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <label class="form-control-label">Employee Photo</label>
                                         <input type="file" class="form-control" id="image" name="image" >
                                         
                                    </div>
                                </div>
                               
                            </div>

                           

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>

                             
                        </div>
                        <!-- /.card-body -->                
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                            <a href="{{url()->previous()}}" class="btn btn-default float-right">Cancel</a>
                        </div>
                    </form>
                </div><!-- /.card -->
            </div><!--/.col (right) -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@include('layouts.foot')
</body>

</html>