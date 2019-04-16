@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Add</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                        <div class = "alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif

                        @if(session('noti'))
                            <div class= "alert alert-success">
                            {{session('noti')}}
                            </div>
                        @endif

                        <form action="admin/course/add" method="POST">
                        <input type = "hidden" name= "_token" value = "{{csrf_token()}}">
                            
                            <div class="form-group">
                                <label>Code</label>
                                <input class="form-control" name="code" placeholder="Please Enter Code course" />
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Name course" />
                            </div>
                            
                            
                           
                            <button type="submit" class="btn btn-default">Course Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection