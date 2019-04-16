@extends('admin.layout.index')
@section('content')
  <!-- Page Content -->
  <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Status
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('noti'))
                    <div class = "alert alert-success">
                    {{session('noti')}}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tittel</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Content</th>
                                <th>User</th>
                                <th>Category</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($status as $s)
                            <tr class="odd gradeX" align="center">
                                <td>{{$s->id}}</td>
                                <td>{{$s->tittel}}</td>
                                <td>{{$s->start}}</td>
                                <td>{{$s->end}}</td>
                                <td>{{$s->content}}</td>
                                <td>{{$s->StatusUser->name}}</td>
                                <td>{{$s->StatusCategory->name}}</td>
                                
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/status/delete/{{$s->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/status/update/{{$s->id}}">Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection