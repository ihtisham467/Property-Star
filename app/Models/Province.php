<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'provinces';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'country_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function provinceCities()
    {
        return $this->hasMany(City::class, 'province_id', 'id');
    }

    public function provinceUsers()
    {
        return $this->hasMany(User::class, 'province_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
