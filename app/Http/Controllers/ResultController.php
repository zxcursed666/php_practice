<?php

namespace App\Http\Controllers;

use App\Models\Result;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('user')
            ->latest()
            ->get();

        return view('results', compact('results'));
    }
}