<?php

namespace App\Http\Controllers\API\Param;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\Param\ParticipantResource;
use App\Http\Resources\User\UserUnitResource;
use App\Models\Param;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;

class ParamController extends Controller
{
    public function execution_unit()
    {
        return $this->param('execution_unit');
    }

    public function unit()
    {
        return $this->param('unit');
    }

    public function priority_program()
    {
        return $this->param('priority_program');
    }

    public function note_unit()
    {
        $user = User::where('role', 'unit')
        ->select(
            'users.id',
            'users.name',
            'users.unit_id',
            'params.order',
            'params.param'
        )
        ->join('params', 'users.unit_id', '=', 'params.id')
        ->orderBy('order', 'asc')
        ->get();
        
        return ResponseFormatter::success(UserUnitResource::collection($user), 'success get note unit data');
    }

    public function participant(Request $request) 
    {
        $request->validate([
            'type' => ['nullable', 'in:material_preparation']
        ]);

        $participant = Participant::orderBy('group_order', 'asc')->orderBy('order', 'asc');

        if($request->type == 'material_preparation') {
            $participant->whereIn('group', ['eselon I', 'staff ahli menteri', 'staff khusus menteri', 'inspektur', 'direktur utama blu']);
        }

        $result = $participant->get();

        return ResponseFormatter::success(ParticipantResource::collection($result), 'success get participant param data');
    }

    public function padanan_data_category()
    {
        return $this->param('padanan_data_category');
    }
    
    public function padanan_data_source()
    {
        return $this->param('padanan_data_source');
    }

    public function param($category)
    {
        $param = Param::where('category', $category)->orderBy('order', 'asc')->get();
        return ResponseFormatter::success(ParamResource::collection($param), `success get {$category} data`);
    }
}
