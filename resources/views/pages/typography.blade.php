@extends('layouts.app', ['activePage' => 'typography', 'titlePage' => __('Make Order')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('order.store') }}" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title ">Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-sm-2 ">{{ __('Customer') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="form-control" name="customer_id" id="customer_id" type="text"
                                                placeholder="{{ __('Choose customer') }}" value="" required>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->customer_id }}">
                                                        {{ $customer->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                            </th>
                                            <th>
                                                Model
                                            </th>
                                            <th>
                                                Unit Price
                                            </th>
                                            <th>
                                                Quantity
                                            </th>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        <input type="radio" name="product_id" id="product_id[]"
                                                            value="{{ $product->p_serial_number }}">
                                                    </td>
                                                    <td>
                                                        {{ $product->model }}
                                                    </td>
                                                    <td>
                                                        {{ $product->price }} $
                                                    </td>
                                                    <td>
                                                        {{ $product->quantity }}
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label>{{ __('Enter quantity') }}</label>

                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" name="quantity" id="quantity" required=true>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('purchase') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
