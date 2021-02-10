@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    
    <div class="row justify-content-center">
      <!-- user information card -->
        <div class="col-md-2">
          <div class="card">
            <img src="/avatars/{{$user['profile']}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{strtoupper($user['user_name'])}}</h5>
              <p> 
                <i class="fa fa-envelope fa-fw"> </i>
                   | 
                {{$user['user_email']}}
              </p>
               @if($user['user_id'] == Auth::user()->id)
              <form method="post" action="{{route('uploadProfile')}}" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file">
                 <button class="btn btn-primary float-right" type="submit">Profile</button>
              </form>
              @endif
             
            </div>
          </div>
        </div>
        <!-- end user information card -->
        <!-- posts card -->
        <div class="col-md-6 mt-4">
          @if($user['user_id'] == Auth::user()->id)
          <!-- addPost -->
            @component('components/addPostComponent' )      
            @endcomponent
            <!-- end add post -->
          @endif

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
          @if($user['user_id'] == Auth::user()->id)
        <!-- friend reuests -->
        <div class="col-md-2 mt-4">
          <div class="row">
             <div class="card mt-4" style="width: 18rem; overflow: scroll; height: 400px">
               <div class="card-header">
                  Friend Requests
                </div>
                <ul class="list-group list-group-flush">
                 @foreach($user['requests'] as $request)
                  <li class="list-group-item">
                   {{$request['from_name']}}
                   <div class="btn-group float-right" role="group" aria-label="Basic example">
                     <!-- accept -->
                      <form method="post" action="{{route('acceptRequest' , [$request['id']  , $request['from_id']])}}">
                       @csrf
                         <button type="submit" class="btn btn-success">A</button>
                      </form>
                      <!-- ignore -->
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
          <div class="row">
                    <!-- friend reuests -->
               <div class="col-md-2 mt-4">
                 <div class="card mt-4" style="width: 18rem; overflow: scroll; height: 400px">
                   <div class="card-header">
                     Friends
                    </div>
                    <ul class="list-group list-group-flush">
                      @foreach($user['friendsOne'] as $friend)
                         <li class="list-group-item">{{$friend['user_two_name']}}</li>
                      @endforeach 
                      @foreach($user['friendsTwo'] as $friend)
                        <li class="list-group-item">{{$friend['user_two_name']}}</li>
                      @endforeach
                    </ul>
                 </div>
               </div>
               <!-- endfriendRequest -->
          </div>
         <div>

        </div>

        <!-- endfriendRequest -->
       
        
    </div>
    @endif
</div>
@endsection
