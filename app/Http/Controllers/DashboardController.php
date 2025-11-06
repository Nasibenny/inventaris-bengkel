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
        $totalstok = SparePart::sum('stok') ?? 0;
        $lowstok = SparePart::where('stok', '<', 5)->count();
        // $notifcount = Notification::count();

        // return view('dashboard.index', compact('spareparts', 'totalStock', 'lowStock', 'notifCount'));

        return view('dashboard.index', compact('spareparts', 'totalstok', 'lowstok'));
    }

    public function spareparts()
    {
        $spareparts = SparePart::all();
        return view('dashboard.spareparts', compact('spareparts'));
    }

    public function notifications()
    {
        // $notifications = Notification::all();
        $notifications = [];
        return view('dashboard.notifications', compact('notifications'));
    }
}
