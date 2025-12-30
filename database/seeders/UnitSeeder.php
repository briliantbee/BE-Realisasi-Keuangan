<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'code' => '401741',
            'parent_code' => NULL,
            'name' => 'Deputi Bidang Usaha Mikro'
        ]);

        Unit::create([
            'code' => '401741A',
            'parent_code' => '401741',
            'name' => 'Sekretariat Deputi Bidang Usaha Mikro'
        ]);

        Unit::create([
            'code' => '401741B',
            'parent_code' => '401741',
            'name' => 'Asdep Pembiayaan Usaha Mikro'
        ]);

        Unit::create([
            'code' => '401741C',
            'parent_code' => '401741',
            'name' => 'Asdep Perlindungan dan Kemudahan Usaha Mikro'
        ]);

        Unit::create([
            'code' => '401741D',
            'parent_code' => '401741',
            'name' => 'Asdep Pengembangan Rantai Pasok Usaha Mikro'
        ]);

        Unit::create([
            'code' => '401741E',
            'parent_code' => '401741',
            'name' => 'Asdep Pengembangan Kapasitas Usaha Mikro'
        ]);

        Unit::create([
            'code' => '401741F',
            'parent_code' => '401741',
            'name' => 'Asdep Fasilitasi Hukum dan Konsultasi Usaha'
        ]);

        Unit::create([
            'code' => '401742',
            'parent_code' => NULL,
            'name' => 'Deputi Bidang UKM'
        ]);

        Unit::create([
            'code' => '401742A',
            'parent_code' => '401742',
            'name' => 'Sekretariat Deputi Bidang UKM'
        ]);

        Unit::create([
            'code' => '401742B',
            'parent_code' => '401742',
            'name' => 'Asdep Pembiayaan dan Investasi UKM'
        ]);

        Unit::create([
            'code' => '401742C',
            'parent_code' => '401742',
            'name' => 'Asdep Pengembangan SDM UKM'
        ]);

        Unit::create([
            'code' => '401742D',
            'parent_code' => '401742',
            'name' => 'Asdep Pengembangan Kawasan dan Rantai Pasok'
        ]);

        Unit::create([
            'code' => '401742E',
            'parent_code' => '401742',
            'name' => 'Asdep Kemitraan dan Perluasan Pasar'
        ]);

        Unit::create([
            'code' => '401744',
            'parent_code' => NULL,
            'name' => 'Deputi Bidang Kewirausahaan'
        ]);

        Unit::create([
            'code' => '401744A',
            'parent_code' => '401744',
            'name' => 'Sekretaris Deputi Bidang Kewirausahaan'
        ]);

        Unit::create([
            'code' => '401744B',
            'parent_code' => '401744',
            'name' => 'Asdep Ekosistem Bisnis Wirausaha'
        ]);

        Unit::create([
            'code' => '401744C',
            'parent_code' => '401744',
            'name' => 'Asdep Pendampingan Inovasi dan Keberlanjutan Usaha'
        ]);

        Unit::create([
            'code' => '401744D',
            'parent_code' => '401744',
            'name' => 'Asdep Perluasan Pembiayaan Wirausaha'
        ]);

        Unit::create([
            'code' => '401744E',
            'parent_code' => '401744',
            'name' => 'Asdep Pembinaan JF PKWU'
        ]);

        Unit::create([
            'code' => '401744F',
            'parent_code' => '401744',
            'name' => 'Asdep Inkubasi dan Digitalisasi Wirausaha'
        ]);

        Unit::create([
            'code' => '401745',
            'parent_code' => NULL,
            'name' => 'Deputi Bidang Perkoperasian'
        ]);

        Unit::create([
            'code' => '401745A',
            'parent_code' => '401745',
            'name' => 'Sekretariat Deputi Bidang Perkoperasian'
        ]);

        Unit::create([
            'code' => '401745B',
            'parent_code' => '401745',
            'name' => 'Asdep Pengembangan dan Pembaruan Perkoperasian'
        ]);

        Unit::create([
            'code' => '401745C',
            'parent_code' => '401745',
            'name' => 'Asdep Pembiayaan dan Penjaminan Perkoperasian'
        ]);

        Unit::create([
            'code' => '401745D',
            'parent_code' => '401745',
            'name' => 'Asdep Pengawasan Koperasi'
        ]);

        Unit::create([
            'code' => '401745E',
            'parent_code' => '401745',
            'name' => 'Asdep Pengembangan SDM'
        ]);

        Unit::create([
            'code' => '401745F',
            'parent_code' => '401745',
            'name' => 'Dekopin'
        ]);

        Unit::create([
            'code' => '622297',
            'parent_code' => NULL,
            'name' => 'Sekretariat Kementerian'
        ]);

        Unit::create([
            'code' => '622297A',
            'parent_code' => '622297',
            'name' => 'Biro Manajemen Kinerja, Organisasi & SDM Aparatur'
        ]);

        Unit::create([
            'code' => '622297B',
            'parent_code' => '622297',
            'name' => 'Biro Hukum dan Kerjasama'
        ]);

        Unit::create([
            'code' => '622297C',
            'parent_code' => '622297',
            'name' => 'Biro Komunikasi dan Teknologi Informasi'
        ]);

        Unit::create([
            'code' => '622297D',
            'parent_code' => '622297',
            'name' => 'Biro Umum dan Keuangan'
        ]);

        Unit::create([
            'code' => '622297E',
            'parent_code' => '622297',
            'name' => 'Inspektorat'
        ]);

        Unit::create([
            'code' => '622297F',
            'parent_code' => '622297',
            'name' => 'Gaji dan Tunjangan'
        ]);

        Unit::create([
            'code' => '622297G',
            'parent_code' => '622297',
            'name' => 'Layanan Operasional Satker'
        ]);

        Unit::create([
            'code' => '446135',
            'parent_code' => NULL,
            'name' => 'LPDB-KUMKM'
        ]);

        Unit::create([
            'code' => '446141',
            'parent_code' => NULL,
            'name' => 'LLP-KUKM'
        ]);

        Unit::create([
            'code' => 'DK',
            'parent_code' => NULL,
            'name' => 'Dekonsentrasi'
        ]);

        Unit::create([
            'code' => 'TP',
            'parent_code' => NULL,
            'name' => 'Tugas Pembantuan'
        ]);
    }
}
