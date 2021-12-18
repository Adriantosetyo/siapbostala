<?php

namespace App\Http\Controllers;

use App\Models\Spj;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;



class SpjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spj = Spj::all();
        return view('user.spj', ['title' => 'Spj', 'spj' => $spj]);
    }

    public function admin()
    {
        return view('admin.spj', ['title' => 'Spj']);
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
        $request->validate([
            'file_pra_rka'  => 'required|mimes:pdf|max:4096',
            'file_rka'  => 'required|mimes:pdf|max:4096',
            'file_bku'  => 'required|mimes:pdf|max:4096',
            'file_lra_bos'  => 'required|mimes:pdf|max:4096',
            'file_register'  => 'required|mimes:pdf|max:4096',
            'file_berita'  => 'required|mimes:pdf|max:4096',
            'file_k7'  => 'required|mimes:pdf|max:4096',
            'id_user'  => 'required',
        ]);

        $fileModel = new Spj;

        if ($request->file()) {
            $fileModel->id_user = $request->id_user;
            $file_pra_rka = time() . '_' . $request->file_pra_rka->getClientOriginalName();
            $filePath1 = $request->file('file_pra_rka')->storeAs('spj', $file_pra_rka, 'public');
            $fileModel->file_pra_rka = $file_pra_rka;


            $file_rka = time() . '_' . $request->file_rka->getClientOriginalName();
            $filePath2 = $request->file('file_rka')->storeAs('spj', $file_rka, 'public');
            $fileModel->file_rka = $file_rka;


            $file_bku = time() . '_' . $request->file_bku->getClientOriginalName();
            $filePath3 = $request->file('file_bku')->storeAs('spj', $file_bku, 'public');
            $fileModel->file_bku = $file_bku;


            $file_lra_bos = time() . '_' . $request->file_lra_bos->getClientOriginalName();
            $filePath4 = $request->file('file_lra_bos')->storeAs('spj', $file_lra_bos, 'public');
            $fileModel->file_lra_bos = $file_lra_bos;


            $file_register = time() . '_' . $request->file_register->getClientOriginalName();
            $filePath5 = $request->file('file_register')->storeAs('spj', $file_register, 'public');
            $fileModel->file_register = $filePath3;


            $file_berita = time() . '_' . $request->file_berita->getClientOriginalName();
            $filePath6 = $request->file('file_berita')->storeAs('spj', $file_berita, 'public');
            $fileModel->file_berita = $file_berita;


            $file_k7 = time() . '_' . $request->file_k7->getClientOriginalName();
            $filePath7 = $request->file('file_k7')->storeAs('spj', $file_k7, 'public');
            $fileModel->file_k7 = $file_k7;


            $fileModel->save();
            return back()
                ->with('success', 'File has been uploaded.');
        }
    }

    public function download($file)
    {

        return Storage::disk('public')->download('spj/' . $file);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function show(Spj $spj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function edit(Spj $spj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Spj $spj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spj  $spj
     * @return \Illuminate\Http\Response
     */
    public function destroy(Spj $spj)
    {
        //
    }
}
