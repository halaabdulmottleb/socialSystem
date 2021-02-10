@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row  mt-4">
      @foreach($users as $user)
         <div class="col-md-4 mb-4">
            <div class="card">
              <img src="/avatars/3474950.jpg" class="card-img-top" alt="..." >
             <div class="card-body">
               <h5 class="card-title">{{$user['user_name']}}</h5>
                @if($user['requests']->contains('from_id', Auth()->user()->id))
                  <form method="post" action="{{route('unSendRequest' , $user['user_id'])}}">
                   @csrf
                    <button type="submit" class="btn btn-success float-right">UN send</button>
                 </form>
                @else 
                 <form method="post" action="{{route('sendRequest' , $user['user_id'])}}">
                   @csrf
                    <button type="submit" class="btn btn-primary float-right">Add friend</button>
                 </form>
               @endif
             </div>
            </div>
        </div>
      @endforeach
    </div>
</div>
@endsection
