<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;
use App\Repositories\postRepository;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(postRepository $postRepository) 
    {
        $this->postRepository = $postRepository;

    }
    
    public function index()
    {
        $posts =  $this->postRepository->all();
       
        return view('home')->with('posts' ,$posts );
    }

    public function show($customerId)
        {
            $post = $this->postRepository->findById($customerId);
            return $post;
        }
   
    public function create (Request $Request)
    {
        $this->postRepository->addPost($Request);
        return redirect()->back();

    }

}
