<?php

namespace App\Repositories\Customers;

use App\Models\Customer;
use Illuminate\Support\Collection;
use App\Repositories\Customers\CustomerRepositoryInterface as CustomerInterface;

class SqliteCustomerRepository implements CustomerInterface
{
    /**
     * get custmers and filter by country if provided
     *
     * @param null|string $country
     *
     * @return Collection
     */
    public function index(?string $country):Collection
    {
        return Customer::country($country)->get();
    }
}
