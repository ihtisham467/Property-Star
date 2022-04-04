<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PAYMENT_MODE_SELECT = [
        'Bank' => 'Bank',
        'Self' => 'Self',
    ];

    public const PAYMENT_MEDIUM_SELECT = [
        'Cash'   => 'Cash',
        'Cheque' => 'Cheque',
        'PO/DD'  => 'PO/DD',
    ];

    public const PAYMENT_TYPE_SELECT = [
        'Full Payment'    => 'Full Payment',
        'Down Payment'    => 'Down Payment',
        'Installment'     => 'Installment',
        'Booking Payment' => 'Booking Payment',
    ];

    public $table = 'payments';

    protected $dates = [
        'date',
        'bank_payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'application_id',
        'challan_no',
        'payment_mode',
        'date',
        'amount',
        'payment_type',
        'payment_medium',
        'bank_name',
        'bank_slip_no',
        'bank_payment_date',
        'account_no_from',
        'bank_name_to',
        'account_no_to',
        'depositor_name',
        'depositor_cnic',
        'depositor_contact',
        'cachier_name',
        'cashier_cnic',
        'created_by_id',
        'remarks',
        'installment_id',
        'cheque_no',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getBankPaymentDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBankPaymentDateAttribute($value)
    {
        $this->attributes['bank_payment_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function installment()
    {
        return $this->belongsTo(Installment::class, 'installment_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
