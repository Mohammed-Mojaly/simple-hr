<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->status == '1' ? '<label class="badge badge-success" style="font-size:15px">Approved</label>' : '<label class="badge badge-warning" style="font-size:15px">Unapproved</label>';
    }
}
