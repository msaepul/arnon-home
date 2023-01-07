<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PTPP implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new Export(),
            new Grafik(),
        ];
    }
}
