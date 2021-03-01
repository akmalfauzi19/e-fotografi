<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Http\Requests\TransactionRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\SendMailNotif;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth', 'verified']);
        //jika ingin admin menggunakan verifikasi
    }

    public function index($id)
    {
        $menu = ProductGallery::with('product')->get();
        $items = Product::findOrFail($id);
        return view('user.pages.transactions.booking')->with([
            'items' => $items,
            'menu' => $menu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.pages.transactions.booking');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $data = $request->all();

        $data['date'] = Carbon::parse($request->date)->format('Y-m-d H:i:s');
        $data['photo'] = $request->file('photo')->store(
            'assets/product/bukti',
            'public'
        );

        $transaction = Transaction::create($data);

        Mail::to('aristofotografi7@gmail.com')->send(new SendMailNotif($transaction));

        $data1['transaction_id'] = Str::slug($transaction->id);
        $data1['product_id'] = Str::slug($transaction->product_id);
        $data1['user_id'] = Str::slug($transaction->user_id);
        TransactionDetail::create($data1);
        $email = Auth::user()->email;

        return redirect()->route('user.status.login', $email)
            ->with('success', 'Pesanan berhasil dan Tunggu Notifikasi Email Dari Kami');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    public function cekStatusLogin($email)
    {
        $items = Transaction::where('email', $email)->orderBy('created_at', 'ASC')->get();
        $menu = ProductGallery::with('product')->get();

        return view('user.pages.transactions.cekstatuslogin')
            ->with([
                'items' => $items,
                'menu' => $menu
            ]);
    }
}
