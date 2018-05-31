<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Post;
/**
 * Class UserApiController
 * @package App\Http\Controllers\API
 */
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
    public function index()
    {
    	//$posts = Post::latest()->paginate(5); //paginate(5);
        $page = Request::get('page');
        //$posts = $this->post->latest()->paginate($page);
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
    }
}