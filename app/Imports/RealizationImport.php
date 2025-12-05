<?php

namespace App\Imports;

use App\Models\Realization;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RealizationImport implements ToModel, WithValidation, WithStartRow
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
        return new Realization([
            'code' => $row[0],
            'budget' => $row[1],
            'aa' => $row[2],
            'budget_aa' => $row[3],
            'realization_spp' => $row[4],
            'sp2d' => $row[5],
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
             '*.0' => ['required', 'exists:units,code'],
             '*.1' => ['required', 'numeric'],
             '*.2' => ['required', 'numeric'],
             '*.3' => ['required', 'numeric'],
             '*.4' => ['required', 'numeric'],
             '*.5' => ['required', 'numeric'],
        ];
    }
}
