<div class="sidebar" data-color="orange" data-background-color="white"
    data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="{{ route('admin.home') }}" class="simple-text logo-normal">
            {{ __('WAREHOUSE') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            @if (Auth::user()->role == 'admin')
                <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <i class="material-icons">dashboard</i>
                        <p>{{ __('Dashboard') }}</p>
                    </a>
                </li>
            @endif
            <li class="nav-item {{ $activePage == 'profile' || $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Add to warehouse') }}
                        <b class="caret"></b>
                    </p>
                </a>

                <div class="collapse show" id="laravelExample">

                    <ul class="nav">

                        <li class="nav-item{{ $activePage == 'profile_product' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('admin.product') }}">
                                <span class="sidebar-mini"> </span>
                                <span class="sidebar-normal"> {{ __('Products') }} </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @if (Auth::user()->role == 'admin')
                <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.customer') }}">
                        <i class="material-icons">content_paste</i>
                        <p>{{ __('Customers') }}</p>
                    </a>
                </li>

                <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.order') }}">
                        <i class="material-icons">library_books</i>
                        <p>{{ __('Make order') }}</p>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
