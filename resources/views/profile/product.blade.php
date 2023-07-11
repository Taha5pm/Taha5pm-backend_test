@extends('layouts.app', ['activePage' => 'profile_product', 'titlePage' => __('Add To Warehouse')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('product.store') }}" class="form-horizontal">
                        @csrf
                        @method('put')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add Product') }}</h4>
                            </div>
                            <div class="card-body ">
                                @if (session('status_password'))
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status_password') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input_supplier">{{ __('Supplier') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <select class="form-control" name="supplier_id" id="supplier_id" type="text"
                                                placeholder="{{ __('Choose supplier') }}" value="" required>
                                                @foreach ($suppliers as $supplier)
                                                    <option value="{{ $supplier->s_serial_number }}">
                                                        {{ $supplier->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-model">{{ __('Model') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="model" id="model" type="text"
                                                placeholder="{{ __('Enter model') }}" value="" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-quantity">{{ __('Quantity') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="quantity" id="quantity" type="text"
                                                placeholder="{{ __('Enter quantity') }}" value="" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-price">{{ __('price') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="price" id="price" type="text"
                                                placeholder="{{ __('$$') }}" value="" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Products</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            Supplier
                                        </th>
                                        <th>
                                            Model
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Price
                                        </th>

                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->id }}
                                                </td>
                                                <td>
                                                    {{ $suppliers->where('id', 'equal', $product->supplier_id)->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $product->model }}
                                                </td>
                                                <td>
                                                    {{ $product->quantity }}
                                                </td>
                                                <td>
                                                    {{ $product->price }} $
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
