<?php

namespace Tests\Feautre\Service;

use App\Services\Contracts\ImportContract;
use App\Services\DataImportService;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Tests\Traits\DoctrineDatabaseMigrations;

class DataImportServiceTest extends TestCase
{
    use DoctrineDatabaseMigrations;

    protected ImportContract $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app->bind(ImportContract::class, function () {
            return new DataImportService('not a real url');
        });

        $this->service = app(ImportContract::class);
    }

    /** @test */
    public function should_be_able_to_create_customer_from_api()
    {
        $response = [
            'login' => [
                'username' => 'test'
            ],
            'name' => [
                'first' => 'first',
                'last' => 'last'
            ],
            'email' => 'email@test.com',
            'location' => [
                'country' => 'Australia',
                'city' => 'test city'
            ],
            'gender' => 'm',
            'phone' => '123456789'
        ];

        Http::fake(fn () => Http::response(['results' => [$response]], 200));

        $this->service->importFromApi();

        $this->assertDatabaseHas('customers', ['id' => 1, 'username' => 'test']);
    }

    /** @test */
    public function should_not_be_able_to_create_customer_from_api_when_data_is_bad()
    {
        $response = [
            'invalid data'
        ];

        Http::fake(fn () => Http::response(['results' => [$response]], 200));

        $this->app->bind(ImportContract::class, function () {
            return new DataImportService('not a real url');
        });

        $this->expectException(NotNullConstraintViolationException::class);

        $this->service->importFromApi();

        $this->assertDatabaseEmpty('customers');
    }
}