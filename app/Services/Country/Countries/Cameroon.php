<?php

namespace App\Services\Country\Countries;

use App\Services\Country\Country;

class Cameroon extends Country
{
    protected $name = "Cameroon";
    protected $code = "237";
    protected $regex = "/\(237\)\ ?[2368]\d{7,8}$/";
    protected $customerPhoneNum;

    public function __construct(String $customerPhoneNum)
    {
        $this->customerPhoneNum = $customerPhoneNum;
    }
}
