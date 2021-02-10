<div class="card text-center mt-4">
    <div class="card-header">
             <small>
                Posted {{$created_at}} BY {{$user}}
             </small> 
             @if($id == Auth::user()->id)
               <button class="btn btn-success float-right">Edit</button>
            @endif
     </div>
     
     <div class="card-body">
       <h5 class="card-title">{{$content}}</h5>
                             
       
     </div>
     <div class="card-footer text-muted">
              <form method="post" action="{{route('likeUnlike' , [$post_id] ) }}">
                @csrf
                 <button class="btn float-left">
                     @if($likes->contains('user_id', Auth()->user()->id))
                       <i style="color: red"class="fa fa-heart"></i>
                     @else 
                        <i class= "fa fa-heart-o"></i> 
                     @endif
                  
                 </button>
               </form>
              <button class="btn btn-primary float-right" disabled>
                <!-- <i class= "fa fa-heart-o"></i>  -->
                <i style="color: red"class="fa fa-heart"></i>
                  <small>{{count($likes)}}</small>
              </button>
  
              <br>
              <br>
              @foreach($comments as $comment)
                  <small 
                  style="
                      background-color: white ; 
                      color: grey ; 
                      display: block;
                      padding: 2px;
                  ">
                    {{$comment['comment']}} 
                     <small class="float-right">
                       BY {{$comment['user_name']}}
                     </small>
                  </small>
                  
                 <br>
              @endforeach

              <!-- add comment -->
                <form method="post" action="{{route('addComment')}}">
                  @csrf
                  <div class="input-group mb-3">
                    <input type="hidden" name="post_id" value="{{$post_id}}">
                    <input type="text" class="form-control text-center" placeholder="add comment" name="comment">

                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="submit">Comment</button>
                    </div>
                  </div>
                </form>
              <!-- end add comment -->

             

     </div>
</div>
