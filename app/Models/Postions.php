<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postions extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function status()
    {
        return $this->is_active == '1' ? '<label class="badge badge-success" style="font-size:15px">Active</label>' : '<label class="badge badge-warning" style="font-size:15px">InActive</label>';
    }

}
