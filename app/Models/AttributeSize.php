<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AttributeSize extends Model
{
    use HasFactory;
    protected $fillable = [
        'attribute_size_name',
    ];
    public function variants()
    {
        return $this->hasMany(Variant::class, 'attribute_size_id');
    }
}