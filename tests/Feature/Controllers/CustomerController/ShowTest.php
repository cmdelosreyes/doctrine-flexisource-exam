<?php

namespace Tests\Feature\Controllers\CustomerController;

use App\Entities\Customer;
use Tests\TestCase;
use Tests\Traits\DoctrineDatabaseMigrations;

class ShowTest extends TestCase
{
    use DoctrineDatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();

        entity(Customer::class, 100)->create();
    }

    /** @test */
    public function should_be_able_to_find_a_customer()
    {
        $this->getJson('api/customers/1')
            ->assertOk();
    }

    /** @test */
    public function should_have_correct_resource_mapping_when_listing_customers()
    {
        $this->getJson('api/customers/1')
            ->assertJsonStructure([
                'data' => [
                    'fullname',
                    'email',
                    'username',
                    'gender',
                    'country',
                    'city',
                    'phone'
                ]
            ])
            ->assertOk();
    }
}