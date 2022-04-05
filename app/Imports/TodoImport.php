<?php

namespace App\Imports;

use App\Constants\TodoStatus;
use App\Models\Todo;
use App\Rules\TodoRules;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Models\Import;

class TodoImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    private $rows = 0;
    private Import $import;
    public function __construct(Import $import){
        $this->import=$import;
    }
    public function model(array $row)
    {
        ++$this->rows;
//        dump($row);
        return new Todo([

            'title'     => $row['title'],
            'description'    => $row['description'],
            'status' => $row['status'],
            'import_id'=>$this->import->id,
        ]);
    }
    public function rules(): array
    {
       return array_merge(
           TodoRules::toArray(),
           [
               'status' => [
                   'required',
                   Rule::in(
                       (new TodoStatus())->toArray()
                   )
               ]
           ]
       );
    }


    public function getRowCount(): int
    {
        return $this->rows;
    }
}
