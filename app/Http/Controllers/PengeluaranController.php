<?php

namespace App\Http\Controllers;

use App\Models\Total;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        $total = Total::all();

        return view('main', [
            'pengeluaran' => $pengeluaran,
            'total' => $total,
            'no' => 0
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $harga = 0;
        $validateData = $request->validate([
            'nama_kegiatan' => 'required|max:255',
            'debit' => 'required',
            'jenis_kegiatan' => 'required'
        ]);

        // dd($validateData);
        Pengeluaran::create($validateData);

        if($request->jenis_kegiatan == 'Debit'){
            $harga = Total::all('total')[0]->total - $request->debit;
            Total::where('id',1)->update(['total' => $harga]);
        } else {
            $harga = Total::all('total')[0]->total + $request->debit;
            Total::where('id',1)->update(['total' => $harga]);
        }
        
        return redirect('/index')->with('success','new post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        $Total = Total::all()->where('id','=',1)[0];
        $pengeluaran = Pengeluaran::find($request->id);
        $jenisKegiatan = $pengeluaran->jenis_kegiatan;
        $total = $Total->total;
        $nominal = $pengeluaran->debit;

        if($jenisKegiatan == "Kredit"){
            $total = $total - $nominal;
        } else if($jenisKegiatan == "Debit"){
            $total = $total + $nominal;
        }

        $Total->update(['total' => $total]);
        $pengeluaran->destroy($request->id);
        return redirect('/index');
    }
}
