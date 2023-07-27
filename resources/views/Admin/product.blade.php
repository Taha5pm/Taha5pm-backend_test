@extends('layouts.app', ['activePage' => 'profile_product', 'titlePage' => __('Add To Warehouse')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.product.store') }}" class="form-horizontal">
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
                                    <label class="col-sm-2 col-form-label"
                                        for="input-model">{{ __('Product Serial Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="p_serial_number" id="p_serial_number"
                                                type="text" placeholder="{{ __('Enter product serial number') }}"
                                                value="" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-model">{{ __('Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="{{ __('Enter name') }}" value="" required />

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
                                    <label class="col-sm-2 col-form-label" for="input-model">{{ __('Description') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="description" id="description" type="text"
                                                placeholder="{{ __('Enter description') }}" value="" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-quantity">{{ __('Quantity') }}</label>
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
                                            Serial Number
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Model
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Unit Price
                                        </th>

                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product->p_serial_number }}
                                                </td>
                                                <td>
                                                    {{ $product->name }}

                                                </td>
                                                <td>
                                                    {{ $product->model }}

                                                </td>
                                                <td>
                                                    {{ $product->description }}

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
