<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';
    protected $fillable = [
        'title', 
        'method', 
        'action_url', 
        'submit_button_name', 
        'cancel_button'
    ];
    public function inputs()
    {
        return $this->hasMany(FormInput::class);
    }
}
