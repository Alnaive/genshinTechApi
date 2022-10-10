<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;
	use \Conner\Likeable\Likeable;

    protected $guarded = [];
    protected $casts = [
        'two_pcs_art' => 'array',
        'equipList' => 'json',
        'talent' => 'json',
        'talentExtraLv' => 'json',
        'party_id' => 'json',
    ];
    protected $withCount = ['likes',];

    public function character(){
        return $this->belongsTo(Character::class,'character_id','id')->withdefault();
    }
    public function weapon(){
        return $this->belongsTo(Weapon::class)->withdefault();
    }
    public function party(){
        return $this->belongsToJson(Character::class, 'party_id', 'skillDepotId')->withdefault();
    }
}
