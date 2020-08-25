<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobsController extends Controller
{
    public function jobs()
    {
        $data = Http::get('https://remotive.io/api/remote-jobs?limit=5')->json();
        return view('mentee/jobs', ['data' => $data]);
    }
}
