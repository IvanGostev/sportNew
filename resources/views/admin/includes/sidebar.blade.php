<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" style="background-color: #212529">
        <span class="brand-text font-weight-bolder">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #212529">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar sidebar-dark flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link {{request()->path() == 'admin/users' ? 'active' : ''}}">
                        <p>
                            Пользователи и подписки
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order.index') }}" class="nav-link {{request()->path() == 'admin/orders' ? 'active' : ''}}">
                        <p>
                            Заказы
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link {{request()->path() == 'admin/goods' ? 'active' : ''}}">
                        <p>
                            Товары
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

