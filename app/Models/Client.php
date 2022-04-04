<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Client extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'clients';

    protected $appends = [
        'picture',
        'cnic_pic',
        'signature',
        'thumb',
    ];

    protected $dates = [
        'date_of_membership',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'clientid',
        'membership_no',
        'date_of_membership',
        'name',
        'cnic_nicop_no',
        'passport_no',
        'father_name',
        'profession',
        'spouse_name',
        'spouse_profession',
        'education',
        'nationality',
        'religion',
        'resident_villa_no',
        'street_no',
        'sector',
        'city_id',
        'date_of_birth',
        'marital_status',
        'present_address',
        'office_contact',
        'home_contact',
        'phone',
        'fax',
        'email',
        'permanent_address',
        'domicile',
        'next_of_kin',
        'relation_kin',
        'cnic_ni_cop_kin_no',
        'passport_no_kin',
        'referred_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function clientApplications()
    {
        return $this->hasMany(Application::class, 'client_id', 'id');
    }

    public function getDateOfMembershipAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfMembershipAttribute($value)
    {
        $this->attributes['date_of_membership'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getPictureAttribute()
    {
        $file = $this->getMedia('picture')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getCnicPicAttribute()
    {
        $file = $this->getMedia('cnic_pic')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getSignatureAttribute()
    {
        $file = $this->getMedia('signature')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getThumbAttribute()
    {
        $file = $this->getMedia('thumb')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
