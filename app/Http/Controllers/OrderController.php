<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\OrderProduct;
use App\Models\OrderDate;
use App\Mail\OrderStatusChange;
use App\Mail\OrderRejected;
use App\Mail\BudgetUploaded;
use App\Mail\InvoiceUploaded;
use App\Mail\PaymentUploaded;
use App\Mail\ServiceUploaded;
use App\Mail\SignedServiceUploaded;
use App\Mail\ResultsUploaded;
use Illuminate\Support\Facades\Storage;
use Mail;
use Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use App\Http\Requests\BudgetUploadRequest;

class OrderController extends Controller
{
    // authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    // my orders
    public function index()
    {
        $orders = Auth::user()->orders()->orderBy('created_at', 'desc')->paginate(20);

        $products = Product::orderBy('created_at', 'ASC')->get();

        return view('manage.orders.my-orders.index', compact('orders', 'products'));
    }

    public function viewOrdersChart()
    {
        $current_month_orders = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->count();
        $last_month_orders = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(1)->endOfMonth())->count();
        $last_month_but_one_orders = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(2)->endOfMonth())->count();
        $last_month_but_two_orders = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(3)->endOfMonth())->count();
        $last_month_but_three_orders = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(4)->endOfMonth())->count();
        $last_month_but_four_orders = Order::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->startOfMonth()->subMonth(5)->endOfMonth())->count();
        return view('manage.orders.ordersChart', compact(['current_month_orders', 'last_month_orders', 'last_month_but_one_orders', 'last_month_but_two_orders', 'last_month_but_three_orders', 'last_month_but_four_orders']));
    }

    public function viewOrdersReport()
    {
        $order_dates = OrderDate::orderBy('created_at', 'desc')->paginate(20);
        return view('manage.orders.ordersReports', compact('order_dates'));
    }

    public function exportOrdersReport()
    {
        return Excel::download(new OrdersExport(), 'OrderReport.xlsx');
    }

    // all orders
    public function allorders()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(20);

        $products = Product::orderBy('created_at', 'ASC')->get();

        return view('manage.orders.all-orders.index', compact('orders', 'products'));
    }

    // client view single order
    public function clientViewSingleOrder($id)
    {
        $order = Order::findOrFail($id);

        $order_products = OrderProduct::where('order_id', $id)->get();

        $products = Product::join('order_products', 'products.id', '=', 'order_products.product_id');

        return view('manage.orders.my-orders.show', compact(['order', 'order_products', 'products']));
    }

    // staff view single order
    public function staffViewSingleOrder($id)
    {
        $order = Order::findOrFail($id);

        $order_products = OrderProduct::where('order_id', $id)->get();

        $products = Product::join('order_products', 'products.id', '=', 'order_products.product_id');

        return view('manage.orders.all-orders.show', compact(['order', 'order_products', 'products']));
    }

    // get order status page
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        $order_products = OrderProduct::where('order_id', $id)->get();
        foreach ($order_products as $order_product) {
            if ($order_product->item_status != 4) {
                Session::flash('error', 'Processing of some order items not complete!');
                return back();
            }
        }

        return view('manage.orders.all-orders.edit', compact('order'));
    }

    // get order accept/reject page
    public function getReject($id)
    {
        $order = Order::findOrFail($id);
        return view('manage.orders.all-orders.accept_reject_order', compact('order'));
    }

    // update order status
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->order_status_id = $request->order_status_id;

        $order->save();

        // send mail
        // if ($order->order_status_id === 4) {
        //     Mail::send(new OrderCompleted($order)); 
        // }else{
        //     Mail::send(new OrderStatusChange($order));
        // }
        $order_dates = OrderDate::where('order_id', $id)->get();
        if ($order->order_status_id = 4) {
            foreach ($order_dates as $order_date) {
                $order_date->ordercomplete_date = $order->updated_at;
                $order_date->save();
            }
        }

        Session::flash('success-message', 'Order updated successfully...');
        return redirect()->route('all-orders.index');
    }

    // reject order
    public function rejectOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->accept_order = $request->accept_order;
        $order->reject_reason = $request->input('reject_reason');

        $order->save();
        // dd($order->updated_at);

        // add into order_dates table
        $order_dates = OrderDate::where('order_id', $id)->get();
        foreach ($order_dates as $order_date) {
            $order_date->accept_date = $order->updated_at;
            $order_date->save();
        }

        // if ($order->accept_order == 2) {
        // send mail
        // Mail::send(new OrderRejected($order));
        //}
        // send mail
        // Mail::send(new OrderRejected($order));

        // Session::flash('error', 'Order has been rejected!!!');
        return redirect()->route('all-orders.index');
    }

    public function editItemStatus($id)
    {
        $order_product = OrderProduct::findOrFail($id);
        return view('manage.order_items.item_status', compact('order_product'));
    }

    public function updateItemStatus(Request $request, $id)
    {
        $order_product = OrderProduct::findOrFail($id);

        $order_product->item_status = $request->input('item_status');

        $order_product->save();

        Session::flash('success-message', 'Status updated successfully...');
        return back();
    }

    public function itemResult($id)
    {
        $order_product = OrderProduct::findOrFail($id);
        $order = Order::where('id', $order_product->order_id)->get();
        // dd($order);
        if (is_null($order[0]->payment_proof)) {
            Session::flash('error', 'Payment confirmation not provided!');
            return back();
        }

        return view('manage.order_items.item_result', compact('order_product'));
    }

    public function itemRawdata($id)
    {
        $order_product = OrderProduct::findOrFail($id);
        if (is_null($order_product->item_result)) {
            Session::flash('error', 'Upload test report first!');
            return back();
        }
        return view('manage.order_items.item_rawdata', compact('order_product'));
    }

    public function uploadItemResult(Request $request, $id)
    {
        $order_product = OrderProduct::findOrFail($id);

        $request->validate([
            'item_result' => 'required|mimes:pdf',
        ]);

        $fileName = $request->item_result->getClientOriginalName();

        // if ($order_product->item_result) {
        //     Storage::delete('/public/docs/products/'.$order_product->item_result);
        // }

        $request->item_result->move('storage/itemresult', $fileName);

        $order_product->item_result = $fileName;
        //}

        $order_product->save();

        // send mail
        // Mail::send(new ResultsUploaded($order));

        Session::flash('success-message', 'Results uploaded successfully...');
        return back();
    }

    public function uploadItemRawdata(Request $request, $id)
    {
        $order_product = OrderProduct::findOrFail($id);

        $request->validate([
            'item_rawdata' => 'required|mimes:xlx,xlsx|max:2048',
        ]);

        // $fileName=time().'.'.$request->item_rawdata->extension();
        $fileName = $request->item_rawdata->getClientOriginalName();

        $request->item_rawdata->move('storage/itemrawdata', $fileName);

        $order_product->item_rawdata = $fileName;

        $order_product->save();

        // send mail
        // Mail::send(new RawdataUploaded($order));

        Session::flash('success-message', 'Raw Data uploaded successfully...');
        return back();
    }

    // download item results
    public function downloadItemResult($item_result)
    {
        return response()->download('storage/itemresult/' . $item_result);
    }

    public function downloadItemRawdata($item_rawdata)
    {
        return response()->download('storage/itemrawdata/' . $item_rawdata);
    }

    // delete order
    public function destroy(Order $order)
    {
        //
    }

    // upload budget page
    public function budget($id)
    {
        $order = Order::findOrFail($id);

        if ($order->accept_order === 0) {
            Session::flash('error', 'Accept order first!');
            return back();
        }

        return view('manage.orders.all-orders.budget', compact('order'));
    }

    // upload invoice page
    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        if (is_null($order->budget)) {
            Session::flash('error', 'Upload budget first!');
            return back();
        }
        return view('manage.orders.all-orders.invoice', compact('order'));
    }

    // upload payment page
    public function payment($id)
    {
        $order = Order::findOrFail($id);

        return view('manage.orders.my-orders.payment', compact('order'));
    }

    // upload payment page
    public function paymentone($id)
    {
        $order = Order::findOrFail($id);

        return view('manage.orders.my-orders.payment_one', compact('order'));
    }

    // upload service page
    public function service($id)
    {
        $order = Order::findOrFail($id);

        return view('manage.orders.all-orders.service_specification', compact('order'));
    }

    // upload signed_service page
    public function signed($id)
    {
        $order = Order::findOrFail($id);

        return view('manage.orders.my-orders.signed_service_speci', compact('order'));
    }

    // upload order budget
    public function uploadBudget(BudgetUploadRequest $request, $id)
    {
        $order = Order::findOrFail($id);

        if ($request->hasFile('budget')) {

            $filename = $request->budget->getClientOriginalName();

            if ($order->budget) {
                Storage::delete('/public/orders/budgets/' . $order->budget);
            }

            $request->budget->storeAs('orders/budgets/', $filename, 'public');

            $order->budget = $filename;

            $order->staff_id = Auth::user()->id;

            $order->save();

            // send mail
            // Mail::send(new BudgetUploaded($order));

            $order_dates = OrderDate::where('order_id', $id)->get();
            foreach ($order_dates as $order_date) {
                $order_date->budget_date = $order->updated_at;
                $order_date->save();
            }

            Session::flash('success-message', 'Budget uploaded successfully...');
            return redirect()->route('all-orders.index');
        }

        Session::flash('success-message', 'Budget not uploaded!');
        return redirect()->back();
    }

    // upload order invoice
    public function uploadInvoice(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'invoice' => 'required|mimes:pdf',
        ]);

        $filename = $request->invoice->getClientOriginalName();
        $request->invoice->move('storage/invoice', $filename);

        $order->invoice = $filename;

        $order->save();

        // send mail
        // Mail::send(new InvoiceUploaded($order));

        $order_dates = OrderDate::where('order_id', $id)->get();
        foreach ($order_dates as $order_date) {
            $order_date->invoice_date = $order->updated_at;
            $order_date->save();
        }

        Session::flash('success-message', 'Invoice uploaded successfully...');
        return redirect()->route('all-orders.index');
    }

    // upload order payment
    public function uploadPayment(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $this->validate($request, [
            'payment_proof' => 'required|mimes:pdf',
        ]);

        $filename = $request->payment_proof->getClientOriginalName();
        $request->payment_proof->move('storage/payment', $filename);

        $order->payment_proof = $filename;

        $order->save();

        // send mail
        // Mail::send(new PaymentUploaded($order));

        $order_dates = OrderDate::where('order_id', $id)->get();
        foreach ($order_dates as $order_date) {
            $order_date->payment_date = $order->updated_at;
            $order_date->save();
        }

        Session::flash('success-message', 'Payment Receipt uploaded successfully...');
        return redirect()->route('my-orders.index');
    }

    // upload order payment
    public function uploadPaymentOne(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $this->validate($request, [
            'payment_proof_one' => 'required|mimes:pdf',
        ]);

        $filename = $request->payment_proof_one->getClientOriginalName();
        $request->payment_proof_one->move('storage/paymentone', $filename);

        $order->payment_proof_one = $filename;

        $order->save();

        // send mail
        // Mail::send(new PaymentUploaded($order));

        $order_dates = OrderDate::where('order_id', $id)->get();
        foreach ($order_dates as $order_date) {
            $order_date->paymentone_date = $order->updated_at;
            $order_date->save();
        }

        Session::flash('success-message', 'Payment Receipt uploaded successfully...');
        return redirect()->route('my-orders.index');
    }

    // upload order service specification
    public function uploadService(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'service_speci' => 'required|mimes:pdf',
        ]);

        $filename = $request->service_speci->getClientOriginalName();
        $request->service_speci->move('storage/servicespeci', $filename);

        $order->service_speci = $filename;

        $order->save();

        // send mail
        // Mail::send(new ServiceUploaded($order));

        $order_dates = OrderDate::where('order_id', $id)->get();
        foreach ($order_dates as $order_date) {
            $order_date->service_date = $order->updated_at;
            $order_date->save();
        }

        Session::flash('success-message', 'Service Specification uploaded successfully...');
        return redirect()->route('all-orders.index');
    }

    // upload order signed service specification
    public function uploadSigned(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $request->validate([
            'signed_service_speci' => 'required|mimes:pdf',
        ]);

        $filename = $request->signed_service_speci->getClientOriginalName();
        $request->signed_service_speci->move('storage/signedspeci', $filename);

        $order->signed_service_speci = $filename;

        $order->save();

        // send mail
        // Mail::send(new SignedServiceUploaded($order));

        $order_dates = OrderDate::where('order_id', $id)->get();
        foreach ($order_dates as $order_date) {
            $order_date->signedservi_date = $order->updated_at;
            $order_date->save();
        }

        Session::flash('success-message', 'Signed Service Specification uploaded successfully...');
        return redirect()->route('my-orders.index');
    }

    // download order budget
    public function downloadBudget($budget)
    {
        return response()->download('storage/budget/' . $budget);
    }

    // download order invoice
    public function downloadInvoice($invoice)
    {
        return response()->download('storage/invoice/' . $invoice);
    }

    // download order payment
    public function downloadPayment($payment)
    {
        return response()->download('storage/payment/' . $payment);
    }

    // download order payment
    public function downloadPaymentOne($paymentone)
    {
        return response()->download('storage/paymentone/' . $paymentone);
    }

    // download order service specification
    public function downloadService($service)
    {
        return response()->download('storage/servicespeci/' . $service);
    }

    // download order signed service specification
    public function downloadSigned($signed)
    {
        return response()->download('storage/signedspeci/' . $signed);
    }

    // search orders
    public function search(Request $request)
    {
        $this->validate(
            $request,
            [
                'search' => 'required',
            ],
            [
                'search.required' => 'You need to search an order.',
            ]
        );

        $query = $request->input('search');

        $orders = Order::where('order_number', 'LIKE', '%' . $query . '%')->paginate(5);

        return view('manage.orders.all-orders.index', compact('orders'));
    }
}
