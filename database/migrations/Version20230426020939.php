<?php

declare(strict_types=1);

namespace Database\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use LaravelDoctrine\Migrations\Schema\Table;
 use LaravelDoctrine\Migrations\Schema\Builder;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230426020939 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create Customer Table';
    }

    public function up(Schema $schema): void
    {
        (new Builder($schema))->create('customers', function(Table $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('country');
            $table->string('gender');
            $table->string('city');
            $table->string('phone_number');
        });
    }

    public function down(Schema $schema): void
    {
        (new Builder($schema))->dropIfExists('customers');
    }
}
