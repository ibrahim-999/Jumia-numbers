<?php

namespace App\Services\Country\Countries;

use App\Services\Country\Country;

class Mozambique extends Country
{
    protected $name = "Mozambique";
    protected $code = "258";
    protected $regex = "/\(258\)\ ?[28]\d{7,8}$/";
    protected $customerPhoneNum;

    public function __construct(String $customerPhoneNum)
    {
        $this->customerPhoneNum = $customerPhoneNum;
    }

}
