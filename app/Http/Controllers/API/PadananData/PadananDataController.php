<?php

namespace App\Http\Controllers\API\PadananData;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PadananDataRequest;
use App\Http\Resources\PadananData\PadananDataResource;
use App\Models\PadananData;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\map;

class PadananDataController extends Controller
{
    public function index()
    {
        $padanan_data = PadananData::orderBy('created_at', 'desc')
                                    ->get();

        return ResponseFormatter::success(
            PadananDataResource::collection($padanan_data),
            'success get all padanan data'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'segment' => ['required', 'unique:padanan_data,segment'],
            'category_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    $query->where('category', 'padanan_data_category');
                })
            ],
            'data_source_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    $query->where('category', 'padanan_data_source');
                })
            ],
            'non_jkn' => ['nullable', 'integer'],
            'jkn' => ['nullable', 'integer'],
            'active_jkn' => ['nullable', 'integer'],
            'not_active_jkn' => ['nullable', 'integer'],
        ]);

        $input = $request->all();
        $padanan_data = PadananData::create($input);

        return ResponseFormatter::success(
            new PadananDataResource($padanan_data),
            'success create padanan data'
        );
    }

    public function show(PadananData $padanan_data)
    {
        return ResponseFormatter::success(
            new PadananDataResource($padanan_data),
            'success show padanan data'
        );
    }

    public function update(Request $request, PadananData $padanan_data)
    {
        $request->validate([
            'segment' => ['required', 'unique:padanan_data,segment,' . $padanan_data->id],
            'category_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    $query->where('category', 'padanan_data_category');
                })
            ],
            'data_source_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    $query->where('category', 'padanan_data_source');
                })
            ],
            'non_jkn' => ['nullable', 'integer'],
            'jkn' => ['nullable', 'integer'],
            'active_jkn' => ['nullable', 'integer'],
            'not_active_jkn' => ['nullable', 'integer'],
        ]);

        $input = $request->all();
        $padanan_data->update($input);

        return ResponseFormatter::success(
            new PadananDataResource($padanan_data),
            'success update padanan data'
        );
    }

    public function destroy(PadananData $padanan_data)
    {
        $padanan_data->delete();

        return ResponseFormatter::success(
            null,
            'success delete padanan data'
        );
    }
}
