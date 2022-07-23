<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    /**
     * Get the category that owns the Webinar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'order_id');
    }
    /**
     * Get the owner that owns the Webinar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    /**
     * Get all of the enrolled_users for the Mentoring
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordered_users(): HasMany
    {
        return $this->belongsTo(User::class, 'orduser_id');
    }
}
