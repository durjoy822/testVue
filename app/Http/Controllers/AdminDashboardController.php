<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{
      public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function users()
    {
        return Inertia::render('Admin/Users/Index');
    }

    public function settings()
    {
        return Inertia::render('Admin/Settings/Index');
    }

    public function userCreate(Request $request) {
        return Inertia::render('Admin/Users/UserCreate');
    }
}
