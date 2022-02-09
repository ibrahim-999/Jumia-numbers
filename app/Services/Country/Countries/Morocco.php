<?php

namespace App\Services\Country\Countries;

use App\Services\Country\Country;

class Morocco extends Country
{
    protected $name = "Morocco";
    protected $code = "212";
    protected $regex = "/\(212\)\ ?[5-9]\d{8}$/";
    protected $customerPhoneNum;

    public function __construct(String $customerPhoneNum)
    {
        $this->customerPhoneNum = $customerPhoneNum;
    }
}
