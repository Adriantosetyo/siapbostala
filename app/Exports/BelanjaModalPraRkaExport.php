<?php

namespace App\Exports;

use App\Models\PraRka;
use Maatwebsite\Excel\Concerns\FromCollection;

class BelanjaModalPraRkaExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return PraRka::where('jenis', 'Belanja Modal')
            ->orderBy('created_at')
            ->get();
    }
}
