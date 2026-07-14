<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\HasMathCaptcha;

class CaptchaController extends Controller{
          use HasMathCaptcha;

        public function refresh()
        {
         $captcha = $this->generateCaptcha();
 
           return response()->json($captcha);
       }
}