<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TamuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Tamu::all();
        //dapatkan seluruh data tamu dengan query builder
        $ar_tamu = DB::table('tamu')->get();
        //arahkan ke halaman baru dengan menyertakan data tamu(compact)
        //di resources/views/tamu/index.blade.php
        return $ar_tamu;
    }

    public function headings(): array
    {
        return [  
            'No',         
            'Nama',
            'Gender',
            'No HP',
            'Alamat'
        ];
    }
}
