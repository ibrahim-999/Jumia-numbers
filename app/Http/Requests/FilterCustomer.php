<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Services\Country\Country;
use Pearl\RequestValidate\RequestAbstract;

class FilterCustomer extends RequestAbstract
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country'  => ["filled", Rule::in(array_values(Country::Countries))],
            'state'    => 'filled|boolean',
        ];
    }
}
