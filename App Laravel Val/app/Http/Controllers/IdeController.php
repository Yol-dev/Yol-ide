<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdeController extends Controller
{
    public function index_fileuuid()
    {
        @session_start();
        if (isset($_SESSION['sessionUsername']) && isset($_SESSION['sessionID']))
        {
            $sessionUsername = $_SESSION['sessionUsername'];
            $sessionID = $_SESSION['sessionID'];

            return view('ide', [
                'sessionUsername'=>$sessionUsername,
                'sessionID'=>$sessionID,
            ]);
        }
        else
        {
            redirect()->to('/login')->send();
        }
    }
}
