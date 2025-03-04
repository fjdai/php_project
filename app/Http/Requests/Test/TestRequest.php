<?php

namespace app\Http\Requests\Test;
use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    public function rules()
    {
        return [
            "username" => "required|string",
            "password" => "required|string"
        ];
    }
}