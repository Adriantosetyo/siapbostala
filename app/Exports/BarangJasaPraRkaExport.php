<?php

namespace App\Exports;

use App\Models\PraRka;
use Maatwebsite\Excel\Concerns\FromCollection;

class BarangJasaPraRkaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PraRka::where('jenis', 'Barang dan Jasa')
            ->orderBy('created_at')
            ->get();;
    }
}
