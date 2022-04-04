<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'cities';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'province_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cityUsers()
    {
        return $this->hasMany(User::class, 'city_id', 'id');
    }

    public function cityDealers()
    {
        return $this->hasMany(Dealer::class, 'city_id', 'id');
    }

    public function cityPlots()
    {
        return $this->hasMany(Plot::class, 'city_id', 'id');
    }

    public function cityClients()
    {
        return $this->hasMany(Client::class, 'city_id', 'id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
