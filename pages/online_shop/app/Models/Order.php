<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasOne(Address::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
