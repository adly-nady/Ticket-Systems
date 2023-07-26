<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply_tickets extends Model
{
    use HasFactory;
    protected $table = 'reply_tickets';
    protected $fillable = ['id', 'image', 'content', 'id_ticket', 'id_user'];
    public $timestamps = false;
}
