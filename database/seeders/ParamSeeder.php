<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Seeder;

class ParamSeeder extends Seeder
{
    public function run()
    {
        $params = [
            ['id'=>'9913fd9b-540e-49a1-9787-e0f50e304f54','category'=>'execution_unit','param'=>'Sekretariat Kementerian'],
            ['id'=>'933a50ae-f1a5-485a-93bd-2cd5e6749114','category'=>'execution_unit','param'=>'Deputi Bidang Usaha Mikro'],
            ['id'=>'53386060-9fa2-4a56-b2fb-4350ddb75667','category'=>'execution_unit','param'=>'Deputi Bidang Kewirausahaan'],
            ['id'=>'4e28d897-aa56-444c-b863-c2485829b558','category'=>'execution_unit','param'=>'Deputi Bidang Usaha Kecil dan Menengah'],
            ['id'=>'17346c83-ba0b-472b-9627-15b387a60542','category'=>'execution_unit','param'=>'Deputi Bidang Perkoperasian'],
            ['id'=>'aa687eb2-3051-40bd-a045-4a4612951c39','category'=>'unit','param'=>'Bulan','order'=>1],
            ['id'=>'ab493e37-6f1d-4bf2-be67-784da5a94c3b','category'=>'unit','param'=>'Daerah','order'=>2],
            ['id'=>'cd6b0e05-296c-468b-94bd-a3c4e8dbfd91','category'=>'unit','param'=>'Data','order'=>3],
            ['id'=>'8813a90f-578f-429b-9e50-7340f056aecf','category'=>'unit','param'=>'Dokument','order'=>4],
            ['id'=>'7a1f37d1-86fd-4907-925b-7c48322ee031','category'=>'unit','param'=>'Kebijakan','order'=>5],
            ['id'=>'a9c26f60-7171-400d-87bc-5f539fefda5f','category'=>'unit','param'=>'Kegiatan','order'=>6],
            ['id'=>'7af0fa59-7dd9-4670-8542-8c08500bd32a','category'=>'unit','param'=>'Koperasi','order'=>7],
            ['id'=>'1d396cc5-3774-4316-9467-5ef4b590bf7e','category'=>'unit','param'=>'Laporan','order'=>8],
            ['id'=>'eb215afc-f4ed-4fdd-8937-f09975e5fb9b','category'=>'unit','param'=>'Layanan','order'=>9],
            ['id'=>'0beceebd-4db2-4f30-b855-72b7c0e2b505','category'=>'unit','param'=>'Orang','order'=>10],
            ['id'=>'5d9056d9-c89b-4090-8756-fbe4d64d58e4','category'=>'unit','param'=>'Paket','order'=>11],
            ['id'=>'0c8b63ef-d525-4077-afa7-0e57786c24ca','category'=>'unit','param'=>'UKM','order'=>12],
            ['id'=>'c559df1d-8bea-46fc-a0fa-69dd6b8ce92c','category'=>'unit','param'=>'Unit','order'=>13],
            ['id'=>'23cb99f9-4ab5-47fa-aec3-ab0f220c4c33','category'=>'unit','param'=>'Wirausaha','order'=>14],
            ['id'=>'5b897bde-7568-4edc-9474-73a347fef909','category'=>'priority_program','param'=>'Pendataan Lengkap KUMKM','order'=>1],
            ['id'=>'f39107b3-fb4f-41f8-b4d2-d015d3a9b12e','category'=>'priority_program','param'=>'Rumah Produksi Bersama','order'=>2],
            ['id'=>'064bc197-c553-41a2-aa90-7d1e9d6899b3','category'=>'priority_program','param'=>'Pengembangan Kewirausahaan Nasional','order'=>3],
            ['id'=>'a8f705cb-faf3-4162-ba40-ae1b698c5ef6','category'=>'priority_program','param'=>'Koperasi Modern','order'=>4],
            ['id'=>'6c7b3ba2-433d-46fd-9876-55aedc84f2c0','category'=>'priority_program','param'=>'Pengentasan Kemiskinan Ekstrem','order'=>5],
            ['id'=>'ec6dfb1a-d01c-455d-9b85-c37b8e8d4e62','category'=>'priority_program','param'=>'Redesign PLUT-KUMKM','order'=>6],
            ['id'=>'cbb11ccc-9462-11ed-b849-00090faa0001','category'=>'priority_program','param'=>'Layanan Rumah Kemasan Bagi Pelaku UMKM','order'=>7],
            ['id'=>'680fb4d9-e1f0-45ff-8847-b0110c74c697','category'=>'note_unit','param'=>'Sekretariat Kementerian','order'=>1],
            ['id'=>'6b28e210-a003-4c9f-b9a8-ae9f5cafe718','category'=>'note_unit','param'=>'Deputi Bidang Perkoperasian','order'=>2],
            ['id'=>'a10e0090-adb1-4b9f-a5b9-02233f346af9','category'=>'note_unit','param'=>'Deputi Bidang Usaha Mikro','order'=>3],
            ['id'=>'66d0e8ec-11c9-4dae-b5bc-124fa2a1caa0','category'=>'note_unit','param'=>'Deputi Bidang Usaha Kecil dan Menengah','order'=>4],
            ['id'=>'7304ec3b-8117-4de3-b0af-742fdca64d31','category'=>'note_unit','param'=>'Deputi Bidang Kewirausahaan','order'=>5],
            ['id'=>'38148d65-55b0-49b1-b6cb-298080da3498','category'=>'note_unit','param'=>'Staff Khusus Menteri Bidang Pemberdayaan Ekonomi Kerakyatan','order'=>6],
            ['id'=>'c2697249-fb7a-4e16-a496-3ba5f22d3811','category'=>'note_unit','param'=>'Staff Khusus Menteri Bidang Hukum, Pengawasan Koperasi dan Pembiayaan','order'=>7],
            ['id'=>'fa96f051-9c02-42ca-8e8d-c60057fa2b36','category'=>'note_unit','param'=>'Staff Khusus Menteri Bidang Pemberdayaan Ekonomi Kreatif','order'=>8],
            ['id'=>'783319ff-90b7-4875-8ee2-9689cb30857c','category'=>'note_unit','param'=>'Staf Ahli Menteri Bidang Ekonomi Mikro','order'=>9],
            ['id'=>'11544dda-4e8c-4dc6-81b7-a49c0349e341','category'=>'note_unit','param'=>'Staf Ahli Menteri Bidang Produktifitas dan Daya Saing','order'=>10],
            ['id'=>'5012becf-85ac-498e-ba54-200c94b150d7','category'=>'note_unit','param'=>'Staf Ahli Menteri Bidang Hubungan Antar Lembaga','order'=>11],
            ['id'=>'d68e7a5b-626f-41f1-8c81-753b38b5dfc4','category'=>'note_unit','param'=>'Inspektur','order'=>12],
            ['id'=>'3d1d59a9-b089-4c2c-b115-a91d846c8bad','category'=>'note_unit','param'=>'Direktur Utama LPDB KUMKM','order'=>13],
            ['id'=>'13ffd22c-de5e-4964-a7d5-c1cb4191aee2','category'=>'note_unit','param'=>'Direktur Utama LLP KUKM','order'=>14],
        ];

        foreach ($params as $p) {
            Param::updateOrCreate(
                ['id' => $p['id']], 
                [
                    'category' => $p['category'],
                    'param' => $p['param'],
                    'order' => $p['order'] ?? null
                ]
            );
        }
    }
}
