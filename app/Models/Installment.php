<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Installment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'installments';

    protected $dates = [
        'due_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'application_id',
        'due_date',
        'amount',
        'comments',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function installmentPayments()
    {
        return $this->hasMany(Payment::class, 'installment_id', 'id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function getDueDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
