@extends('layouts.admin')

@section('content')
<div class="main-container">
  

  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-3">
                  <div class="card p-4">
                      <div class="card-body d-flex justify-content-between align-items-center">
                          <div>
                              <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->postToday->count()}}</span>
                              <span class="font-weight-light">Post Today</span>
                          </div>

                          <div class="h2 text-muted">
                              <i class="icon icon-paper-clip"></i>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="card p-4">
                      <div class="card-body d-flex justify-content-between align-items-center">
                          <div>
                              <span class="h4 d-block font-weight-normal mb-2">{{Auth::user()->posts->count()}}</span>
                              <span class="font-weight-light">All Posts</span>
                          </div>

                          <div class="h2 text-muted">
                              <i class="icon icon-paper-plane"></i>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="card p-4">
                      <div class="card-body d-flex justify-content-between align-items-center">
                          <div>
                              <span class="h4 d-block font-weight-normal mb-2">{{$commentToday}}</span>
                              <span class="font-weight-light">Comment Todays</span>
                          </div>

                          <div class="h2 text-muted">
                              <i class="icon icon-book-open"></i>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="card p-4">
                      <div class="card-body d-flex justify-content-between align-items-center">
                          <div>
                              <span class="h4 d-block font-weight-normal mb-2">{{$allComments->count()}}</span>
                              <span class="font-weight-light">All Comments</span>
                          </div>

                          <div class="h2 text-muted">
                              <i class="icon icon-book-open"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row ">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                         Post by days 
                      </div>

                      <div class="card-body p-0">
                          
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection 