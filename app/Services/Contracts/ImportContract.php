<?php

namespace App\Services\Contracts;

interface ImportContract
{
    public function importFromAPI(): void;
}