<?php 


namespace App\QueryFilters;

class Sort extends Filter
{
	// REFACTORED FROM ABSTRACT CLASS FILTER
	protected function applyFilter($builder)
	{
		// ACTUAL QUERY FOR THIS CLASS
		return $builder->orderBy('title', request($this->filterName()));
	}
}