<?php

namespace App\Repositories;

use App\Models\Test;
use Illuminate\Database\Eloquent\Collection;

class TestRepository
{
    public function getAll(): Collection
    {
        return Test::all();
    }

    public function create(array $data): Test
    {
        return Test::create($data);
    }
}