<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    protected $primaryKey = 'id'; // or null
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
    
    protected $guarded = [];
    protected $casts = [
        'Consts' => 'array',
        'SkillOrder' => 'array',
        'Skills' => 'array',
        'ProudMap' => 'array',
    ];
    public function build(){
        return $this->hasMany(Build::class, 'character_id', 'id');
    }
    public function weapon(){
        return $this->belongsTo(Weapon::class);
    }
}
