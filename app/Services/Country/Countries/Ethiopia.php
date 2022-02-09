<?php

namespace App\Services\Country\Countries;

use App\Services\Country\Country;

class Ethiopia extends Country
{
    protected $name = "Ethiopia";
    protected $code = "251";
    protected $regex = "/\(251\)\ ?[1-59]\d{8}$/";
    protected $customerPhoneNum;

    public function __construct(String $customerPhoneNum)
    {
        $this->customerPhoneNum = $customerPhoneNum;
    }

}
