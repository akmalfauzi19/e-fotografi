<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendMailFailed;

class TransactionController extends Controller
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
        $items = Transaction::orderBy('id', 'DESC')->get();

        return view('admin.pages.transactions.index')
            ->with([
                'items' => $items
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Transaction::findOrFail($id);

        return view('admin.pages.transactions.show')->with([
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
        $items = Transaction::with('user', 'details', 'details.user')->findOrFail($id);
        return view('admin.pages.transactions.edit')->with([
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
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required|max:255',
            'date' => 'required|date|unique:transactions',
            'number' => 'required',
            'transaction_price' => 'required|integer'
        ]);

        $data = $request->all();

        $items = Transaction::findOrFail($id);
        $items->update($data);

        return redirect()->route('transactions.index')->with('info', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = Transaction::findOrFail($id);
        $items->delete();
        TransactionDetail::where('transaction_id', $id)->delete();

        return redirect()->route('transactions.index')->with('success', 'Hapus Data Transaksi Berhasil');
    }

    public function setStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:PENDING,SUCCESS,FAILED'
        ]);

        $items = Transaction::findOrFail($id);
        $items->transaction_status = $request->status;

        if ($request->status == 'SUCCESS')
            Mail::to($items->email)->send(new SendMail($items));
        else if ($request->status == 'FAILED')
            Mail::to($items->email)->send(new SendMailFailed($items));

        $items->save();
        return redirect()->route('transactions.index')->with('success', 'status berhasil diubah');
    }

    public function print_pdf()
    {
        $items = Transaction::all();

        $pdf = PDF::loadview('admin.pages.print.report-transactions', ['items' => $items]);
        return $pdf->download('laporan-transaksi.pdf');
    }

    public function generateInvoice($id)
    {
        //GET DATA BERDASARKAN ID
        $items = Transaction::with('user', 'details', 'details.user')->findOrFail($id);
        // $pdf = PDF::loadView('admin.pages.print.nota', compact('items'))->setPaper('a4', 'landscape');

        // $pdf = PDF::loadview('admin.pages.print.nota1', ['items' => $items]);
        // return $pdf->download('invoice.pdf');
        return view('admin.pages.print.nota1')->with([
            'items' => $items
        ]);
    }

    public function deleteconfirmation($id)
    {
        $items = Transaction::findOrFail($id);

        return view('admin.pages.transactions.showdelete')->with([
            'item' => $items

        ]);
    }
}
