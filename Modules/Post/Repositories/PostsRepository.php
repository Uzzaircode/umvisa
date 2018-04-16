<?php

namespace Modules\Post\Repositories;

use Modules\Post\Entities\Post;

class PostsRepository
{

    public function all()
    {
        return Post::orderby('id', 'desc')->paginate(5);
    }

    public function create($request){
        $post = $request->all();
        $post->save();
    }
}
