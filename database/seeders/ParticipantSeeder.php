<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Sekretaris Kementerian Koperasi dan UKM',
                'group' => 'Eselon I',
                'group_order' => 1,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Deputi Bidang Perkoperasian',
                'group' => 'Eselon I',
                'group_order' => 1,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Deputi Bidang Usaha Mikro',
                'group' => 'Eselon I',
                'group_order' => 1,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Deputi Bidang Usaha Kecil dan Menengah',
                'group' => 'Eselon I',
                'group_order' => 1,
                'order' => 4,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Deputi Bidang Kewirausahaan',
                'group' => 'Eselon I',
                'group_order' => 1,
                'order' => 5,
            ],

            [
                'id' => Str::uuid(),
                'name' => 'Staf Ahli Menteri Bidang Ekonomi Makro',
                'group' => 'Staff Ahli Menteri',
                'group_order' => 2,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staf Ahli Menteri Bidang Produktivitas dan Daya Saing',
                'group' => 'Staff Ahli Menteri',
                'group_order' => 2,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staf Ahli Menteri Bidang Hubungan Antar Lembaga',
                'group' => 'Staff Ahli Menteri',
                'group_order' => 2,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staf Khusus Menteri Bidang Pemberdayaan Ekonomi Kerakyatan',
                'group' => 'Staff Khusus Menteri',
                'group_order' => 3,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staf Khusus Menteri Bidang Hukum, Pengawasan Koperasi dan Pembiayaan',
                'group' => 'Staff Khusus Menteri',
                'group_order' => 3,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Staf Khusus Menteri Bidang Pemberdayaan Ekonomi Kreatif',
                'group' => 'Staff Khusus Menteri',
                'group_order' => 3,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Inspektur Kementerian Koperasi dan UKM ',
                'group' => 'Inspektur',
                'group_order' => 4,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Utama LPDB KUMKM',
                'group' => 'Direktur Utama BLU',
                'group_order' => 5,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Utama LLP KUKM',
                'group' => 'Direktur Utama BLU',
                'group_order' => 5,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Umum dan Hukum LPDB KUMKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Pengembangan Usaha LPDB KUMKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Keuangan LPDB KUMKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Bisnis LPDB KUMKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 4,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Pembiayaan Syariah LPDB KUMKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 5,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Bisnis dan Pemasaran LLP KUKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 6,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Direktur Keuangan dan Umum LLP KUKM',
                'group' => 'Direktur BLU',
                'group_order' => 6,
                'order' => 7,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kepala Biro Manajemen Kinerja, Organisasi dan SDM Aparatur',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 1,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kepala Biro Hukum dan Kerja Sama',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 2,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kepala Biro Komunikasi dan Teknologi Informasi',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 3,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Kepala Biro Umum dan Keuangan',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 4,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Sekretaris Deputi Bidang Perkoperasian ',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 5,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan dan Pembaruan Perkoperasian',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 6,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pembiayaan dan Penjaminan Perkoperasian ',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 7,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengawasan Koperasi',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 8,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan SDM Perkoperasian',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 9,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Sekretaris Deputi Bidang Usaha Mikro',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 10,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asisten Deputi Pembiayaan Usaha Mikro',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 11,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Perlindungan dan Kemudahan Usaha Mikro',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 12,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan Rantai Pasok Usaha Mikro',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 13,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan Kapasitas Usaha Mikro',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 14,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Fasilitasi Hukum dan Konsultasi Usaha',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 15,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Sekretaris Deputi Bidang UKM',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 16,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pembiayaan dan Investasi UKM',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 17,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan Smber Daya Manusia UKM',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 18,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan Kawasan dan Rantai Pasok',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 19,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Permodalan',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 20,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Sekretaris Deputi Bidang Kewirausahaan',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 21,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Konsultasi Bisnis dan Pendampingan',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 22,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan Teknologi Informasi dan Inkubasi Usaha',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 23,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pengembangan Ekosistem Bisnis',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 24,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pembiayaan Wirausaha',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 25,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Asdep Pemetaan Data, Analisis dan Pengkajian Usaha',
                'group' => 'Eselon II',
                'group_order' => 7,
                'order' => 26,
            ]
        ]);
    }
}
