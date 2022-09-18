<footer class="js-fix-footer footer border-top-2">
    <div></div>
    <div class="container-fluid page__container page-section d-flex flex-column">
        <a href="https://www.bekasikab.go.id/">
            <p class="text-70 brand mb-24pt">
                <img class="brand-icon"
                        src="{{asset('assets/images/kabBekasi.svg')}}"
                        width="30"
                        alt="Huma"> Pemerintah Kabupaten Bekasi
            </p>
        </a>
        
        <p class="text-50 small mb-0">Copyright 2022 &copy; All rights reserved.</p>
    </div>
</footer>

<!-- jQuery -->
<script src="{{asset('assets/vendor/jquery.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('assets/vendor/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>

<!-- Perfect Scrollbar -->
<script src="{{asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

<!-- DOM Factory -->
<script src="{{asset('assets/vendor/dom-factory.js')}}"></script>

<!-- MDK -->
<script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>

<!-- App JS -->
<script src="{{asset('assets/js/app.js')}}"></script>

<!-- Highlight.js -->
<script src="{{asset('assets/js/hljs.js')}}"></script>

<!-- Global Settings -->
<script src="{{asset('assets/js/settings.js')}}"></script>

<!-- Flatpickr -->
<script src="{{asset('assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/js/flatpickr.js')}}"></script>

<!-- Moment.js -->
<script src="{{asset('assets/vendor/moment.min.js')}}"></script>
<script src="{{asset('assets/vendor/moment-range.js')}}"></script>

<!-- Chart.js -->
<script src="{{asset('assets/vendor/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/chartjs.js')}}"></script>

<!-- Chart.js Samples -->
<script src="{{asset('assets/js/page.analytics-dashboard.js')}}"></script>

<!-- Vector Maps -->
<script src="{{asset('assets/vendor/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('assets/js/vector-maps.js')}}"></script>

<!-- List.js -->
<script src="{{asset('assets/vendor/list.min.js')}}"></script>
<script src="{{asset('assets/js/list.js')}}"></script>

<!-- Tables -->
<script src="{{asset('assets/js/toggle-check-all.js')}}"></script>
<script src="{{asset('assets/js/check-selected-row.js')}}"></script>

<!-- App Settings (safe to remove) -->
<script src="{{asset('assets/js/app-settings.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

@yield('new_scripts')
