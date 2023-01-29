<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $guarded = ['id'];

    public function pesanan(){
        return $this->hasMany(Pesanan::class, 'id', 'menu_id');
    }
}
