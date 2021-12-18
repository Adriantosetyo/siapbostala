<?php

namespace App\Http\Controllers;

use App\Models\Perjanjian;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class PerjanjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.perjanjian', ['title' => 'Surat Perjanjian']);
    }

    public function admin()
    {
        return view('admin.perjanjian', ['title' => 'Surat Perjanjian']);
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
            'pertanyaan' => 'required',
            'id_user'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        try {

            $perjanjian = Perjanjian::create([
                'pertanyaan' => $request->pertanyaan,
                'id_user' => $request->id_user,
            ]);
            $response = [
                'message' => 'perjanjian created',
                'data' => $perjanjian
            ];
            response()->json($response, Response::HTTP_CREATED);
            return redirect()->route('user.perjanjian')
                ->with('success', 'perjanjian created successfully.');
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function show(Perjanjian $perjanjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function edit(Perjanjian $perjanjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perjanjian $perjanjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perjanjian $perjanjian)
    {
        //
    }
}
