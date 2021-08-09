<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Struk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;

class StrukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir.struk.index', [
            'struk' => Struk::orderBy('created_at', 'desc')->paginate(5), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.struk.create', [
            'barang' => Barang::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'list_barang' => 'required', 
        ]);
        if($validator->fails()){
            return back()->withInput()->withErrors($validator);
        }
        $struk = Struk::create([
            'user_id' => Auth::user()->id,
            'uang' => $request->uang,
        ]);
        $struk->barang()->attach($request->list_barang);
        return back()->with('success', 'Success ! Pemebelian telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('kasir.struk.show', [
            'struk' => Struk::findOrFail($id),
        ]);
    }

    public function cetak($id)
    {
        $struk = Struk::findOrFail($id);
 
    	$pdf = PDF::loadview('kasir.struk.pdf',[
            'struk' => $struk,
        ]);
    	return $pdf->download('struk-'.$struk->created_at.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function edit(Struk $struk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struk $struk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struk  $struk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $struk = Struk::findOrFail($id);
        $struk->delete();
        return back()->with('failed', 'Pembayaran telah dihapus');
    }
}
