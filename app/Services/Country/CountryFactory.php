<?php

namespace App\Services\Country;

use App\Services\Country\Country;

class CountryFactory
{
    /**
     * retrun the country code form phone number
     *
     * @param String $phoneNum
     *
     * @return null|string
     */
    public function getCountryCode(String $phoneNum):?string
    {
        $countryCode = data_get(\explode(' ', $phoneNum), 0);
        return trim($countryCode, '()');
    }

    /**
     * using polymorphism and abstract factory design pattern
     * create an object from country classess
     *
     * @param String $phoneNum
     *
     * @return null|object
     */
    public function createFromPhoneNum(String $phoneNum):?Object
    {
        $countryCode = $this->getCountryCode($phoneNum);
        if (in_array($countryCode, Country::CountryCodes)) {
            $class =  "App\\Services\\Country\\Countries\\" . Country::Countries[$countryCode];
            return new $class($phoneNum);
        }
        return null;
    }

    /**
     * using polymorphism and abstract factory design pattern
     * create an object from country classess
     *
     * @param String $phoneNum
     *
     * @return null|object
     */
    public function createFromCountryName(String $countryName, String $phoneNum):Object
    {
        $class =  "App\\Services\\Country\\Countries\\" . $countryName;
        return new $class($phoneNum);
    }
}
