@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            @if (Auth::user()->role == 'admin')
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
                                        <th>Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    {{ $users->where('id', $order->user_id)->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $products->where('p_serial_number', $order->product_id)->value('name') }}
                                                </td>
                                                <td>
                                                    {{ $products->where('p_serial_number', $order->product_id)->value('model') }}
                                                </td>
                                                <td>
                                                    {{ $order->created_at }}
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
                                <p class="card-category">Total Orders</p>
                                <h3 class="card-title">{{ count($orders) }}
                                    <small>$</small>
                                </h3>
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
