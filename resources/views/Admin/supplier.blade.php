@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Add To Warehouse')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('admin.supplier.store') }}" class="form-horizontal">
                        @csrf
                        @method('put')
                        <input type='hidden' name='role' value='supplier' />
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Add Supplier') }}</h4>
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
                                    <label class="col-sm-2 col-form-label" for="input-name">{{ __('name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="name" id="name" type="text"
                                                placeholder="{{ __('enter name') }}" value="" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-email">{{ __('speciality') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="speciality" id="speciality" type="text"
                                                placeholder="{{ __('') }}" value="" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-email">{{ __('Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="email" id="email" type="email"
                                                placeholder="{{ __('Example@gmail.com') }}" value="" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label" for="input-email">{{ __('Password') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="password" id="password" type="text"
                                                placeholder="{{ __('************') }}" value="" required />

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label"
                                        for="input-phonenumber">{{ __('Phone number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <input class="form-control" name="phonenumber" id="phonenumber" type="text"
                                                placeholder="{{ __('+963 *********') }}" value="" required />
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
                            <h4 class="card-title ">Suppliers</h4>
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
                                            speciality
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Phone number
                                        </th>
                                        <th>
                                            Details
                                        </th>

                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>
                                                    {{ $supplier->s_serial_number }}
                                                </td>
                                                <td>
                                                    {{ $supplier->name }}
                                                </td>
                                                <td>
                                                    {{ $supplier->speciality }}
                                                </td>
                                                <td>
                                                    {{ $supplier->email }}
                                                </td>
                                                <td>
                                                    {{ $supplier->phonenumber }}
                                                </td>
                                                <td>
                                                    <a rel="tooltip" class="btn btn-success btn-link"
                                                        href="{{ route('admin.supplier.show', $supplier->s_serial_number) }}"
                                                        data-original-title="" title="">
                                                        <i class="material-icons">more</i>
                                                        <div class="ripple-container"></div>
                                                    </a>
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
    </div>
@endsection
