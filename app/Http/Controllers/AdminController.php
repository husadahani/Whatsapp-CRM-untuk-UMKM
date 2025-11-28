<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function subscriptions()
    {
        return view('admin.subscriptions');
    }

    public function plans()
    {
        return view('admin.plans');
    }

    public function transactions()
    {
        return view('admin.transactions');
    }

    public function devices()
    {
        return view('admin.devices');
    }

    public function messages()
    {
        return view('admin.messages');
    }

    public function broadcasts()
    {
        return view('admin.broadcasts');
    }

    public function servers()
    {
        return view('admin.servers');
    }

    public function apiLogs()
    {
        return view('admin.api-logs');
    }

    public function reports()
    {
        return view('admin.reports');
    }

    public function settings()
    {
        return view('admin.settings');
    }
}

