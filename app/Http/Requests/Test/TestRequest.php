<?php

namespace app\Http\Requests\Test;
use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
{
    public function rules()
    {
        return [
            "hello" => "required|string",
            "world" => "required|string"
        ];
    }
}