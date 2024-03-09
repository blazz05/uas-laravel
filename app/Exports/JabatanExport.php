<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JabatanExport implements FromCollection,  WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Jabatan::all();
        //dapatkan seluruh data jabatan dengan query builder
        $ar_jabatan = DB::table('jabatan')->get();
        //arahkan ke halaman baru dengan menyertakan data jabatan(compact)
        //di resources/views/jabatan/index.blade.php
        return $ar_jabatan;
    }

    public function headings(): array
    {
        return [  
            'No',         
            'Nama'
        ];
    }
}
