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
        return redirect()->route('products.index');
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
        toastr()->info('change data successfully');
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
        toastr()->info('Delete data successfully');
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

        $items = Product::onlyTrashed()->take(8)->get();

        return view('admin.pages.product.restored')->with([
            'items' => $items,
            'number' => $number
        ]);
     }

     public function setRestored(Request $request, $id)
     {

        // $items = Product::onlyTrashed()->findOrFail($id)->restore();
        Product::withTrashed()->find($id)->restore();

        toastr()->success('restored data successfully');
        return redirect()->route('products.restored');
     }

    // jika ingin menggunakan ajax live search
    // public function live_search(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $output = '';
    //         $query = $request->get('query');
    //         if ($query != '') {
    //             $data = Product::where('name', 'like', '%' . $query . '%')
    //                 ->orWhere('type', 'like', '%' . $query . '%')
    //                 ->orWhere('price', 'like', '%' . $query . '%')
    //                 ->orderBy('id', 'asc')
    //                 ->get();
    //         } else {
    //             $data = Product::orderBy('id', 'asc')
    //                 ->get();
    //         }
    //         $total_row = $data->count();
    //         if ($total_row > 0) {
    //             $number = 1;
    //             foreach ($data as $item) {
    //                 $output .= '
    //                   <tr >
    //                     <td>' . $number++ . '</td>
    //                     <td>' . $item->name . '</td>
    //                     <td>' . $item->type . '</td>
    //                     <td>Rp. ' . number_format($item->price, 0, ',', '.') . ' </td>
    //                     <td class="text-center">
    //                       <a href="' . route('products.gallery', $item->id) . '"
    //                      class="btn btn-info btn-sm">
    //                      <i class="fa fa-picture-o"></i>
    //                      </a>
    //                      <a href="' . route('products.edit', $item->id) . '"
    //                      class="btn btn-primary btn-sm">
    //                      <i class="fa fa-pencil  "></i>
    //                      </a>
    //                     <a href="#mymodal" data-remote="' . route('products.show', $item->id) . '"
    //                      data-toggle="modal" data-target="#mymodal"
    //                       data-title="DELETE CONFIRMATION!!!" class="btn btn-danger btn-sm">
    //                      <i class="fa fa-trash "></i>
    //                      </a>
    //                     </td>
    //                   </tr>
    //                 ';
    //             }
    //         } else {
    //             $output = '
    //               <tr>
    //                <td colspan="6" class="text-center">
    //                 Data yang dicari tidak ditemukan
    //                </td>
    //               </tr>
    //            ';
    //         }

    //         $data = array(
    //             'table_data'  => $output
    //         );
    //         echo json_encode($data);
    //     }
    // }
}
