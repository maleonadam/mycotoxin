<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ServicesExport;
use DB;

class OrderProductController extends Controller
{

    public function index()
    {
        $products = Product::join('order_products', 'products.id', '=', 'order_products.product_id')
            ->selectRaw('products.name, sum(order_products.quantity) as quantity_sold')
            ->groupBy(['products.name'])
            ->orderByDesc('quantity_sold')
            ->take(5)
            ->get();

        $products = json_decode(json_encode($products), true);

        return view('manage.products.mostselling', compact('products'));
    }

    public function allItems()
    {
        $orderitems = Product::join('order_products', 'products.id', '=', 'order_products.product_id')
            ->selectRaw('products.name, sum(order_products.quantity) as quantity_sold, sum(order_products.price) as total_cost')
            ->groupBy(['products.name'])
            ->orderByDesc('quantity_sold')
            ->get();
        return view('manage.order_items.orderitems_report', compact('orderitems'));
    }

    public function exportServicesReport()
    {
        return Excel::download(new ServicesExport(), 'ServicesReport.xlsx');
    }

    public function checkReport(Request $request)
    {
        if ($request->date) {
            $date = date('Y-m-d', strtotime($request->date));
            $orderitems = Product::join('order_products', 'products.id', '=', 'order_products.product_id')
                ->where(DB::raw("(DATE_FORMAT(order_products.created_at,'%Y-%m-%d'))"), $date)
                ->selectRaw('products.name, sum(order_products.quantity) as quantity_sold, sum(order_products.price) as total_cost')
                ->groupBy(['products.name'])
                ->orderByDesc('quantity_sold')
                ->get();
            return view('manage.order_items.orderitems_report', compact('orderitems'));
        } else if ($request->month) {
            $orderitems = Product::join('order_products', 'products.id', '=', 'order_products.product_id')
                ->where(DB::raw("(DATE_FORMAT(order_products.created_at,'%m-%Y'))"), $request->month)
                ->selectRaw('products.name, sum(order_products.quantity) as quantity_sold, sum(order_products.price) as total_cost')
                ->groupBy(['products.name'])
                ->orderByDesc('quantity_sold')
                ->get();
            return view('manage.order_items.orderitems_report', compact('orderitems'));
        } else {
            $orderitems = Product::join('order_products', 'products.id', '=', 'order_products.product_id')
                ->where(DB::raw("(DATE_FORMAT(order_products.created_at,'%Y'))"), $request->year)
                ->selectRaw('products.name, sum(order_products.quantity) as quantity_sold, sum(order_products.price) as total_cost')
                ->groupBy(['products.name'])
                ->orderByDesc('quantity_sold')
                ->get();
            return view('manage.order_items.orderitems_report', compact('orderitems'));
        }
    }
}
