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
                    
                    <form method="post" action="{{route('document.store')}}" enctype="multipart/form-data" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">                            

                        <div class="card-body">
                            

                            <div class="row">
                               
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-control-label">COR</label>
                                         <input type="file" class="form-control" id="docs" name="docs" required>
                                         
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-control-label">GRADES</label>
                                         <input type="file" class="form-control" id="docsg" name="docsg" required>
                                         
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
