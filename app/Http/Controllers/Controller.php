<?php

namespace App\Http\Controllers;

use Doctrine\Persistence\ObjectRepository;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use LaravelDoctrine\ORM\Facades\EntityManager;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected ObjectRepository $repository;

    protected string $resource;

    public function __construct()
    {
        $this->repository = EntityManager::getRepository($this->resource);
    }
}
