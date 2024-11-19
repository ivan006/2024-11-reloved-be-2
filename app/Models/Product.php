<?php

namespace App\Models;

use WizwebBe\OrmApiBaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends OrmApiBaseModel
{
    protected $table = 'products';

    public $timestamps = false;

    protected $primaryKey = 'id';

    public function parentRelationships()
    {
        return [
            'brand' => [],
            'gender' => [],
            'category' => [],
            'seller' => [],
            'buyer' => []
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
            
        ];
    }

    public function rules()
    {
        return [
            'name' => 'sometimes:required',
            'description' => 'nullable',
            'price' => 'sometimes:required',
            'image' => 'nullable',
            'purchase_date' => 'sometimes:required',
            'created_at' => 'nullable',
            'updated_at' => 'nullable',
            'brand_id' => 'sometimes:required',
            'gender_id' => 'sometimes:required',
            'category_id' => 'sometimes:required',
            'seller_id' => 'sometimes:required',
            'buyer_id' => 'sometimes:required'
        ];
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'purchase_date',
        'created_at',
        'updated_at',
        'brand_id',
        'gender_id',
        'category_id',
        'seller_id',
        'buyer_id'
    ];

        public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

        public function gender(): BelongsTo
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

        public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

        public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

        public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    

    
}