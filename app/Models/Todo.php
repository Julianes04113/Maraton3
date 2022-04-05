<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'import_id'
    ];

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function import()
    {
        return $this->BelongsTo(ImportReport::class,'import_id','id');
    }

}
