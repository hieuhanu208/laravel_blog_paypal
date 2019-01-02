@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                Admin Users
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Posts</th>
                            <th>Comments</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td class="text-nowrap">{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{$user->posts->count()}}</td>
                              <td>{{$user->comments->count()}}</td>
                              <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                              <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                              <td>
                                  <a href="{{route('editUsers',$user->id)}}" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
                                <form style="display:inline-block;" id="deleteUser-{{$user->id}}"action="#" method="post">
                                    @csrf 
                                  <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteComments-{{$user->id}}').submit()">X</a>
                                </form>
                                
                              </td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 