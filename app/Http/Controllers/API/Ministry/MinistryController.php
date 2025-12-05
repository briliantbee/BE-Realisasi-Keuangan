<?php

namespace App\Http\Controllers\API\Ministry;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ministry\MinistryResource;
use App\Imports\MinistryImport;
use App\Models\Ministry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

class MinistryController extends Controller
{
    public function index(Request $request)
    {
        $minstry = Ministry::whereHas('kl', function($query) {
            $query->orderBy('order', 'asc');
        })->get();
        return ResponseFormatter::success(MinistryResource::collection($minstry), 'success get ministry data');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => ['required', 'mimes:csv,xlsx,xls'],
        ]);

        $original_name = $request->file('file')->getClientOriginalName();
        $date = Carbon::parse(Str::substr($original_name, 0, 10))->format('Y-m-d');

        DB::transaction(function() use ($request, $date) {
            DB::table('ministries')->delete();

            Excel::import(new MinistryImport($date), $request->file);
        });
        return ResponseFormatter::success(null, 'success import ministry data');

        // try {
        // } catch (ValidationException $e) {
        //     return $failures = $e->failures();

        //     foreach ($failures as $failure) {
        //         $errors[] = [
        //             'row' => $failure->row(),
        //             'attribute' => $failure->attribute(),
        //             'errors' => $failure->errors(),
        //         ];
        //     }
        // } 
    }
}
