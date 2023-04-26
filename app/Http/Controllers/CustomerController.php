<?php

namespace App\Http\Controllers;

use App\Entities\Customer;
use App\Http\Resources\Customer\AllCustomer;
use App\Http\Resources\Customer\ShowCustomer;

class CustomerController extends Controller
{
    public function __construct() { 
        $this->resource = Customer::class;

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AllCustomer::collection($this->repository->findAll());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return ShowCustomer::make($this->repository->find($id));
    }
}
