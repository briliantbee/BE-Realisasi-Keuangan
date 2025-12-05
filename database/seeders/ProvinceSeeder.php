<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        $provinces = [
            ['id' => 11, 'province' => 'Aceh', 'satker_code' => '060058'],
            ['id' => 12, 'province' => 'Sumatera Utara', 'satker_code' => '070055'],
            ['id' => 13, 'province' => 'Sumatera Barat', 'satker_code' => '080018'],
            ['id' => 14, 'province' => 'Riau', 'satker_code' => '090051'],
            ['id' => 15, 'province' => 'Jambi', 'satker_code' => '100043'],
            ['id' => 16, 'province' => 'Sumatera Selatan', 'satker_code' => '110068'],
            ['id' => 17, 'province' => 'Bengkulu', 'satker_code' => '260009'],
            ['id' => 18, 'province' => 'Lampung', 'satker_code' => '120010'],
            ['id' => 19, 'province' => 'Bangka Belitung', 'satker_code' => '300053'],
            ['id' => 21, 'province' => 'Kepulauan Riau', 'satker_code' => '320032'],
            ['id' => 31, 'province' => 'D.K.I. Jakarta', 'satker_code' => '010007'],
            ['id' => 32, 'province' => 'Jawa Barat', 'satker_code' => '020016'],
            ['id' => 33, 'province' => 'Jawa Tengah', 'satker_code' => '030076'],
            ['id' => 34, 'province' => 'D.I. Yogyakarta', 'satker_code' => '040063'],
            ['id' => 35, 'province' => 'Jawa Timur', 'satker_code' => '050069'],
            ['id' => 36, 'province' => 'Banten', 'satker_code' => '290064'],
            ['id' => 51, 'province' => 'Bali', 'satker_code' => '220009'],
            ['id' => 52, 'province' => 'Nusa Tenggara Barat', 'satker_code' => '230046'],
            ['id' => 53, 'province' => 'Nusa Tenggara Timur', 'satker_code' => '240017'],
            ['id' => 61, 'province' => 'Kalimantan Barat', 'satker_code' => '130063'],
            ['id' => 62, 'province' => 'Kalimantan Tengah', 'satker_code' => '140072'],
            ['id' => 63, 'province' => 'Kalimantan Selatan', 'satker_code' => '150009'],
            ['id' => 64, 'province' => 'Kalimantan Timur', 'satker_code' => '160064'],
            ['id' => 65, 'province' => 'Kalimantan Utara', 'satker_code' => '417754'],
            ['id' => 71, 'province' => 'Sulawesi Utara', 'satker_code' => '170008'],
            ['id' => 72, 'province' => 'Sulawesi Tengah', 'satker_code' => '180064'],
            ['id' => 73, 'province' => 'Sulawesi Selatan', 'satker_code' => '190056'],
            ['id' => 74, 'province' => 'Sulawesi Tenggara', 'satker_code' => '200041'],
            ['id' => 75, 'province' => 'Gorontalo', 'satker_code' => '310055'],
            ['id' => 76, 'province' => 'Sulawesi Barat', 'satker_code' => '340035'],
            ['id' => 81, 'province' => 'Maluku', 'satker_code' => '210042'],
            ['id' => 82, 'province' => 'Maluku Utara', 'satker_code' => '280146'],
            ['id' => 91, 'province' => 'Papua Barat', 'satker_code' => '330044'],
            ['id' => 94, 'province' => 'Papua', 'satker_code' => '250059'],
        ];

        foreach ($provinces as $prov) {
            DB::table('provinces')->updateOrInsert(
                ['id' => $prov['id']], // cek berdasarkan id
                [
                    'province' => $prov['province'],
                    'satker_code' => $prov['satker_code']
                ]
            );
        }
    }
}
