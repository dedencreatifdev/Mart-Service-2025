<?php

namespace App\Imports;

use App\Models\Kendaraan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class KendaraanImport implements ToModel, WithUpserts
{

    public function uniqueBy()
    {
        return 'NO_POLISI';
    }

    public function startRow(): int
    {
        return 2;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Kendaraan([
            //

//             NO_POLISI
'NO_POLISI'    => $row[0],
'KDNSB'        => $row[1],
'KDJNS'        => $row[2],
'KENDARAAN'    => $row[3],
'KDTYPE'       => $row[4],
'NO_CHASIS'    => $row[5],
'NO_MESIN'     => $row[6],
'NO_SERI'      => $row[7],
'TAHUN'        => $row[8],
'WARNA'        => $row[9],
'NO_BPKB'      => $row[10],
'NO_FAKTUR'    => $row[11],
'TG_STNK'      => $row[12],
'ATASNAMA'     => $row[13],
'ALAMAT'       => $row[14],
'KM_AKHIR'     => $row[15],
'KM_HARI'      => $row[16],
'TG_JUAL'      => $row[17],
'KETERANGAN'   => $row[18],
'TG_DAFTAR'    => $row[19],
'ID_KODE'      => $row[20],
'ID_COMP'      => $row[21],
'FLAG'         => $row[22],
'FT_NMPEMILIK' => $row[23],
'FT_JNSKEND'   => $row[24],



        ]);
    }
}
