<?php

namespace App\Exports;

use App\Models\OrderProduct;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class ServicesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return $orderitems = DB::table('products')->join('order_products', 'products.id', '=', 'order_products.product_id')
            ->selectRaw('products.name, sum(order_products.quantity) as quantity_sold, sum(order_products.price) as total_cost')
            ->groupBy(['products.name'])
            ->orderByDesc('quantity_sold')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Service',
            'Samples per assay',
            'Total cost(USD)',
        ];
    }
}
