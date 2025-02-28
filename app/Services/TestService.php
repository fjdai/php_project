<?php

namespace App\Services;

// use app\Repositories\TestRepository;
use Illuminate\Database\Eloquent\Collection;
use app\Models\Test;

class TestService
{
    // protected TestRepository $testRepository;

    public function __construct()
    {
        // $this->testRepository = $testRepository;
    
    }

    public function getAllTests(): array
    {
        $data[] = [
            'name' => 'Phan Gia Đại',
            'age' => 20,
            'address' => 'Hà Nội',
        ];
        return $data;
    }

    public function createTest(array $data): Test
    {
        return $this->testRepository->create($data);
    }
}
?>