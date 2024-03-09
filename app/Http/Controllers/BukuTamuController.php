<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BukuTamu;
use App\Models\Tamu;
use App\Models\Jabatan;
use PDF;
use App\Exports\BukuTamuExport;
use Maatwebsite\Excel\Facades\Excel;

class BukuTamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_buku_tamu = DB::table('buku_tamu')
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->select('buku_tamu.*', 'tamu.nama AS tm', 'jabatan.nama AS jtn')
            ->get();
        return view('buku_tamu.index', compact('ar_buku_tamu'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input
        return view('buku_tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'tgl_bertamu' => 'required', 
            'tamu_id' => 'required|integer', 
            'jabatan_id' => 'required|integer', 
            'keperluan' => 'required|max:255',  
        ], 
        [
            'tgl_bertamu.required' => 'Tanggal bertamu wajib diisi',
            'tamu_id.required' => 'Tamu wajib diisi',
            'jabatan_id.required' => 'Jabatan wajib diisi', 
            'keperluan.required' => 'Keperluan wajib diisi',
        ]
        );
            //proses input data tangkap request dari form input
            DB::table('buku_tamu')->insert(
                [  
                    'tgl_bertamu'=>$request->tgl_bertamu,      
                    'tamu_id'=>$request->tamu_id,      
                    'jabatan_id'=>$request->jabatan_id,      
                    'keperluan'=>$request->keperluan,      
                ]
                );
                //landing page
                return redirect('/buku_tamu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_buku_tamu = DB::table('buku_tamu')
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->select('buku_tamu.*', 'tamu.nama AS tm', 'tamu.nama AS tm', 'jabatan.nama AS jtn')
            ->where('buku_tamu.id', '=',$id)->get();
            return view('buku_tamu.show',compact('ar_buku_tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit buku_tamu
        $data = DB::table('buku_tamu')
        ->where('id','=',$id)->get();
        return view('buku_tamu.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit buku_tamu 
        DB::table('buku_tamu')->where('id', '=', $id)->update(
            [
                'tgl_bertamu'=>$request->tgl_bertamu,      
                'tamu_id'=>$request->tamu_id,      
                'jabatan_id'=>$request->jabatan_id,      
                'keperluan'=>$request->keperluan, 
            ]
            );
            //landing page
            return redirect('/buku_tamu'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data buku_tamu
        DB::table('buku_tamu')->where('id',$id)->delete();
        return redirect('/buku_tamu');
    }

    public function buku_tamuPDF()
    {
        $ar_buku_tamu = DB::table('buku_tamu') //join tabel dengan Query Builder Laravel
        ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
        ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
        ->select('buku_tamu.*', 'tamu.nama AS tm', 'jabatan.nama AS jtn')
        ->get();

        $pdf = PDF::loadView('buku_tamu.buku_tamuPDF',['ar_buku_tamu'=>$ar_buku_tamu]);
        return $pdf->download('dataBukuTamu.pdf');
    }

    public function buku_tamucsv()
    {
        return Excel::download(new BukuTamuExport, 'buku_tamu.xlsx');
    }
}
