<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Str;

class ProductController extends Controller
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
    public function index(Request $request)
    {
        $number = 1;

        $items = Product::all();
        return view('admin.pages.product.index')->with([
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
        //
        return view('admin.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        toastr()->success('add photo type data successfully');
        Product::create($data);
        return redirect()->route('products.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Product::findorFail($id);

        return view('admin.pages.product.showdelete')->with([
            'item' => $items
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
        $items = Product::findOrfail($id);

        return view('admin.pages.product.edit')->with([
            'item' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        toastr()->info('Mengubah data dengan sukses');
        $items = Product::findOrFail($id);
        $items->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Product::findOrFail($id);
        $items->delete();
        ProductGallery::where('products_id', $id)->delete();
        toastr()->info('Menghapus data sukses');
        return redirect()->route('products.index');
    }

    public function gallery(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $items = ProductGallery::with('product')
            ->where('products_id', $id)->get();

        return view('admin.pages.product.gallery')
            ->with([
                'product' => $products,
                'items' => $items
            ]);
    }

    public function restored(Request $request)
    {
        $number = 1;

        $items = Product::onlyTrashed()->orderBy('id', 'DESC')->take(8)->get();

        return view('admin.pages.product.restored')->with([
            'items' => $items,
            'number' => $number
        ]);
    }

    public function setRestored(Request $request, $id)
    {

        Product::withTrashed()->find($id)->restore();

        toastr()->success('Pengembalian data sukses');
        return redirect()->route('products.restored');
    }
}
