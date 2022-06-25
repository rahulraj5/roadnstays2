<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ExtraOption extends Model
{
    use HasFactory;

    protected $table = 'room_extra_option';

    public $fillable = ['ext_opt_name', 'ext_opt_price', 'ext_opt_type'];
}



