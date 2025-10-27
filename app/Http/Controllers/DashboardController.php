<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SparePart;
use App\Models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        $spareparts = SparePart::all();
        $totalStock = SparePart::sum('quantity');
        $lowStock = SparePart::where('quantity', '<', 5)->count();
        $notifCount = Notification::count();

        return view('dashboard.index', compact('spareparts', 'totalStock', 'lowStock', 'notifCount'));
    }

    public function spareparts()
    {
        $spareparts = SparePart::all();
        return view('dashboard.spareparts', compact('spareparts'));
    }

    public function notifications()
    {
        $notifications = Notification::all();
        return view('dashboard.notifications', compact('notifications'));
    }
}
