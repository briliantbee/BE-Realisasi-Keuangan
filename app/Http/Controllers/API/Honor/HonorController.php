<?php

namespace App\Http\Controllers\API\Honor;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Honor\HonorResource;
use App\Imports\HonorImport;
use App\Models\Honor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class HonorController extends Controller
{
    public function index()
    {
        $honor = Honor::query();
        $value = $honor->sum('value');
        $realization_value = $honor->sum('realization_value');

        $result = [
            'total' => [
                'value' => $value,
                'data_target' => $honor->sum('data_target'),
                'data_input' => $honor->sum('data_input'),
                'realization_value' => $realization_value,
                'paid' => $honor->sum('paid'),
                'realization_percent' => ($value > 0) ? round($realization_value / $value * 100, 2) : 0,
            ],
            'data' => HonorResource::collection($honor->get()),
        ];
        return ResponseFormatter::success($result, 'success get honor data');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:csv,xlsx,xls'],
        ]);

        $original_name = $request->file('file')->getClientOriginalName();
        $date = Carbon::parse(Str::substr($original_name, 0, 10))->format('Y-m-d');

        DB::transaction(function() use ($request, $date) {
            DB::table('honors')->delete();

            Excel::import(new HonorImport($date), $request->file);
        });

        return ResponseFormatter::success(null, 'success import honor data');
    }
}
