 <div class="card ">
                
     <div class="card-body">
        <form method="post" action="{{route('addPost')}}">
          @csrf
          <input class="form-control text-center" type="text" placeholder="POST CONTENT"
                       onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'POST CONTENT'"
                       name="postContent" 
            > 
     </div>
     <div class="card-footer text-muted">
         <button class="btn btn-primary float-right" type="submit">Post</button>
    </div>
    </form>
</div>