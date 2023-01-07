<?php

namespace App\Imports;

use App\Models\Modelutama;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Import implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Modelutama([
            'nomor' => $row['nomor'],
            'dari' => $row['dari'],
            'kepada' => $row['kepada']
        ]);
    }
}
