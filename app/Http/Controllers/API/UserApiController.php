<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class UserApiController extends Controller
{
    /**
     * @var User
     */
    private $post;
    /**
     * UserApiController constructor.
     * @param User $user
     */
    public function __construct(Post $post)
    {
    	$this->post = $post;
    }
    /**
     * return paginated records of users
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
    	$search = $request->search;
    	$posts = Post::where('title', 'LIKE', '%'.$search.'%')->paginate(5);
    	//$posts = $this->post->paginate(5);        
    	//$posts = Post::latest()->paginate(5); //paginate(5);
        //$page = Request::get('page');
        //$page = Input::Request('page');
        //if(!$page) $page = 0;
		//$posts = Post::with('id')->getByPage(0, 5);
    	//dd(\Request::get('page'));
        /*$response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];*/


        //return response()->json($response);
    	//return response()->json($posts);
    	return response()->json($posts);
    }
}
