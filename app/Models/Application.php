<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const PAYMENT_TYPE_SELECT = [
        'Full Payment' => 'Full Payment',
        'Installments' => 'Installments',
    ];

    public const INSTALLMENTS_PERIOD_SELECT = [
        'Monthly'   => 'Monthly',
        'Quarterly' => 'Quarterly',
        '6 Months'  => '6 Months',
        'Annually'  => 'Annually',
    ];

    public $table = 'applications';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'form_no',
        'client_id',
        'plot_id',
        'dealer_id',
        'agent_id',
        'manager_id',
        'discount',
        'total_after_discount',
        'comments',
        'payment_type',
        'no_of_installments',
        'installments_period',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function applicationPayments()
    {
        return $this->hasMany(Payment::class, 'application_id', 'id');
    }

    public function applicationInstallments()
    {
        return $this->hasMany(Installment::class, 'application_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function plot()
    {
        return $this->belongsTo(Plot::class, 'plot_id');
    }

    public function dealer()
    {
        return $this->belongsTo(Dealer::class, 'dealer_id');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
