<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\User;

class DashboardController extends Controller
{


    public function index()
    {
        $items = ProductGallery::with('product')->where('is_default', 1)->paginate(9);
        $menu = ProductGallery::with('product')->get();
        $user = User::inRandomOrder()->limit(5)->get();
        $slider = ProductGallery::with('product')->where('is_default', 1)->inRandomOrder()->limit(5)->get();
        return view('user.pages.dashboard')->with([
            'items' => $items,
            'menu'  => $menu,
            'user' => $user,
            'slider' => $slider
        ]);
    }

    public function detail($id)
    {
        // $items = ProductGallery::with('product')->where('slug', $slug);
        $products = Product::findOrFail($id);
        $items = ProductGallery::with('product')->where('products_id', $id)->limit(5)->get();
        $menu = ProductGallery::with('product')->get();
        $transaction = Transaction::where('product_id', $id)->limit(5)->get();
        $rekomendasi = ProductGallery::with('product')->where('is_default', 1)->inRandomOrder()->limit(4)->get();

        return view('user.pages.product.details')->with([
            'items' => $items,
            'product' => $products,
            'menu' => $menu,
            'rekomendasi' => $rekomendasi,
            'transaction' => $transaction
        ]);
    }

    public function contact()
    {
        $menu = ProductGallery::with('product')->get();
        return view('user.layouts.menu.contact')->with([
            'menu' => $menu
        ]);
    }

    public function portofolio()
    {
        $menu = ProductGallery::with('product')->get();
        $items = ProductGallery::all();
        return view('user.layouts.menu.portofolio')->with([
            'items' => $items,
            'menu' => $menu
        ]);
    }

    public function cekStatus()
    {
        $menu = ProductGallery::with('product')->get();
        $items = Transaction::all();

        return view('user.pages.transactions.cekstatus')
            ->with([
                'items' => $items,
                'menu' => $menu
            ]);
    }

    public function Search(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        $menu = ProductGallery::with('product')->where('is_default', 1)->get();
        $items = ProductGallery::whereHas('product', function ($query) use ($cari) {
            $query->where('name', 'like', '%' . $cari . '%')
                ->orWhere('type', 'like', '%' . $cari . '%');
        })->with(['product' => function ($query) use ($cari) {
            $query->where('name', 'like', '%' . $cari . '%')
                ->orWhere('type', 'like', '%' . $cari . '%');
        }])->get();

        // mengirim data pegawai ke view index
        return view('user.pages.dashboard-search')->with([
            'items' => $items,
            'menu' => $menu
        ]);
    }

    public function booking($id)
    {
        $menu = ProductGallery::with('product')->get();
        $items = Product::findOrFail($id);
        return view('user.pages.transactions.booking')->with([
            'items' => $items,
            'menu' => $menu
        ]);
    }
}
