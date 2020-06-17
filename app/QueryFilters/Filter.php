<?php

namespace App\QueryFilters;

use Closure;
use Illuminate\Support\Str;

abstract class Filter 
{
	public function handle($request, Closure $next)
	{
		//CHECK IF REQUEST DOESN'T HAVE QUERY STRING 
		if(! request()->has($this->filterName()))
		{
			//RETURN NEXT REQUESTS
			return $next($request);
		}

		// CREATE A BUILDER OR QUERY BUILDER
		$builder = $next($request);

		return $this->applyFilter($builder);
	}

	// ABSTRACT FUNCTION FOR QUERY BUILDER
	// TO BE CALLED IN CLASSES WHO EXTEDS THIS ABSTRACT CLASS
	protected abstract function applyFilter($builder);

	//FILTER NAME OF EACH CLASS BASENAME TO BE USED IN CHECK IN THE HANDLE
	protected function filterName()
	{
		return Str::snake(class_basename($this));
	}
}