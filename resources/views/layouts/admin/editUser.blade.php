@extends('layouts.admin')

@section('content')
<div class="content">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Edit Users
                    </div>

                    @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err )
                            <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('postEditUser', $users->id)}}" method="post">
                        @csrf
                        <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Name</label>
                                            <input name="name" id="normal-input"  class="form-control" value="{{$users->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Email</label>
                                            <input name="email" id="normal-input"  class="form-control" value="{{$users->email}}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="normal-input" class="form-control-label">Permisions</label>
                                            <br />
                                            <input type="checkbox" name="admin" class="form-control" value=1 {{$users->admin == true ? 'checked': ''}}>Admin<br>

                                            <input type="checkbox" name="author" class="form-control"  value=1 {{$users->author == true ? 'checked': ''}}> Author<br>
                                        </div>
                                    </div>
                                 </div>


                            <button class="btn btn-success" type="submit">Update Users</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection