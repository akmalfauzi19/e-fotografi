<?php

namespace App\Http\Controllers\admin;

use App\User;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
        //jika ingin admin menggunakan verifikasi
    }

    public function index()
    {
        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_price');
        $sales = Transaction::count();
        $user = User::count();
        $items = Transaction::with('details')->orderBy('id', 'DESC')->take(5)->get();
        $number = 1;
        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
        ];

        return view('admin.pages.dashboard')->with([
            'number' => $number++,
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
            'user' => $user
        ]);
    }
}
