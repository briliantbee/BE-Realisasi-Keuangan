<?php

namespace App\Imports;

use App\Models\Ministry;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class MinistryImport implements ToModel, WithValidation, WithHeadingRow
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
        return new Ministry([
            'kl_id' => $row['kl_id'],
            'budget' => $row['budget'],
            'realization' => $row['realization'],
            'date' => $this->date
        ]);
    }

    public function rules(): array
    {
        return [
             '*.kl_id' => ['required', 'exists:kls,id'],
             '*.budget' => ['required', 'numeric'],
             '*.realization' => ['required', 'numeric'],
        ];
    }
}
