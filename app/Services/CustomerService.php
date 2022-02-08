<?php

namespace App\Services;

use Illuminate\Support\Collection;
use App\Services\Country\CountryFactory;
use App\Repositories\Customers\CustomerRepositoryInterface as CustomerInterface;

class CustomerService
{
    protected $customerRepository;
    protected $countryFactory;

    public function __construct(CustomerInterface $customerRepository, CountryFactory $countryFactory)
    {
        $this->customerRepository = $customerRepository;
        $this->countryFactory     = $countryFactory;
    }

    /**
     * set country and state attributes
     *
     * @param $customer
     *
     * @return void
     */
    public function setCountryAndStateAttributes($customer):void
    {
        $countryObject      = $this->countryFactory->createFromPhoneNum($customer->phone);
        if ($countryObject) {
            $customer->country  = $countryObject->getName();
            $customer->state    = $countryObject->getState();
        }
    }

    /**
     * set state attribute
     *
     * @param $customer
     *
     * @return void
     */
    public function setStateAttribute($customer):void
    {
        $countryObject      = $this->countryFactory->createFromCountryName($customer->country, $customer->phone);
        $customer->state    = $countryObject->getState();
    }

    /**
     * set country properties for given customer
     *
     * @param $customer
     *
     * @return void
     */
    public function setCountryAttributes($customer):void
    {
        filled($customer->country) ? $this->setStateAttribute($customer) : $this->setCountryAndStateAttributes($customer);
    }
    
    /**
     * get all customers with country attrbuties
     * filtered by country or state if provided
     *
     * @param null|string $country
     * @param null|bool $state
     *
     * @return Collection
     */
    public function index(?string $country, ?bool $state):Collection
    {
        $response  = collect();
        $customers = $this->customerRepository->index($country);

        foreach ($customers as $customer) {
            $customer->country  = $country ?? null;
            $this->setCountryAttributes($customer);
            if (filled($state) && $customer->state != $state) {
                continue;
            }
            $response[] = $customer;
        }

        return $response;
    }
}
