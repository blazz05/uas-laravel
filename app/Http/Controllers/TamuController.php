<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tamu;
use PDF;
use App\Exports\TamuExport;
use Maatwebsite\Excel\Facades\Excel;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //dapatkan seluruh data tamu dengan query builder
       $ar_tamu = DB::table('tamu')->get();
       //arahkan ke halaman baru dengan menyertakan data tamu(compact)
       //di resources/views/tamu/index.blade.php
       return view('tamu.index',compact('ar_tamu'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // mengarahkan ke hal form input
        return view('tamu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [ 
                'nama' => 'required|max:45', 
                'gender' => 'required', 
                'no_hp' => 'required', 
                'alamat' => 'required',  
            ],
            //menampilkan pesan kesalahan
            [  
                'nama.required' => 'Nama bertamu wajib diisi',
                'gender.required' => 'Gender wajib diisi',
                'no_hp.required' => 'No HP wajib diisi', 
                'alamat.required' => 'Alamat wajib diisi',
            ],
            );
            //proses input data tangkap request dari form input
            DB::table('tamu')->insert(
                [
                    'nama'=>$request->nama,  
                    'gender'=>$request->gender,  
                    'no_hp'=>$request->no_hp,  
                    'alamat'=>$request->alamat,
                ]
            );
            //landing page
            return redirect('/tamu');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // menampilkan detail tamu
        $ar_tamu = DB::table('tamu')
        ->where('tamu.id', '=',$id)->get();
        return view('tamu.show',compact('ar_tamu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //mengarahkan ke halaman form edit tamu
       $data = DB::table('tamu')
       ->where('id','=',$id)->get();
       return view('tamu.form_edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses edit data lama, tangkap request dari form edit tamu 
        DB::table('tamu')->where('id', '=', $id)->update(
            [
                'nama'=>$request->nama,  
                'gender'=>$request->gender,  
                'no_hp'=>$request->no_hp,  
                'alamat'=>$request->alamat,
            ]
            );
            //landing page
            return redirect('/tamu'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('tamu')->where('id',$id)->delete();
        return redirect('/tamu');
    }

    public function tamuPDF()
    {
        
        $ar_tamu = DB::table('tamu')
        
        ->get();

        $pdf = PDF::loadView('tamu.tamuPDF',['ar_tamu'=>$ar_tamu]);
        return $pdf->download('dataTamu.pdf');
        
    }

    public function tamucsv()
    {
        return Excel::download(new TamuExport, 'tamu.xlsx');
    }
   
    
  
}
