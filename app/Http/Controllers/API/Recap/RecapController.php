<?php

namespace App\Http\Controllers\API\Recap;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Recap\RecapResource;
use App\Models\Recap;
use App\Models\Retire;
use Illuminate\Http\Request;

class RecapController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'type' => [
                'nullable',
                'in:education,group,gender,employee_status,placement,study,age'
            ]
        ]);

        $type = $request->type;
        $recap = Recap::when($type, function($query, $type) {
                $query->where('type', $type);
            })
            ->get();

        return ResponseFormatter::success(RecapResource::collection($recap), 'success get recap data');
    }

    public function update_insert(Request $request)
    {
        $request->validate([
            'recap' => ['required', 'array'],
            'recap.*.id' => ['nullable', 'exists:recaps,id'],
            'recap.*.name' => ['required_with:recap', 'string'],
            'recap.*.total' => ['required_with:recap', 'integer'],
            'recap.*.type' => [
                'required_with:recap', 
                'in:education,group,gender,employee_status,placement,study,age'
            ],
        ]);

        $recap_ids = Recap::get()->pluck('id')->toArray();
        foreach ($request->recap as $recap) {
            if(!empty($recap)) {
                $recaps = [
                    'name' => $recap['name'],
                    'total' => $recap['total'],
                    'type' => $recap['type'],
                ];

                // if id already exists
                $recap['id'] = (!empty($recap['id'])) ? $recap['id'] : 'new';
                if(in_array($recap['id'], $recap_ids)) {
                    $recap_d = Recap::find($recap['id']);
                    $recap_d->update($recaps);
                } else {
                    Recap::create($recaps);
                }
            }
            $rids[] = $recap['id'];
        }

        $except_pids = array_values(array_diff($recap_ids, $rids));
        if(!empty($except_pids)) {
            $except_recap = Recap::whereIn('id', $except_pids);
            $except_recap->delete();
        }

        return ResponseFormatter::success(null, 'success update recap data');
    }

    public function recap_date()
    {
        $retire = Retire::select('updated_at')->orderBy('updated_at', 'desc')->limit(1);
        $recap_max_date = Recap::select('updated_at')
                            ->union($retire)
                            ->orderBy('updated_at', 'desc')
                            ->first();

        $result = !empty($recap_max_date->updated_at) ? $recap_max_date->updated_at : null;
        return ResponseFormatter::success($result, 'success get date in recap data');
    }
}
