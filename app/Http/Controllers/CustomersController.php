<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use App\Http\Requests\FilterCustomer;

class CustomersController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * get all customers with country attrbuties
     *
     * @param FilterCustomer $request
     *
     * @return json
     */
    public function index(FilterCustomer $request)
    {
        $customers = $this->customerService->index($request->country, $request->state);
        
        return response()->json($customers);
    }
}
