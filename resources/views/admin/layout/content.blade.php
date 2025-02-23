<div class="main-content">
    <div class="content-wrapper">

        @include('admin.components.breadcrumb')

        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
