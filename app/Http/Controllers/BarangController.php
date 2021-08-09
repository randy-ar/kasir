<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kasir.barang.index', [
            'barang' => Barang::paginate(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.barang.create');
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
            'nama' => 'required|string|min:3',
            'kode' => 'required|string|min:3',
            'harga' => 'required|integer|min:100',
            'foto' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $attr = $request->all();
        if(!empty($request->file('foto'))){
            $image = time().'.'.$request->file('foto')->extension();
            $file = $request->file('foto')->move('uploads', $image);
            $attr['foto'] = $file->getPathname();
        }
        
        Barang::create($attr);
        return back()->with('success','Success! Barang telah disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('kasir.barang.edit', [
            'barang' => $barang
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|min:3',
            'kode' => 'required|string|min:3',
            'harga' => 'required|integer|min:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $attr = $request->all();
        if(!empty($request->file('foto'))){
            $image = time().'.'.$request->file('foto')->extension();
            $file = $request->file('foto')->move('uploads', $image);
            $attr['foto'] = $file->getPathname();
        }
        
        $barang = Barang::findOrFail($id);
        $barang->update($attr);
        return back()->with('success','Success! Barang telah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return back()->with('failed', 'Barang telah dihapus');
    }
}
