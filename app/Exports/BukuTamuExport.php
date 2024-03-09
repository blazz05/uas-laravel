<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BukuTamuExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        //return BukuTamu::all();
        $ar_buku_tamu = DB::table('buku_tamu')
            ->join('jabatan', 'jabatan.id', '=', 'buku_tamu.jabatan_id')
            ->join('tamu', 'tamu.id', '=', 'buku_tamu.tamu_id')
            ->select('tamu.nama AS tm', 'jabatan.nama AS jtn', 'buku_tamu.tgl_bertamu', 'buku_tamu.keperluan')
            ->get();
        return $ar_buku_tamu;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Jabatan',
            'Tanggal Dan Waktu',
            'Keperluan'
        ];
    }
}
