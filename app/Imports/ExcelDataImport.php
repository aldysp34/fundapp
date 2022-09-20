<?php

namespace App\Imports;

use App\Models\ExcelData;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelDataImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ExcelData([
            "uraian" => $row[0],
            "volume_1" => $row[1],
            "satuan_1" => $row[2],
            "volume_2" => $row[3],
            "satuan_2" => $row[4],
            "volume_3" => $row[5],
            "satuan_3" => $row[6],
            "harga_satuan" => $row[7],
            "jumlah" => $row[8]
        ]);
    }
}
