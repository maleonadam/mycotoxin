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
                        <h3><i class="fa fa-check-square-o"></i> <strong>Checkout</strong></h3>
                        <p><b><a href="{{ route('cart.index') }}">Cart</a></b> <i class="fa fa-chevron-right fa-sm"></i>
                            <b>Your Order</b></p>
                    </div>

                    <div class="row mb-3 mt-3 ml-0">
                        <div class="col-md-6 ml-2">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Analyte</th>
                                            <th scope="col">Technique</th>
                                            <th scope="col" class="text-center">No. of samples</th>
                                            <th scope="col" class="text-center">Sub total (USD)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach(Cart::content() as $item)
                                        <tr>
                                            <td><strong>{{ $item->name }}</strong></p></td>
                                            <td>{{ $item->model->details }}</td>
                                            <td class="text-center">{{ $item->qty }}</td>
                                            <td class="text-center">{{ $item->subtotal }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                    <tfoot class="table-dark">
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                            <td><strong></strong></td>
                                        </tr>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td><strong></strong></td>
                                            <td class="text-center"><strong>Total Price</strong></td>
                                            <td class="text-center"><strong>$ {{ Cart::subtotal() }}</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header"><strong>Contact Information</strong></div>
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('checkout.store') }}" method="post">
                                    {{csrf_field()}}

                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id"/>
                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            @if (auth()->user())
                                                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly required>
                                            @else
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="organization">Organization</label>
                                            <input type="text" class="form-control" id="organization" name="organization" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address">Physical Address</label>
                                            <input type="text" class="form-control" id="address" name="address" required>
                                        </div>
                                    </div>

                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" name="city" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" id="country" name="country" required>
                                        </div>
                                    </div>

                                    <div class="half-form">
                                        <div class="form-group">
                                            <label for="matrix" required>Matrix</label>
                                            <select class="form-control" id="matrix" name="matrix" onchange="showfield(this.options[this.selectedIndex].value)" required>
                                                <option disabled selected>select...</option>
                                                <option value="animal_feed">Animal feed</option>
                                                <option value="human_food">Human foodstuff</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div id="div1" class="mt-1"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="origin">Origin</label>
                                            <input type="text" class="form-control" id="origin" name="origin" value="{{ old('origin') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="intendedUse" required>Intended use of results</label>
                                        <select class="form-control" id="intendedUse" name="intended_use" required>
                                            <option disabled selected>select...</option>
                                            <option value="research">Research</option>
                                            <option value="academia">Academia</option>
                                            <option value="commercial">Commercial</option>
                                        </select>
                                    </div>

                                    <div class="form-group pb-2">
                                        <label for="message">Message(Optional)</label>
                                        <textarea class="form-control" type="text" name="message" id="message" cols="30" rows="5" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <a href="{{ route('cart.index') }}" class="btn btn-warning mr-2"><i class="fa fa-angle-left"></i> Back to Cart</a>

                                        <button type="submit" class="btn btn-success float-right"><i class="fa fa-lock"></i> Place Order</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>       
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function showfield(name) {
            if (name == 'Other') document.getElementById('div1').innerHTML = '<input type="text" class="form-control" name="matrix" />';
            else document.getElementById('div1').innerHTML = '';
        }
    </script>
@endsection