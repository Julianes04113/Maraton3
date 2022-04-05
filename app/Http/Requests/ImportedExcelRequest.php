<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportedExcelRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'file' => 'required|file|mimes:csv,xlsx|max:1024'
        ];
    }
}
