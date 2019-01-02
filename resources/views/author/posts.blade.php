@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                Normal Table
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

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Created at</th>
                            <th>Updated at </th>
                            <th>Comment </th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach (Auth::user()->posts as $post)
                          <tr>
                              <td>{{$post->id}}</td>
                              <td class="text-nowrap"><a href="{{route('postSingle', $post->id)}}">{{$post->title}}</a></td>
                              <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                              <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
                              <td>{{$post->comments->count()}}</td>
                              <td>
                                <a href="{{route('editPost', $post->id)}}" class="btn btn-warning">Edit</a>
                                <a href="#" class="btn btn-danger" onclick="document.getElementById('deletePost-{{$post->id}}').submit()">Remove</a>
                                <form  method="POST" id="deletePost-{{$post->id}}" action="{{route('postDeletePost',$post->id)}}">@csrf</form>
                                
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