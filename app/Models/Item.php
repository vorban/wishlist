<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $name
 * @property float $price
 * @property string $url
 * @property string $description
 * @property int $user_id
 * @property int $buyer_id
 */
class Item extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'name',
        'price',
        'url',
        'description',
        'user_id',
        'buyer_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }
}
