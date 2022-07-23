<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collection extends Model
{
    use HasFactory;
    protected $table = "collections";
    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cid');
    }
   
    public function creator()
    {
        return $this->belongsTo('App\Models\User', 'creator_id');
    }
    /**
     * Get the group that owns the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    /**
     * Get all of the classes for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
    /**
     * Get all of the enrolled_users for the Course
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    
}
