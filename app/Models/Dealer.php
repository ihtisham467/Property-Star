<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dealer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'dealers';

    protected $dates = [
        'dob',
        'doj',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'father_name',
        'phone',
        'cnic',
        'city_id',
        'dob',
        'doj',
        'gender',
        'referred_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function dealerApplications()
    {
        return $this->hasMany(Application::class, 'dealer_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDojAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDojAttribute($value)
    {
        $this->attributes['doj'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
