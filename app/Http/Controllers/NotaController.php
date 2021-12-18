<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Rka;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $validator = Validator::make($request->all(), [
            'jenis_belanja' => 'required',
            'jumlah_harga' => 'required',
            'file_nota' => 'required|mimes:pdf|max:4096',
            'id_rka' => 'required',
        ]);
        $id = $request->input('id_rka');
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $file_nota = time() . '_' . $request->file_nota->getClientOriginalName();
        $filePath1 = $request->file('file_nota')->storeAs('nota', $file_nota, 'public');
        $nota = Nota::create([
            'jenis_belanja' => $request->jenis_belanja,
            'jumlah_harga' => $request->jumlah_harga,
            'file_nota' => time() . '_' . $request->file_nota->getClientOriginalName(),
            'id_rka' => $request->id_rka,
        ]);
        Rka::where('id', $id)->update(array('is_upload_nota' => true));
        $response = [
            'message' => 'nota created',
            'data' => $nota
        ];

        return redirect()->route('user.rka')
            ->with('success', 'Nota created successfully.');
    }

    public function download($file)
    {

        return Storage::disk('public')->download('nota/' . $file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function show(Nota $nota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function edit(Nota $nota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nota $nota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nota  $nota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nota $nota)
    {
        //
    }
}
