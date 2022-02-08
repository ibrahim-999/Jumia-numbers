<?php

class CustomersControllerTest extends TestCase
{
    /*
    * Testing database 41 customers belongs to 5 countries
    * 10 users in Cameroon   (7 valid and 3 invalid )
    * 9 users in Ethiopia    (7 valid and 2 invalid )
    * 7 users in Morocco     (4 valid and 3 invalid )
    * 8 users in Mozambique  (6 valid and 2 invalid )
    * 7 users in Uganda      (3 valid and 4 invalid )
    */

    public $countriesCounts = [ "Cameroon" => 10, "Ethiopia" => 9, "Morocco" => 7, "Mozambique" => 8, "Uganda" => 7];
    public $countriesValidCounts = [ "Cameroon"   => 7, "Ethiopia"   => 7, "Morocco"    => 4, "Mozambique" => 6, "Uganda"     => 3];
    public $countriesinValidCounts = [ "Cameroon"   => 3, "Ethiopia"   => 2, "Morocco"    => 3, "Mozambique" => 2, "Uganda"     => 4];

    public function test_customersControllerTest_index()
    {
        $this->json('get', '/api/customers/')
            ->seeJsonStructure([
                [
                    'id',
                    'name',
                    'phone',
                    'country',
                    'state',
                ]
            ])->assertJsonCount(41)
            ->assertResponseOk();
    }

    
    public function test_customersControllerTest_index_filter_by_state()
    {
        $validTotalCount = array_sum(array_values($this->countriesValidCounts));
        $invalidTotalCount = array_sum(array_values($this->countriesinValidCounts));

        //valid
        $this->json('get', "/api/customers/?state=1")
            ->assertJsonCount($validTotalCount)
            ->assertResponseOk();
        
        //invalid
        $this->json('get', "/api/customers/?state=0")
            ->assertJsonCount($invalidTotalCount)
            ->assertResponseOk();
    }

    public function test_customersControllerTest_index_filter_by_country()
    {
        foreach ($this->countriesCounts as $countryName => $customersCount) {
            $this->json('get', "/api/customers/?country={$countryName}")
            ->seeJsonStructure([
                [
                    'id',
                    'name',
                    'phone',
                    'country',
                    'state',
                ]
            ])->assertJsonCount($customersCount)
            ->assertResponseOk();
        }
    }

    public function test_customersControllerTest_index_filter_by_country_and_valid_state()
    {
        foreach ($this->countriesValidCounts as $countryName => $customersCount) {
            $this->json('get', "/api/customers/?country={$countryName}&state=1")
            ->seeJsonStructure([
                [
                    'id',
                    'name',
                    'phone',
                    'country',
                    'state',
                ]
            ])->assertJsonCount($customersCount)
            ->assertResponseOk();
        }
    }

    public function test_customersControllerTest_index_filter_by_country_and_invalid_state()
    {
        foreach ($this->countriesinValidCounts as $countryName => $customersCount) {
            $this->json('get', "/api/customers/?country={$countryName}&state=0")
            ->seeJsonStructure([
                [
                    'id',
                    'name',
                    'phone',
                    'country',
                    'state',
                ]
            ])->assertJsonCount($customersCount)
            ->assertResponseOk();
        }
    }
}
