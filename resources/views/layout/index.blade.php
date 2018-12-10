
@include('.include._head')

<body class="sidebar-fixed dark-theme sidebar-dark">
<div class="container-scroller">
  <!-- partial:../../partials/_navbar.html -->

    @include('.include._navbar')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

        @include('.include._settings-panel')

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('.include._sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">


              @yield('container')



          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

          @include('.include._footer-text')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

@include('.include.footer')