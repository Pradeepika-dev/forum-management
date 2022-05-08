<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*When admin logs to the system, all posts will be displayed,
            and when user logs to the system, approved posts only will be visible.
        */
        try{
            if($request->roleId == 1){
                $posts = Post::where(['deleted_at' => NULL])->get();
            }else{
                $posts = Post::where([
                    'user_id' => $request->userId,
                    'status_id' => 2,
                    'deleted_at' => NULL
                ])->get();
            }
            return response()->json([
                'status'=> 200,
                'posts'=>$posts,
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error'
            ]);
        }
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate before save to database
       $validator = Validator::make($request->all(),[
            'title'=>'required|max:191',
            'body'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['validation_errors' => $validator->errors()]);
        }

        //If validation is success, create the post
        try{
            $input = $request->all();
            $post = Post::create($input);

            return response()->json([
                'status' => 200,
                'message' => 'Post has been created successfully'
            ]);

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error'
            ]);
        }

    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            if($post)
            {
                $post->delete();
                return response()->json([
                    'status'=> 200,
                    'message'=>'Post Deleted Successfully',
                ]);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error'
            ]);
        }
    }

    /**
     * Approve the specified post from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function approvePost($id)
    {
        $post = Post::find($id);

            try {
                if($post) {
                    Post::where('id', $id)->update(['status_id' => 2]);
                    return response()->json([
                        'status' => 200,
                        'message' => 'Post approved successfully',
                    ]);
                }
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json([
                    'message' => 'Error'
                ]);
            }
    }

    /**
     * Reject the specified post from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function rejectPost($id)
    {
        $post = Post::find($id);

        try {
            if($post) {
                Post::where('id', $id)->update(['status_id' => 3]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Post rejected successfully',
                ]);
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Error'
            ]);
        }

    }

}
