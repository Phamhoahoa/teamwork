@extends('admin.layout.index')
@section('content')
   <!-- Page Content -->
   <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>{{$status->name}}</small>
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
                        <form action="admin/status/update/{{$status->id}}" method="POST">
                            <input type = "hidden" name= "_token" value = "{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tittel</label>
                                <input class="form-control" name="titel" placeholder="Please Enter Your Tittel" value = "{{$status->tittel}}" />
                            </div>
                            <div class="form-group">
                                <label>Start</label>
                                <input class="form-control" name="start" placeholder="Please Enter Time Start" value="{{$status->start}}" />
                            </div>
                            <div class="form-group">
                                <label>End</label>
                                <input class="form-control" name="end" placeholder="Please Enter Time End" value = "{{$status->end}}"/>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <input class="form-control" name="content" placeholder="Please Enter Your Content" value = "{{$status->content}}"/>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" name="id_user" placeholder="Please Enter Id User" value = "{{$status->id_user}}"/>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <input class="form-control" name="id_category" placeholder="Please Enter Id Category" value = "{{$status->id_category}}"/>
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