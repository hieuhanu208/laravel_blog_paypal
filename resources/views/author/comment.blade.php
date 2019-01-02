@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                Author Comment
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post</th>
                            <th>Content</th>
                            <th>Created at</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                          @foreach (Auth::user()->comments as $comment)
                          <tr>
                              <td>{{$comment->id}}</td>
                              <td class="text-nowrap">{{$comment->post->title}}</td>
                              <td>{{$comment->content}}</td>
                              <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                              
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