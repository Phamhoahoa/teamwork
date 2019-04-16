@extends('admin.layout.index')
@section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">

                        @if(count($errors)> 0 )
                        <div class = "alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                        @endif
                        @if(session('noti'))
                        <div class = "alert alert-success">
                            {{sesstion('noti')}}
                        </div>
                        @endif
                        <form action="admin/user/update/{{$user->id}}" method="POST">
                            <input type = "hidden" name= "_token" value = "{{csrf_token()}}">
                            <div class="form-group">
                                <label>MSSV</label>
                                <input class="form-control" name="mssv" placeholder="Please Enter Your Code" value = "{{$user->mssv}}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" placeholder="Please Enter Your Password" value="{{$user->password}}" />
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter Your Name" value = "{{$user->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>Birth</label>
                                <input class="form-control" name="birth" placeholder="Please Enter Your Birth" value = "{{$user->birth}}"/>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" placeholder="Please Enter Your Phone" value = "{{$user->phone}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Your Email" value = "{{$user->email}}"/>
                            </div>
                            <button type="submit" class="btn btn-default">Category Edit</button>
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