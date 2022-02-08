<?php

namespace App\Models;

use App\Services\Country\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    protected $table = "customer";

    
    /***************** scopes ******************** */

    /**
     * Scope a query to get customers by specific country.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCountry($query, ?string $country):Builder
    {
        $code = array_search($country, Country::Countries);

        return filled($country) ? $query->where('phone', 'LIKE', '(' . $code. ')%') : $query;
    }
}
