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
                        <h3><i class="fa fa-shopping-bag"></i> <strong>Cart</strong></h3>
                        <p><b><a href="{{ route('allproducts') }}">Services</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>Cart Items</b></p>
                    </div>
                    @if(Cart::count() > 0)
                    <div class="card-body">
                        <h4>{{ Cart::count() }} item(s) in Cart</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Analyte</th>
                                        <th scope="col">Technique</th>
                                        <th scope="col">Test Method</th>
                                        <th scope="col" class="text-center">Unit cost per sample (USD)</th>
                                        <th class="text-center" scope="col">No. of samples</th>
                                        <th scope="col" class="text-center">Sub total (USD)</th>
                                        <th class="text-center" scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach(Cart::content() as $item)
                                    <tr>
                                        <td><strong>{{ $item->name }}</strong></td>
                                        <td>{{ $item->model->details }}</td>
                                        <td>{{ $item->model->test_method }}</td>
                                        <td class="text-center">{{ $item->price }}</td>
                                        <td class="text-center">
                                            <!-- <select class="quantity" data-id="{{ $item->rowId }}" data-productQuantity="quantity">
                                                @for($i = 1; $i < 5+1; $i++)
                                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select> -->
                                            
                                            <form action="{{ route('cart.update', $item->rowId) }}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field('PATCH')}}

                                                <input type="hidden" name="proId" value="{{ $item->rowId }}"/>
                                                <input type="number" size="2" MIN="1" MAX="1000" name="qty" value="{{ $item->qty }}"/>
                                                <button class="btn btn-warning btn-sm" type="submit"><i class="fa fa-refresh"></i></button>
                                            </form>
                                        </td>
                                        <td class="text-center">{{ $item->subtotal }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                                            </form>
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
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong></strong></td>
                                        <td><strong>Cart Total</strong></td>
                                        <td><strong> $ {{ Cart::subtotal() }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="cart-buttons">
                            <a href="{{ route('allproducts') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Add a Service</a>
                            <a href="{{ route('checkout.index') }}" class="btn btn-success float-right">Checkout <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @else
                    <div class="card-body">
                        <h3>No items in Cart!</h3>
                        <div class="mb-5"></div>
                        <a href="{{ route('allproducts') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Request a Service</a>
                        <div class="spacer"></div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        // (function () {
        //     const classname = document.querySelectorAll('.quantity')

        //     Array.from(classname).forEach(function (element) {
        //         element.addEventListener('change', function () {
        //             // alert('changed!')
        //             const id = element.getAttribute('data-id')
        //             axios.patch(`/cart/${id}`, {
        //                 quantity: this.value
        //             })
        //             .then(function (response) {
        //                 // console.log(response);
        //                 window.location.href = '{{ route('cart.index') }}'
        //             })
        //             .catch(function (error) {
        //                 // console.log(error);
        //                 window.location.href = '{{ route('cart.index') }}'
        //             })
        //         })
        //     })
        // })()
    </script>
@endsection