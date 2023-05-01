<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function district_data(){
        return $this->belongsTo(District::class,'district');
    }

    public function thana_data(){
        return $this->belongsTo(Thana::class,'area');
    }
}
