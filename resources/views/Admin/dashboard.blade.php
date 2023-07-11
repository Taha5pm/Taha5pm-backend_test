@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (Auth::user()->role == null)
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header card-header-warning">
                                <h4 class="card-title">Orders</h4>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-hover">
                                    <thead class="text-warning">
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Product Model</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                <td>
                                                    {{ $customers->where('customer_id', 'equal', $orders->where('order_id', 'equal', $item->order_id)->value('customer_id'))->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $products->where(
                                                            'p_serial_number',
                                                            'equal',
                                                            $supp_prods->where('supplier_product_id', 'equal', $item->supplier_product_id)->value('p_serial_number'),
                                                        )->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $products->where(
                                                            'p_serial_number',
                                                            'equal',
                                                            $supp_prods->where('supplier_product_id', 'equal', $item->supplier_product_id)->value('p_serial_number'),
                                                        )->value('model') }}
                                                </td>
                                                <td>
                                                    {{ $item->quantity }}
                                                </td>
                                                <td>
                                                    {{ $item->total_price }} $
                                                </td>
                                                <td>
                                                    {{ $item->created_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card card-stats">
                            <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">content_copy</i>
                                </div>
                                <p class="card-category">Total Selling</p>
                                <h3 class="card-title">{{ $supplier_total_price }}
                                    <small>$</small>
                                </h3>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">warning</i>
                                    <h5>{{ $supplier_total_quantity }} Sold Products</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();
        });
    </script>
@endpush
