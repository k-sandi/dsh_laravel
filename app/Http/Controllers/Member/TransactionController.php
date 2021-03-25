<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use App\Buku;
use Auth;
use DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Buku::all();
        return view('member.transaksi.view', compact($book));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $book = Buku::find($id);
        return view('member.transaksi.add', compact($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = Auth::user()->id;
        $trans_code = collect(\DB::select('select get_invoice_no('.$u.') as code'))->first();
        
        $bookData = Buku::find($request->book_id);

        $trs = new Transaction;
        $trs->invoice_no = $trans_code->code;
        $trs->client_id = $u;
        $trs->qty = $request->qty;
        $trs->book_id = $request->book_id;
        $trs->pajak = $request->pajak;
        $trs->created_by = $u;
        $trs->updated_by = $u;
        $trs->save();

        return redirect()->route('member.trs.index');
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
}
