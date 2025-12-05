<?php

namespace App\Http\Controllers\API\PriorityScale;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\PriorityScale;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsSuccessful;

class PriorityScaleController extends Controller
{
    public function index() {
        $priority_scale = PriorityScale::where('type', 'used_clothes')->first();
        return ResponseFormatter::success($priority_scale, 'success get priority scale data');
    }

    public function upsert(Request $request) {
        $request->validate([
            'role_umkm' => ['nullable', 'array'],
            'role_umkm.total' => ['required_with:role_umkm', 'numeric'],
            'role_umkm.year' => ['required_with:role_umkm', 'numeric'],

            'total_industry' => ['nullable', 'array'],
            'total_industry.*.total' => ['required_with:total_industry', 'numeric'],
            'total_industry.*.year' => ['required_with:total_industry', 'numeric'],

            'unrecorded_import_1' => ['nullable', 'array'],
            'unrecorded_import_1.*.year' => ['required_with:unrecorded_import_1'],
            'unrecorded_import_1.*.krt' => ['required_with:unrecorded_import_1'],
            'unrecorded_import_1.*.pdb' => ['required_with:unrecorded_import_1'],
            'unrecorded_import_1.*.tpt_total' => ['required_with:unrecorded_import_1'],
            'unrecorded_import_1.*.tpt_china' => ['required_with:unrecorded_import_1'],

            'unrecorded_import_2'  => ['nullable', 'array'],
            'unrecorded_import_2.*.year'  => ['required_with:unrecorded_import_2'],
            'unrecorded_import_2.*.net_production'  => ['required_with:unrecorded_import_2'],
            'unrecorded_import_2.*.unrecorded_potential'  => ['required_with:unrecorded_import_2'],
            'unrecorded_import_2.*.import_tpt'  => ['required_with:unrecorded_import_2'],

            'complaint' => ['nullable', 'array'],
            'complaint.period' =>  ['required_with:complaint'],
            'complaint.verified_report' =>  ['required_with:complaint'],
            'complaint.not_verified_report' =>  ['required_with:complaint'],
            'complaint.male' =>  ['required_with:complaint'],
            'complaint.female' =>  ['required_with:complaint'],
            'complaint.sd' =>  ['required_with:complaint'],
            'complaint.smp' =>  ['required_with:complaint'],
            'complaint.sma' =>  ['required_with:complaint'],
            'complaint.smk' =>  ['required_with:complaint'],
            'complaint.d3' =>  ['required_with:complaint'],
            'complaint.s1' =>  ['required_with:complaint'],
            'complaint.province.*.name' =>  ['required_with:complaint'],
            'complaint.province.*.total' =>  ['required_with:complaint'],
            'complaint.snippet.*.title' =>  ['required_with:complaint'],
            'complaint.snippet.*.total' =>  ['required_with:complaint'],
            'complaint.snippet.*.sentiment' =>  ['required_with:complaint'],

            'kur_bri_shoe' => ['nullable', 'array'],
            'kur_bri_shoe.*.total' => ['required_with:kur_bri_shoe', 'numeric'],
            'kur_bri_shoe.*.year' => ['required_with:kur_bri_shoe', 'numeric'],
            'kur_bri_shoe.*.deb' => ['required_with:kur_bri_shoe', 'numeric'],

            'kur_bri_clothes' => ['nullable', 'array'],
            'kur_bri_clothes.*.total' => ['required_with:kur_bri_clothes', 'numeric'],
            'kur_bri_clothes.*.year' => ['required_with:kur_bri_clothes', 'numeric'],
            'kur_bri_clothes.*.deb' => ['required_with:kur_bri_clothes', 'numeric'],

            'kur_bri_garmen' => ['nullable', 'array'],
            'kur_bri_garmen.*.total' => ['required_with:kur_bri_garmen', 'numeric'],
            'kur_bri_garmen.*.year' => ['required_with:kur_bri_garmen', 'numeric'],
            'kur_bri_garmen.*.deb' => ['required_with:kur_bri_garmen', 'numeric'],

        ]);
        
        $input = $request->all();
        $data_endcode = json_encode($input);
        
        if(PriorityScale::count() < 1) {
            PriorityScale::create([ 
                'type' => 'used_clothes',
                'data' => $data_endcode
            ]);
        } else {
            PriorityScale::where('type', 'used_clothes')->first()->update([
                'data' => $data_endcode
            ]);
        }

        return ResponseFormatter::success($input, 'success upsert priority scale data');
    }
}
