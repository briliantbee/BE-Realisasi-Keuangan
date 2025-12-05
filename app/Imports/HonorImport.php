<?php

namespace App\Imports;

use App\Models\Honor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class HonorImport implements ToModel, WithValidation, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $date;

    public function __construct($date)
    {
        $this->date = $date;    
    }

    public function model(array $row)
    {
        return new Honor([
            'satker_code' => $row[0],
            'value' => $row[1],
            'data_target' => $row[2],
            'data_input' => $row[3],
            'realization_value' => $row[4],
            'paid' => $row[5],
            'date' => $this->date,
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
             '*.0' => ['required', 'exists:provinces,satker_code'],
             '*.1' => ['required', 'numeric'],
             '*.2' => ['required', 'numeric'],
             '*.3' => ['required', 'numeric'],
             '*.4' => ['required', 'numeric'],
             '*.5' => ['required', 'numeric'],
        ];
    }
}
