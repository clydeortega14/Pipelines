<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Post extends Model
{
    protected $fillable = ['title', 'active'];

    protected static function allPosts()
    {
    	return app(Pipeline::class) //RESOLVE CONTAINER WITH PIPELINE REQUEST
    	 //SEND A QUERY
    	->send(Post::query())
    	// RUN THROUGH THE FOLLOWING ARRAY OF PIPES
    	->through([ 

    		\App\QueryFilters\Active::class,
    		\App\QueryFilters\Sort::class,
    		\App\QueryFilters\MaxCount::class,
    	])
    	//THEN RETURN 
    	->thenReturn()
    	->paginate(5);
    }
}
