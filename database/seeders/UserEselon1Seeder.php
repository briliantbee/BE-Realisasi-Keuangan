<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserEselon1Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '2aeb760f-2876-40d6-bb7a-baeb5df804b1',
            'name' => 'Sekretaris Kementerian',
            'email' => 'dash-ses@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => '680fb4d9-e1f0-45ff-8847-b0110c74c697',
            'password' => Hash::make('sekretariatkukm'),
        ]);

        User::create([
            'id' => 'a2a6a84c-3936-4a4b-8970-e8aad2727498',
            'name' => 'Deputi Bidang Usaha Kecil dan Menengah',
            'email' => 'dash-ukm@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => '66d0e8ec-11c9-4dae-b5bc-124fa2a1caa0',
            'password' => Hash::make('dep.ukm'),
        ]);

        User::create([
            'id' => 'd794dcef-1b03-4e24-a83d-8530f250304b',
            'name' => 'Deputi Bidang Usaha Mikro',
            'email' => 'dash-mikro@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => 'a10e0090-adb1-4b9f-a5b9-02233f346af9',
            'password' => Hash::make('mikroumkm'),
        ]);

        User::create([
            'id' => '5fb919e5-b75b-43ca-9444-56af03cd2b02',
            'name' => 'Deputi Bidang Kewirausahaan',
            'email' => 'dash-kwu@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => '7304ec3b-8117-4de3-b0af-742fdca64d31',
            'password' => Hash::make('kewirausahaandep'),
        ]);

        User::create([
            'id' => '610c8b59-908c-4ecc-9c44-8e03113e843d',
            'name' => 'Deputi Bidang Perkoperasian',
            'email' => 'dash-perkop@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => '6b28e210-a003-4c9f-b9a8-ae9f5cafe718',
            'password' => Hash::make('deputikoperasi'),
        ]);

        User::create([
            'id' => '95d74cbd-6238-4324-a89b-74b80c9225d6',
            'name' => 'Direktur Utama LLP SMESCO',
            'email' => 'dash-llp@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => '13ffd22c-de5e-4964-a7d5-c1cb4191aee2',
            'password' => Hash::make('dirutllp'),
        ]);

        User::create([
            'id' => '5d711d58-e260-4577-85e7-cd6110efdf9e',
            'name' => 'Direktur Utama LPDB KUKM',
            'email' => 'dash-lpdb@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => '3d1d59a9-b089-4c2c-b115-a91d846c8bad',
            'password' => Hash::make('lpdb.dir'),
        ]);

        
        User::create([
            'id' => 'e22dfea5-7dd4-404a-b77b-dd8bfb070d6a',
            'name' => 'Staff Khusus Menteri Bidang Pemberdayaan Ekonomi Kerakyatan',
            'email' => 'dash-stafsusekorakyat@kemenkop.go.id',
            'role' => 'unit',
            'unit_id' => '38148d65-55b0-49b1-b6cb-298080da3498',
            'password' => Hash::make('ekorakyat'),
        ]);

        User::create([
            'id' => 'cb8f0e8f-38ee-49c4-bd0d-1892b427bad5',
            'name' => 'Staff Khusus Menteri Bidang Hukum, Pengawasan Koperasi dan Pembiayaan',
            'email' => 'dash-stafsushukum@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => 'c2697249-fb7a-4e16-a496-3ba5f22d3811',
            'password' => Hash::make('hukum'),
        ]);

        User::create([
            'id' => '54964d99-1291-4142-9385-0125ea50c7d3',
            'name' => 'Staff Khusus Menteri Bidang Pemberdayaan Ekonomi Kreatif',
            'email' => 'dash-stafsuskreatif@kemenkopukm.go.id',
            'role' => 'unit',
            'unit_id' => 'fa96f051-9c02-42ca-8e8d-c60057fa2b36',
            'password' => Hash::make('kreatif'),
        ]);

        User::create([
            'id' => 'ed463264-5e72-4098-8f22-a310f70a172b',
            'name' => 'Staf Ahli Menteri Bidang Ekonomi Mikro',
            'email' => 'dash-ahliekomikro@kemenkop.go.id',
            'role' => 'unit',
            'unit_id' => '783319ff-90b7-4875-8ee2-9689cb30857c',
            'password' => Hash::make('ekomikro'),
        ]);

        User::create([
            'id' => 'fe63402a-9d12-4813-bc6f-7e66c3703ef5',
            'name' => 'Staf Ahli Menteri Bidang Produktifitas dan Daya Saing',
            'email' => 'dash-ahliprodsaing@kemenkop.go.id',
            'role' => 'unit',
            'unit_id' => '11544dda-4e8c-4dc6-81b7-a49c0349e341',
            'password' => Hash::make('prodsaing'),
        ]);

        User::create([
            'id' => '7568edfb-1db9-4020-a2f3-83919fc910aa',
            'name' => 'Staf Ahli Menteri Bidang Hubungan Antar Lembaga',
            'email' => 'dash-ahliantarlembaga@kemenkop.go.id',
            'role' => 'unit',
            'unit_id' => '5012becf-85ac-498e-ba54-200c94b150d7',
            'password' => Hash::make('antarlembaga'),
        ]);

        User::create([
            'id' => '6c16c12b-0433-475a-9007-97f91ff0a58c',
            'name' => 'Inspektur',
            'email' => 'dash-inspekturkukm@kemenkop.go.id',
            'role' => 'unit',
            'unit_id' => 'd68e7a5b-626f-41f1-8c81-753b38b5dfc4',
            'password' => Hash::make('inspekturkukm'),
        ]);
    }
}
