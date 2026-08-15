<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        if(!$user->is_approved) {
            return redirect()->route('pending-approval');
        }

        $inquiries = Inquiry::with('car')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $totalInquiries = $inquiries->count();

        return view('dashboard', compact('inquiries', 'totalInquiries'));
    }
}
