<?php

namespace App\Http\Controllers\API\Recap;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Recap\RetireResource;
use App\Models\Retire;
use Illuminate\Http\Request;

class RetireController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
        ]);

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $retires = Retire::when($start_date, function ($query, $start_date) {
                        $query->whereDate('date', '>=', $start_date);
                    })
                    ->when($end_date, function ($query, $end_date) {
                        $query->whereDate('date', '<=', $end_date);
                    })
                    ->get();

        $attrs = [];
        foreach($retires as $retire){
            $attrs[$retire->date][] = [
                'id' => $retire['id'],
                'name' => $retire['name'],
                'unit' => $retire['unit'],
            ];
        }

        $results = [];
        foreach($attrs as $key => $value) {
            $results[] = [
                'date' => $key,
                'employee' => $value,
            ];
        }
        return ResponseFormatter::success($results, 'success get retire data');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required_with:retire', 'string'],
            'unit' => ['required_with:retire', 'string'],
            'date' => ['required_with:retire', 'date'],
        ]);

        $input = $request->all();
        $retire = Retire::create($input);

        return ResponseFormatter::success(new RetireResource($retire), 'success create retire data');
    }

    public function show(Retire $retire)
    {
        return ResponseFormatter::success(new RetireResource($retire), 'success get retire data');
    }

    public function update(Request $request, Retire $retire)
    {
        $request->validate([
            'name' => ['required_with:retire', 'string'],
            'unit' => ['required_with:retire', 'string'],
            'date' => ['required_with:retire', 'date'],
        ]);

        $input = $request->all();
        $retire->update($input);

        return ResponseFormatter::success(new RetireResource($retire), 'success update retire data');
    }

    public function destroy(Retire $retire)
    {
        $retire->delete();

        return ResponseFormatter::success(null, 'success delete retire data');
    }
}
