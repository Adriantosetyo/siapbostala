<?php

namespace App\Http\Controllers;

use App\Models\Bku;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class BkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $saldotahunlalu = Bku::where('jenis', 'Saldo Tahun Lalu')
            ->where('id_user', $id)
            ->orderBy('created_at')
            ->take(1)
            ->get();
        $saldotunai = Bku::where('jenis', 'Saldo Tunai')
            ->where('id_user', $id)
            ->orderBy('created_at')
            ->take(1)
            ->get();
        $belanjabarang = Bku::where('jenis', 'Belanja Barang dan Jasa')
            ->where('id_user', $id)
            ->orderBy('created_at')
            ->take(1)
            ->get();
        $belanjamodal = Bku::where('jenis', 'Belanja Modal')
            ->where('id_user', $id)
            ->orderBy('created_at')
            ->take(1)
            ->get();
        return view('user.bku', [
            'title' => 'Bku',
            'saldotahunlalu' =>  $saldotahunlalu,
            'saldotunai' => $saldotunai,
            'belanjabarang' => $belanjabarang,
            'belanjamodal' => $belanjamodal
        ]);
    }

    public function admin()
    {
        return view('admin.bku', ['title' => 'Bku']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBKU()
    {
        return view('user.bku.add', ['title' => 'Bku']);
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
            'jenis' => 'required',
            'jumlah' => 'required',
            'is_added' => 'required',
            'id_user'  => 'required',
        ]);
        $id = $request->id_user;
        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $bku = Bku::create($request->all());
            $response = [
                'message' => 'bku created',
                'data' => $bku
            ];
            response()->json($response, Response::HTTP_CREATED);
            return redirect()->route('user.bku', $id)
                ->with('success', 'bku created successfully.');
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bku  $bku
     * @return \Illuminate\Http\Response
     */
    public function show(Bku $bku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bku  $bku
     * @return \Illuminate\Http\Response
     */
    public function edit(Bku $bku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bku  $bku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bku = Bku::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'jumlah' => 'required',
            'is_added' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $id = $request->id_user;
        try {
            $bku->update($request->all());
            $response = [
                'message' => 'bku updated',
                'data' => $bku
            ];
            return redirect()->route('user.bku', $id)
                ->with('success', 'bku updated successfully.');
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bku  $bku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = $request->id_user;
        $bku = Bku::findOrFail($id);
        try {
            $bku->delete();
            $response = [
                'message' => 'bku deleted',
            ];
            return redirect()->route('user.bku', $user)
                ->with('error', 'bku deleted successfully.');
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
