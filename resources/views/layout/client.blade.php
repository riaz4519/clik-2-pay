
@include('.include._head')


<body class="bg-white sidebar-dark " >
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center  ">
            <div class="row w-100">

                @yield('container')

            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>

</body>



@include('.include.footer')