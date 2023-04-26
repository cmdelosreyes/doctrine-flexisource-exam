<?php

namespace App\Services;

use App\Entities\Customer;
use App\Services\Contracts\ImportContract;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use LaravelDoctrine\ORM\Facades\EntityManager;

class DataImportService implements ImportContract
{
    public function __construct(protected string $baseUrl, protected array $query = ['nat' => 'au', 'results' => 100]) {}

    public function importFromAPI(): void
    {
        $response = Http::get($this->baseUrl, $this->query);

        abort_unless(
            $response->successful(),
            Response::HTTP_INTERNAL_SERVER_ERROR,
            'Something went wrong when importing data'
        );

        $response->collect('results')->each(function ($data) {
            $customer = new Customer(
                username: Arr::get($data, 'login.username'),
                firstname: Arr::get($data, 'name.first'),
                lastname: Arr::get($data, 'name.last'),
                email: Arr::get($data, 'email'),
                country: Arr::get($data, 'location.country'),
                gender: Arr::get($data, 'gender'),
                city: Arr::get($data, 'location.city'),
                phoneNumber: Arr::get($data, 'phone')
            );

            EntityManager::persist($customer);
        });

        EntityManager::flush();
    }
}