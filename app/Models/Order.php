<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    /**
     * Get the user that owns the EnrolledCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     /**
     * Get the course that owns the EnrolledCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    /**
     * Get the course that owns the EnrolledCourse
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
}
