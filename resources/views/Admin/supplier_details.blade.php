@extends('layouts.app', ['activePage' => 'profile', 'titlePage' => __('Suppliers Details')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Supplier {{ $supp->value('name') }}</h4>
                            <p class="card-category">Speciality {{ $supp->value('speciality') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            Product Serial Number
                                        </th>
                                        <th>
                                            Product Name
                                        </th>
                                        <th>
                                            Product Model
                                        </th>
                                        <th>
                                            Arrival Date
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Sold
                                        </th>
                                        <th>
                                            Unit Price
                                        </th>
                                        <th>
                                            Total Selling Price
                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($supp_prods as $supp_prod)
                                            <tr>
                                                <td>
                                                    {{ $supp_prod->p_serial_number }}
                                                </td>
                                                <td>
                                                    {{ $products->where('p_serial_number', 'equal', $supp_prod->p_serial_number)->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $products->where('p_serial_number', 'equal', $supp_prod->p_serial_number)->value('model') }}
                                                </td>
                                                <td>
                                                    {{ $supp_prod->created_at }}
                                                </td>
                                                <td>
                                                    {{ $supp_prod->quantity }}
                                                </td>
                                                <td>
                                                    {{ $supp_prod->sold }}
                                                </td>
                                                <td>
                                                    {{ $products->where('p_serial_number', 'equal', $supp_prod->p_serial_number)->value('price') }}
                                                </td>
                                                <td>
                                                    @php
                                                        $total = strval(intval($products->where('p_serial_number', 'equal', $supp_prod->p_serial_number)->value('price')) * intval($supp_prod->sold));
                                                        echo $total;
                                                    @endphp
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
