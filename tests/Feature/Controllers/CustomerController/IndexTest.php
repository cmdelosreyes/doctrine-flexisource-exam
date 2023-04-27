<?php

namespace Tests\Feature\Controllers\CustomerController;

use App\Entities\Customer;
use Tests\TestCase;
use Tests\Traits\DoctrineDatabaseMigrations;

class IndexTest extends TestCase
{
    use DoctrineDatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        entity(Customer::class, 100)->create();
    }

    /** @test */
    public function should_be_able_to_list_all_customers()
    {
        $this->getJson('api/customers')
            ->assertJsonCount(100, 'data')
            ->assertOk();
    }

    /** @test */
    public function should_have_correct_resource_mapping_when_listing_customers()
    {
        $this->getJson('api/customers')
            ->assertJsonStructure([
                'data' => [
                    [
                        'fullname',
                        'email',
                        'country'
                    ]
                ]
            ])
            ->assertOk();
    }
}