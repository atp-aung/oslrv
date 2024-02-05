<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name', 'address', 'deli_status',
    ];

    protected $casts = [
        'deli_status' => 'boolean',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Set default values
        $this->attributes['deli_status'] = false;
    }

    public function orderItems()
{
return $this->hasMany('App\Models\OrderItem');
}
}
