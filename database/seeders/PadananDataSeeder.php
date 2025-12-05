<?php

namespace Database\Seeders;

use App\Models\Param;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PadananDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Param::create( [
            'id'=>'e1393774-fab7-464a-824d-0e5a3277a673',
            'category'=>'padanan_data_category',
            'param'=>'Entitas',
        ]);
    
        Param::create( [
            'id'=>'829ead12-19ff-480b-85ac-51760e76b944',
            'category'=>'padanan_data_category',
            'param'=>'Perorangan',
        ]);

        Param::create( [
            'id'=>'f8ed7e3e-f701-4cb9-9d13-4a072f68c2ba',
            'category'=>'padanan_data_source',
            'param'=>'ODS Koperasi',
        ]);
        
        Param::create( [
            'id'=>'fbc6356c-df6f-48ca-ba93-610c140a4296',
            'category'=>'padanan_data_source',
            'param'=>'ODS UMKM',
        ]);

        Param::create( [
            'id'=>'ae792e49-4b76-43b6-8453-4e58c7e086a0',
            'category'=>'padanan_data_source',
            'param'=>'EMonev DAK',
        ]);

        Param::create( [
            'id'=>'9f22885d-a09c-434a-bca0-1d3f42d84b17',
            'category'=>'padanan_data_source',
            'param'=>'Bagian SDMA',
        ]);
    }
}
