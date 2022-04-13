<?php

namespace App\Http\Controllers;

use App\GuestBook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $todays_guest = GuestBook::whereDate('created_at', Carbon::today())->count();
        return view('dashboard.index', compact(
            'title',
            'todays_guest'
        ));
    }
}
