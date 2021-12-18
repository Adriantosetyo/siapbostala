<?php

namespace App\Http\Controllers;

use App\Models\Rka;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class RkaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        return view('user.rka', ['title' => 'Rka']);
    }

    public function admin()
    {
        return view('admin.rka', ['title' => 'Rka']);
    }

    public function showPKLulusan($id)
    {

        $pklulusan =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Kompetensi Lulusan')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.pklulusan', ['title' => 'Rka', 'pklulusans' => $pklulusan]);
    }
    public function createPKLulusan()
    {
        return view('user.rka.pklulusan.add', ['title' => 'Rka']);
    }

    public function showPSI($id)
    {

        $psi =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Standar Isi')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.psi', ['title' => 'Rka', 'psis' => $psi]);
    }
    public function createPSI()
    {
        return view('user.rka.psi.add', ['title' => 'Rka']);
    }

    public function createPK()
    {
        return view('user.rka.pk.add', ['title' => 'Rka']);
    }
    public function showPK($id)
    {

        $pk =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Pendidik dan Tenaga Kependidikan')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.pk', ['title' => 'Rka', 'pks' => $pk]);
    }

    public function showPSK($id)
    {

        $psk =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Standar Kelulusan')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.psk', ['title' => 'Rka', 'psks' => $psk]);
    }
    public function createPSK()
    {
        return view('user.rka.psk.add', ['title' => 'Rka']);
    }

    public function createPS()
    {
        return view('user.rka.ps.add', ['title' => 'Rka']);
    }
    public function showPS($id)
    {

        $ps =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Saran dan Prasarana Sekolah')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.ps', ['title' => 'Rka', 'pss' => $ps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPP()
    {
        return view('user.rka.pp.add', ['title' => 'Rka']);
    }
    public function showPP($id)
    {

        $pp =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Standar Pengelolaan')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.pp', ['title' => 'Rka', 'pps' => $pp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showPSP($id)
    {

        $psp =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pengembangan Standar Pembiayaan')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.psp', ['title' => 'Rka', 'psps' => $psp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPSP()
    {
        return view('user.rka.psp.add', ['title' => 'Rka']);
    }
    public function showPI($id)
    {

        $pi =  DB::table('rka')
            ->join('nota', 'rka.id', '=', 'nota.id_rka', 'full outer')
            ->where('rka.jenis', 'Pemgembagan dan Implementasi SIstem Penilaian')
            ->where('id_user', $id)
            ->select('rka.id', 'rka.jenis', 'rka.jenis_barang', 'rka.created_at', 'rka.is_upload_nota', 'nota.file_nota', 'rka.is_approve_admin',  'rka.is_approve_admin_zona',  'rka.is_approve_super_admin')
            ->orderBy('rka.created_at')
            ->get();

        return view('user.rka.pi', ['title' => 'Rka', 'pis' => $pi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPI()
    {
        return view('user.rka.pi.add', ['title' => 'Rka']);
    }
    public function createNota()
    {
        return view('user.nota', ['title' => 'Rka']);
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
        try {
            $rka = Rka::create($request->all());
            $response = [
                'message' => 'rka created',
                'data' => $rka
            ];
            response()->json($response, Response::HTTP_CREATED);
            return redirect()->route('user.rka')
                ->with('success', 'Rka created successfully.');
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rka  $rka
     * @return \Illuminate\Http\Response
     */
    public function show(Rka $rka)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rka  $rka
     * @return \Illuminate\Http\Response
     */
    public function edit(Rka $rka)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rka  $rka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rka $rka)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rka  $rka
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rka $rka)
    {
        //
    }
    public function updateAdmin($id)
    {
        $rka = Rka::findOrFail($id);
        try {
            $rka = Rka::where('id', $id)->update(array('is_approve_admin' => true));
            $response = [
                'message' => 'rka updated',
                'data' => $rka
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
        $rka = Rka::findOrFail($id);
        try {
            $rka = Rka::where('id', $id)->update(array('is_approve_admin_zona' => true));
            $response = [
                'message' => 'rka updated',
                'data' => $rka
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
        $rka = Rka::findOrFail($id);
        try {
            $rka = Rka::where('id', $id)->update(array('is_approve_super_admin' => true));
            $response = [
                'message' => 'rka updated',
                'data' => $rka
            ];
            return response()->json($response, Response::HTTP_OK);
        } catch (QueryException $e) {
            return response()->json([
                'message' => "Failed" . $e->errorInfo
            ]);
        }
    }
}
