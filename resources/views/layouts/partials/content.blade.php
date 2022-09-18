<div class="border-bottom-2 py-32pt position-relative z-1">
    <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
        <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

            <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                @yield('content-header')
            </div>
        </div>
    </div>
</div>

<div class="container-fluid page__container">
    <div class="page-section">
        @yield('content-section')
    </div>
</div>