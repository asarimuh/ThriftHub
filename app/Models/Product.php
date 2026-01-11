<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'price',
        'condition',
        'status',
    ];

    /* ======================
     | Relationships
     ====================== */

    public function seller()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function primaryImage()
    {
        return $this->hasOne(ProductImage::class)
            ->where('is_primary', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /* ======================
     | Scopes
     ====================== */

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /* ======================
     | Accessors
     ====================== */

    public function getConditionLabelAttribute(): string
    {
        return match ($this->condition) {
            'new' => 'Baru',
            'used_like_new' => 'Bekas - Seperti Baru',
            'used' => 'Bekas',
            default => 'Tidak diketahui',
        };
    }
}
