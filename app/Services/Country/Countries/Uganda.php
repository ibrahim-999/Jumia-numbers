<?php

namespace App\Services\Country\Countries;

use App\Services\Country\Country;

class Uganda extends Country
{
    protected $name = "Uganda";
    protected $code = "256";
    protected $regex = "/\(256\)\ ?\d{9}$/";
    protected $customerPhoneNum;

    public function __construct(String $customerPhoneNum)
    {
        $this->customerPhoneNum = $customerPhoneNum;
    }
}
