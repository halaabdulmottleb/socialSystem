@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
         <div class="col-md-10 mt-4">
            <!-- addPost -->
            @component('components/addPostComponent')      
            @endcomponent
            <!-- end add post -->
        </div>
        
        <div class="col-md-10 mt-4">
            <div class="card">
                <div class="card-header text-center">Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)

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
    </div>
</div>
@endsection
