<?php


namespace App\QueryFilters;

class Active extends Filter
{
	//REFACTORED FROM ABSTRACT CLASS FILTER
	protected function applyFilter($builder)
	{
		//ACTUAL QUERY FOR THIS CLASS
		return $builder->where($this->filterName(), request($this->filterName()));
	}

}