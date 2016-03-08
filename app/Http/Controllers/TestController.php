<?php

namespace App\Http\Controllers;

use App\Libraries\Constants\Err;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function errorTest() {
        $this->validateErrorTest();
    }

    public function validateErrorTest() {
        $result = Validator::make($this->request->all(), [
            'errorCode' => 'required|integer|size:6',
            'errorMessage' => 'required|string',
        ]);
        if ($result->fails()) {
            xabort(200, Err::REQUEST_PARAMS_ERROR, $result->messages());
        }
    }
}