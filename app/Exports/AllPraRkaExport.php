<?php

namespace App\Exports;

use App\Models\PraRka;
use Maatwebsite\Excel\Concerns\FromCollection;

class AllPraRkaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PraRka::all();
    }
}
