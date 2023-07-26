<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    use HasFactory;
    protected $table = 'tickets';
    protected $fillable = ['id', 'image', 'subject', 'content', 'owner_id', 're_id', 'date'];
    public $timestamps = false;
}
