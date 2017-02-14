<?php

namespace App\Http\Controllers;

use App\Events\NewRegisteredUserEvents;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerUser()
    {
        event(new NewRegisteredUserEvents());
    }
}
