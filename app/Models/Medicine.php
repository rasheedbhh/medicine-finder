<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'pharmacist_id',
        'created_at',
        'updated_at'
    ];
    public function pharmacist(){
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query, $search){
        return $query->where('name', 'LIKE', '%' . $search . "%");
    }
}
