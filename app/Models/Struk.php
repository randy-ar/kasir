<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    use HasFactory;
    protected $guarded = '';
    public function barang()
    {
        return $this->belongsToMany(Barang::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
