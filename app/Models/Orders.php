<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'pharmacist_id',
        'medicine_id',
        'quantity',
        'total_price',
        'created_at',
        'updated_at'
    ];
    public function pharmacist(){
        return $this->belongsTo(User::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function Medicine(){
        return $this->belongsTo(Medicine::class);
    }
}
