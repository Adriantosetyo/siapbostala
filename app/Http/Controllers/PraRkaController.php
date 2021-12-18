<?php

namespace App\Http\Controllers;

use App\Models\PraRka;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\AllPraRkaExport;
use App\Exports\BarangJasaPraRkaExport;
use App\Exports\BelanjaModalPraRkaExport;
use Maatwebsite\Excel\Facades\Excel;

class PraRkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('user.pra', ['title' => 'Pra Rka']);
    }

    public function admin()
    {
        return view('admin.pra', ['title' => 'Pra Rka']);
    }

    public function showBarangJasa($id)
    {
        $barangjasa = PraRka::where('jenis', 'Barang dan Jasa')
            ->where('id_user', $id)
            ->orderBy('created_at')
            ->take(5)
            ->get();
        return view('user.pra.barangjasa', ['title' => 'Pra Rka', 'barangjasas' => $barangjasa]);
    }
    public function showBelanjaModal($id)
    {
        $belanjamodal = PraRka::where('jenis', 'Belanja Modal')
            ->where('id_user', $id)
            ->orderBy('created_at')
            ->take(5)
            ->get();
        return view('user.pra.belanjamodal', ['title' => 'Pra Rka', 'belanjamodals' => $belanjamodal]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBarangJasa($id)
    {
        return view('user.pra.barangjasa.add', ['title' => 'Pra Rka']);
    }
    public function createBelanjaModal()
    {
        return view('user.pra.belanjamodal.add', ['title' => 'Pra Rka']);
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
            'jenis_barang' => 'required',
            'kode_rekening' => 'required',
            'jenis_pajak' => 'required',
            'id_user'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $prarka = PraRka::create($request->all());
        $response = [
            'message' => 'pra rka created',
            'data' => $prarka
        ];
        response()->json($response, Response::HTTP_CREATED);
        return redirect()->route('user.pra-rka')
            ->with('success', 'Pra rka created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PraRka  $praRka
     * @return \Illuminate\Http\Response
     */
    public function show(PraRka $praRka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PraRka  $praRka
     * @return \Illuminate\Http\Response
     */
    public function edit(PraRka $praRka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PraRka  $praRka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prarka = PraRka::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
            'jenis_barang' => 'required',
            'kode_rekening' => 'required',
            'jenis_pajak' => 'required',
            'id_user'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $prarka->update($request->all());
            $response = [
                'message' => 'PraRka updated',
                'data' => $prarka
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PraRka  $praRka
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prarka = PraRka::findOrFail($id);
        try {
            $prarka->delete();
            $response = [
                'message' => 'PraRka deleted',
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }

    public function exportAll()
    {
        $filename = 'exportAll' . date('Y-m-d-His') . '.xlsx';
        return Excel::download(new AllPraRkaExport, $filename);
    }
    public function exportBarangJasa()
    {
        $filename = 'exportBarangJasa' . date('Y-m-d-His') . '.xlsx';
        return Excel::download(new BarangJasaPraRkaExport, $filename);
    }
    public function exportBelanjaModal()
    {
        $filename = 'exportBelanjaModal' . date('Y-m-d-His') . '.xlsx';
        return Excel::download(new BelanjaModalPraRkaExport, $filename);
    }
    public function updateAdmin($id)
    {
        $prarka = PraRka::findOrFail($id);
        try {
            $prarka = PraRka::where('id', $id)->update(array('is_approve_admin' => true));
            $response = [
                'message' => 'prarka updated',
                'data' => $prarka
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
    public function updateAdminZona($id)
    {
        $prarka = PraRka::findOrFail($id);
        try {
            $prarka = PraRka::where('id', $id)->update(array('is_approve_admin_zona' => true));
            $response = [
                'message' => 'prarka updated',
                'data' => $prarka
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }

    public function updateSuperAdmin($id)
    {
        $prarka = PraRka::findOrFail($id);
        try {
            $prarka = PraRka::where('id', $id)->update(array('is_approve_super_admin' => true));
            $response = [
                'message' => 'prarka updated',
                'data' => $prarka
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
