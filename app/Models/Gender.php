<?php

namespace App\Models;

use WizwebBe\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Gender extends OrmApiBaseModel
{
    protected $table = 'genders';

    public $timestamps = false;

    protected $primaryKey = 'id';

    public function parentRelationships()
    {
        return [
            
        ];
    }

    public function spouseRelationships()
    {
        return [
            
        ];
    }

    public function childRelationships()
    {
        return [
            'products' => []
        ];
    }

    public function rules()
    {
        return [
            'name' => 'sometimes:required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ];
    }

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    

        public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'gender_id');
    }

    
}