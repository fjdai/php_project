<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TestService;
use App\Traits\ApiResponse; 

class TestController extends Controller
{
    use ApiResponse; 

    protected TestService $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function index()
    {
        $data = $this->testService->getAllTests();
        return $this->success($data); 
    }
}
