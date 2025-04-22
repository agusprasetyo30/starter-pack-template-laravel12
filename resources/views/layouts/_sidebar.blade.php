<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}">Borwita X Reckit</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ route('dashboard') }}">BR</a>
    </div>
    <ul class="sidebar-menu">
        <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span>Beranda</span></a></li>

        <li class="menu-header">Feature</li>
        {{-- <li class="dropdown active"> --}}
            <li class="dropdown {{ Request::is('master*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                    {{-- <li><a class="nav-link" href="layout-top-navigation.html">Customer</a></li> --}}
                    <li class="{{ Request::is('*master/customer*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('master.customer.index') }}">Customer</a></li>
                    <li class="{{ Request::is('*master/salesman*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('master.salesman.index') }}">Salesman</a></li>
                </ul>
            </li>
            <li class="dropdown {{ Request::is('transaction*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-project-diagram"></i> <span>Transaction</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('*transaction/invoice*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('transaction.invoice.index') }}">Invoice</a></li>
                    <li class="{{ Request::is('*transaction/credit-note*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('transaction.credit-note.index') }}">Credit Note</a></li>
                </ul>
            </li>
        </li>
    </ul>      
</aside>