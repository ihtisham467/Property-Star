<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plot extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PLOT_TYPE_SELECT = [
        'Residential' => 'Residential',
        'Commercial'  => 'Commercial',
        'Farm House'  => 'Farm House',
        'Other'       => 'Other',
    ];

    public const SIZE_SELECT = [
        '3 Marla'  => '3 Marla',
        '7 Marla'  => '7 Marla',
        '8 Marla'  => '8 Marla',
        '10 Marla' => '10 Marla',
        '12 Marla' => '12 Marla',
        '1 Kanal'  => '1 Kanal',
        '2 Kanal'  => '2 Kanal',
    ];

    public $table = 'plots';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'plotid',
        'latitude',
        'longitude',
        'area',
        'sector',
        'block',
        'city_id',
        'plot_type',
        'plot_type_other',
        'size',
        'boulevard',
        'main_road',
        'facing_park',
        'corner',
        'twoor_more_sides_open',
        'prefred_choice',
        'price_per_marla',
        'total_price',
        'land_charges',
        'development_charges',
        'comments',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function plotApplications()
    {
        return $this->hasMany(Application::class, 'plot_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
