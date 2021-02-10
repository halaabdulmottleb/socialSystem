@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    
    <div class="row justify-content-center">
      <!-- user information card -->
        <div class="col-md-2">
          <div class="card">
            <img src="/avatars/3474950.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{strtoupper($user['user_name'])}}</h5>
              <p> 
                <i class="fa fa-envelope fa-fw"> </i>
                   | 
                {{$user['user_email']}}
              </p>
              <p class="card-text"></p>
             
            </div>
          </div>
        </div>
        <!-- end user information card -->
        <!-- posts card -->
        <div class="col-md-6 mt-4">
          <!-- addPost -->
            @component('components/addPostComponent' )      
            @endcomponent
            <!-- end add post -->

            <div class="card mt-4">
                <div class="card-header text-center">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($user['posts'] as $post)

                        @component('components/postComponent' ,
                             [
                             'post_id' => $post['post_id'],
                              'user' => $post['user']["name"] ,
                              'created_at' => $post['post_created_at'],
                              'content' => $post['post_content'],
                              'comments' => $post['comments'],
                              'id' => $post['user']['id'],
                              'likes' => $post['likes'],
                             ])
                           
                       @endcomponent

                      
                    @endforeach
                </div>
            </div>
        </div>
        <!-- end posts card -->
        <div class="col-md-2 mt-4">
          <div class="card mt-4" style="width: 18rem; overflow: scroll; height: 400px">
            <div class="card-header">
               Friend Requests
             </div>
             <ul class="list-group list-group-flush">
              @foreach($user['requests'] as $request)
               <li class="list-group-item">
                {{$request['from_name']}}
                <div class="btn-group float-right" role="group" aria-label="Basic example">
                   <button type="button" class="btn btn-success">A</button>
                   <form method="post" action="{{ route('deleteRequest' , [$request['id']]) }}">
                    @csrf
                      <button type="submit" class="btn btn-danger">A</button>
                   </form>
                  

                 </div>
               </li>
               @endforeach
             </ul>
          </div>
        </div>
    </div>
</div>
@endsection
