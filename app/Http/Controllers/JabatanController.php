<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jabatan;
use PDF;
use App\Exports\JabatanExport;
use Maatwebsite\Excel\Facades\Excel;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dapatkan seluruh data jabatan dengan query builder
        $ar_jabatan = DB::table('jabatan')->get();
        //arahkan ke halaman baru dengan menyertakan data jabatan(compact)
        //di resources/views/jabatan/index.blade.php
        return view('jabatan.index',compact('ar_jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mengarahkan ke hal form input
        return view('jabatan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses validasi data
        $validasi = $request->validate(
            [ 
                'nama'=>'required|max:50',  
            ],
            //menampilkan pesan kesalahan
            [  
                'nama.required'=>'Nama Wajib di Isi',                      
            ],
            );
            //proses input data tangkap request dari form input
            DB::table('jabatan')->insert(
                [  
                    'nama'=>$request->nama,      
                ]
                );
                //landing page
                return redirect('/jabatan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // menampilkan detail jabatan
        $ar_jabatan = DB::table('jabatan')
        ->where('jabatan.id', '=',$id)->get();
        return view('jabatan.show',compact('ar_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //mengarahkan ke halaman form edit jabatan
        $data = DB::table('jabatan')
        ->where('id','=',$id)->get();
        return view('jabatan.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit jabatan 
        DB::table('jabatan')->where('id', '=', $id)->update(
            [
                'nama'=>$request->nama,  
            ] 
        );
        //landing page
         return redirect('/jabatan'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data jabatan
        DB::table('jabatan')->where('id',$id)->delete();
        return redirect('/jabatan');
    }

    public function jabatanPDF()
    {
        
        $ar_jabatan = DB::table('jabatan')
        
        ->get();

        $pdf = PDF::loadView('jabatan.jabatanPDF',['ar_jabatan'=>$ar_jabatan]);
        return $pdf->download('dataJabatan.pdf');
        
    }

    public function jabatancsv()
    {
        return Excel::download(new JabatanExport, 'jabatan.xlsx');
    }
}
