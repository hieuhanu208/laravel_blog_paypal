@extends('layouts.master')
@section('content')
<!-- Page Header -->
    <header class="masthead" style="background-image: url('{{asset('assets/img/home-bg.jpg')}}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h2>{{$posts->title}}</h2>
              
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            

            <p>{{$posts->content}}</p>
          </div>
        </div>
       
        <div class="comments">
          <hr/>
          <h4>Comments</h4>
          <hr/>
          @foreach ($posts->comments as $comment )
          
  
          <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="panel panel-white post panel-shadow">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>by {{$comment->user->name}}</b></a>
                                    
                                </div>
                                <h6 class="text-muted time"> on {{($comment->created_at)}}</h6>
                            </div>
                        </div> 
                        <div class="post-description"> 
                            <p>{{$comment->content}}</p>
                      
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <hr/>
          @endforeach
      </div>
     
        
      </div>
    </article>

 @endsection   