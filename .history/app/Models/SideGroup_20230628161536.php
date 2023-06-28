<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SideGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'erp_code',
        'main_erp_code',
        'main_group_name'
    ];
}
