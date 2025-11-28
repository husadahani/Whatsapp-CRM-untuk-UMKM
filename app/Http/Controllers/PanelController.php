<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function dashboard()
    {
        return view('panel.dashboard');
    }

    public function devices()
    {
        return view('panel.devices');
    }

    public function contacts()
    {
        return view('panel.contacts');
    }

    public function chats()
    {
        return view('panel.chats');
    }

    public function broadcast()
    {
        return view('panel.broadcast');
    }

    public function autoreply()
    {
        return view('panel.autoreply');
    }

    public function settings()
    {
        return view('panel.settings');
    }

    public function api()
    {
        return view('panel.api');
    }
}

