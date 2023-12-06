<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = ["form_id", "form"];

    public function form()
    {
        return $this->belongsTo(FormTemplate::class);
    }
}
