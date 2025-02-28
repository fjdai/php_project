<?php

namespace App\Traits;

trait ApiResponse
{
    protected function success($data, $message = 'Success', $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'author' => 'Phan Gia Đại'
        ], $status);
    }

    protected function error($message, $status = 400)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'author' => 'Phan Gia Đại'
        ], $status);
    }
}