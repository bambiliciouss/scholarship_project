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
    <br> <br><br><br>
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-sm-2"></div>
            <!-- left column -->
            <div class="col-sm-8">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Student Registration</h3>
                    </div><!-- /.card-header -->

                    <!-- form start -->
                    
                    <form method="post" action="{{route('user.signup')}}" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            

                        <div class="card-body">
                            

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter last name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter first name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="midname">Middle Name</label>
                                        <input type="text" class="form-control" id="midname" name="midname" placeholder="Enter middle name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for="addressline">Addressline</label>
                                        <input type="text" class="form-control" id="addressline" name="addressline" placeholder="Enter addressline">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="barangay">Barangay</label>
                                        <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Enter barangay">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <input type="text" class="form-control" id="gender" name="gender" placeholder="Enter gender">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone no.">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="religion">Religion</label>
                                        <input type="text" class="form-control" id="religion" name="religion" placeholder="Enter religion">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="place_of_birth">Place of Birth</label>
                                        <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" placeholder="Enter place of birth">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label for="date_of_birth">Date of Birth</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter date of birth">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Student Photo</label>
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

                            <div class="form-group">
                                <label for="father_name">Father's Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter father's name">
                            </div>

                            <div class="form-group">
                                <label for="mother_name">Mother's Name</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter mother's name">
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
