<?php

namespace App\Services\Country;

class Country
{
    const Countries     = ["237" => "Cameroon", "251" => "Ethiopia", "212" => "Morocco", "258" => "Mozambique", "256" => "Uganda"];
    const CountryCodes  = ["237" , "251" , "212" , "258" , "256" ];

    /**
     * retrun the protected property country name
     *
     * @return String
     */
    public function getName():String
    {
        return $this->name;
    }

    /**
     * retrun the phone num state by applying country regex
     *
     * @return Bool
     */
    public function getState():Bool
    {
        return (bool) preg_match($this->regex, $this->customerPhoneNum, $matches);
    }
}
