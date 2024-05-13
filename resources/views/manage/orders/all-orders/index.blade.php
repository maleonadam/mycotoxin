@extends('layouts.other')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('layouts.alerts')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-bar-chart"></i> <strong>All Orders</strong></h3>
                    <p><b><a href="{{ route('allproducts') }}">Services</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                  <b>All Orders</b></p>
                </div>

                <div class="card-body"> 
                    <form class="mgBot10" method="POST" action="{{ url('search-orders') }}">
                        @csrf
                          <div class="form-row align-items-center">
                            <div class="col-md-11 mb-2"> 
                              <input type="text" class="form-control" name="search" placeholder="Search order, use order number">
                            </div>  
                            <div class="col-auto mb-2">
                              <button type="submit" class="btn btn-success">Search</button>
                            </div>
                          </div>
                    </form>

                    @if($orders->count() > 0)
                      <div class="row">
                        <div class="col-12 table-responsive">
                          <table class="table table-bordered table-sm table-hover"> 
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">Order no.</th>
                                <th scope="col">Budget</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Service specification</th>
                                <th scope="col">Signed service specification</th>
                                <th scope="col" colspan="2" class="text-center">Payment receipt(s)</th>
                                <th scope="col" colspan="3" class="text-center">Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @foreach($orders as $order)
                              <tr>
                                  <td scope="row">
                                    {{ $order->order_number }} 
                                  </td>

                                  @if($order->budget === null)
                                    <td scope="row">
                                      <a href="{{ route('all-orders.budget', $order->id) }}" class="btn btn-outline-ilri btn-sm">
                                        <i class="fa fa-upload">upload</i>
                                      </a> 
                                    </td>
                                  @else
                                    <td scope="row">
                                      <a href="/budget/download/{{$order->budget}}">{{ $order->budget }}</a>
                                      <a href="{{ route('all-orders.budget', $order->id) }}" class="btn btn-outline-ilri btn-sm">
                                        <i class="fa fa-refresh"></i>
                                      </a>
                                    </td>
                                  @endif

                                  @if($order->invoice === null)
                                    <td scope="row">
                                      <a href="{{ route('all-orders.invoice', $order->id) }}" class="btn btn-outline-ilri btn-sm">
                                        <i class="fa fa-upload">upload</i>
                                      </a> 
                                    </td>
                                  @else
                                    <td scope="row">
                                      <a href="/invoice/download/{{$order->invoice}}">{{ $order->invoice }}</a>
                                      <a href="{{ route('all-orders.invoice', $order->id) }}" class="btn btn-outline-ilri btn-sm">
                                        <i class="fa fa-refresh"></i>
                                      </a>
                                    </td>
                                  @endif

                                  @if($order->service_speci === null)
                                    <td scope="row">
                                      <a href="{{ route('all-orders.service', $order->id) }}" class="btn btn-outline-ilri btn-sm">
                                        <i class="fa fa-upload">upload</i>
                                      </a> 
                                    </td>
                                  @else
                                    <td scope="row">
                                      <a href="/service/download/{{$order->service}}">{{ $order->service_speci }}</a>
                                      <a href="{{ route('all-orders.service', $order->id) }}" class="btn btn-outline-ilri btn-sm">
                                        <i class="fa fa-refresh"></i>
                                      </a>
                                    </td>
                                  @endif

                                  @if($order->signed_service_speci === null)
                                    <td scope="row"><p class="badge badge-light">pending!</p></td>
                                  @else
                                    <td scope="row"><a href="/signed/download/{{$order->signed_service_speci}}">Download</a></td>
                                  @endif

                                  @if($order->payment_proof === null)
                                    <td scope="row"><p class="badge badge-light">pending!</p></td>
                                  @else
                                    <td scope="row"><a href="/payment/download/{{$order->payment_proof}}">Download</a></td>
                                  @endif

                                  @if($order->payment_proof_one === null)
                                    <td scope="row"><p class="badge badge-light">pending!</p></td>
                                  @else
                                    <td scope="row"><a href="/paymentone/download/{{$order->payment_proof_one}}">Download</a></td>
                                  @endif

                                  <td scope="row">
                                      <a href="{{ route('all-orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-eye">view</i>
                                      </a> 
                                  </td>
                                  <td scope="row">
                                      <a href="{{ route('all-orders.edit', $order->id) }}" class="btn btn-outline-success btn-sm">
                                        <i class="fa fa-edit">status</i>
                                      </a>
                                  </td>
                                  <td scope="row">
                                      <a href="{{ route('all-orders.getreject', $order->id) }}" class="btn btn-outline-danger btn-sm">
                                        <i class="fa fa-ban">accept/reject</i>
                                      </a>
                                  </td>
                              </tr>  
                              @endforeach
                            </tbody>

                            <tfoot class="table-dark">
                                <tr>
                                    <td>&nbsp;</td>
                                    <td><strong></strong></td>
                                    <td><strong></strong></td>
                                    <td><strong></strong></td>
                                    <td><strong></strong></td>
                                    <td colspan="2"><strong></strong></td>
                                    <td colspan="3"><strong></strong></td>
                                </tr>
                            </tfoot>
                          </table>
                          <ul class="pagination">
                              {{ $orders->links() }}
                          </ul>
                        </div>
                      </div>
                    @else
                      <div class=" row col-12">
                        <h3>There are no orders to display!</h3>
                        <div class="mb-5"></div>
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
