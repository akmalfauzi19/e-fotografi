<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;


class ProductGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $number = 1;
        $items = ProductGallery::with('product')->get();
        return view('admin.pages.product-galleries.index')->with([
            'items' => $items,
            'number' => $number
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.pages.product-galleries.create')->with([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $request->file('photo')->store(
            'assets/product',
            'public'
        );
        toastr()->success('Menambahkan Gambar Berhasil');
        ProductGallery::create($data);
        return redirect()->route('product-galleries.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ProductGallery::with('product')->findOrFail($id);

        return view('admin.pages.product-galleries.showdelete')->with([
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        toastr()->info('Delete images successfully');
        $items = ProductGallery::findOrFail($id);
        $items->delete();
        return redirect()->route('product-galleries.index')->with('success', 'Hapus Data Berhasil');
    }

    public function restored(Request $request)
    {
        $number = 1;

        $items = ProductGallery::onlyTrashed()->orderBy('id', 'DESC')->take(8)->get();

        return view('admin.pages.product-galleries.restored')->with([
            'items' => $items,
            'number' => $number
        ]);
    }

    public function setRestored(Request $request, $id)
    {
        ProductGallery::withTrashed()->find($id)->restore();

        toastr()->success('Pengembalian data sukses');
        return redirect()->route('product-galleries.restored');
    }
}
