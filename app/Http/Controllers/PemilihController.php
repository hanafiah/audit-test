<?php

namespace App\Http\Controllers;

use App\Pemilih;
use Illuminate\Http\Request;
use OwenIt\Auditing\Events\Audited;
use OwenIt\Auditing\Models\Audit;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemilih = Pemilih::all();
        return view('pemilih.index', compact('pemilih'));
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
     * @param  \App\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilih $pemilih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilih $pemilih)
    {
        return view('pemilih.edit', compact('pemilih'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilih $pemilih)
    {
        //
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat1' => 'required|max:255',
            'alamat2' => 'required|max:255',
            'alamat3' => 'nullable|max:255',
            'poskod' => 'required|max:255',
            'bandar' => 'required|max:255',
            'kodNegeri' => 'required|max:255',
            'no_kp' => 'required',
        ]);
        $pemilih->update($validatedData);

        return redirect(route('pemilih.edit', $pemilih->id))->with('success', 'Data is successfully updated');
    }

    public function restore(Request $request, Pemilih $pemilih, Audit $audit)
    {
        $pemilih->transitionTo($audit);
        $pemilih->save();
        return redirect(route('pemilih.edit', $pemilih->id))->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemilih  $pemilih
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilih $pemilih)
    {
        //
    }
}
