<?php

namespace App\Exports;

use App\Models\OrderDate;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return OrderDate::all('order_numbered', 'ordercreated_date', 'accept_date', 'budget_date', 'invoice_date', 'service_date', 'signedservi_date', 'payment_date', 'paymentone_date', 'ordercomplete_date');
    }

    public function headings(): array
    {
        return [
            'Order Number',
            'Placed On',
            'Accepted On',
            'Budget Upload On',
            'Invoice Upload On',
            'Service Specification Upload On',
            'Signed Service Specification Upload On',
            'First Payment Upload On',
            'Second Payment Upload On',
            'Order Completed On',
        ];
    }
}
