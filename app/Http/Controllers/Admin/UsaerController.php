<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usaer;
use App\Http\Requests\UsaerRequest;

class UsaerController extends Controller
{
    public function index()
    {
        return view('admin.usaers.index');
    }

}
