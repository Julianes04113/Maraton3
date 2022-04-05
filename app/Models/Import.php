<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
        'row_quantity'
    ];
    public function todos()
    {
        return $this->hasMany(Todo::class, 'import_id','id');
    }
}
