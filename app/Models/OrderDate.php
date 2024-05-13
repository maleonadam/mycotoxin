<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDate extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'order_numbered', 'ordercreated_date', 'accept_date', 'budget_date', 'invoice_date', 'service_date', 'signedservi_date', 'payment_date', 'paymentone_date', 'ordercomplete_date'];
}
