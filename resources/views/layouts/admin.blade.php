<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials.head')
    @stack('styles')
  </head>
  <body>
    <div class="wrapper">
      {{-- Sidebar --}}
      @include('partials.sidebar')

      <div class="main-panel">
        {{-- Navbar/Header --}}
        @include('partials.navbar')

        {{-- Page Content --}}
        <div class="container">
          <div class="page-inner">
            @yield('content')
          </div>
        </div>

        {{-- Footer --}}
        @include('partials.footer')
      </div>

      {{-- Custom template (optional; aman dihapus kalau tidak perlu) --}}
      <div class="custom-template">
        <div class="title">Settings</div>
        <div class="custom-content">
          <div class="switcher">
            <div class="switch-block">
              <h4>Logo Header</h4>
              <div class="btnSwitch">
                <button type="button" class="selected changeLogoHeaderColor" data-color="dark"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="blue"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="green"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="red"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="white"></button>
                <br />
                <button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
                <button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Navbar Header</h4>
              <div class="btnSwitch">
                <button type="button" class="changeTopBarColor" data-color="dark"></button>
                <button type="button" class="changeTopBarColor" data-color="blue"></button>
                <button type="button" class="changeTopBarColor" data-color="purple"></button>
                <button type="button" class="changeTopBarColor" data-color="light-blue"></button>
                <button type="button" class="changeTopBarColor" data-color="green"></button>
                <button type="button" class="changeTopBarColor" data-color="orange"></button>
                <button type="button" class="changeTopBarColor" data-color="red"></button>
                <button type="button" class="selected changeTopBarColor" data-color="white"></button>
                <br />
                <button type="button" class="changeTopBarColor" data-color="dark2"></button>
                <button type="button" class="changeTopBarColor" data-color="blue2"></button>
                <button type="button" class="changeTopBarColor" data-color="purple2"></button>
                <button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
                <button type="button" class="changeTopBarColor" data-color="green2"></button>
                <button type="button" class="changeTopBarColor" data-color="orange2"></button>
                <button type="button" class="changeTopBarColor" data-color="red2"></button>
              </div>
            </div>
            <div class="switch-block">
              <h4>Sidebar</h4>
              <div class="btnSwitch">
                <button type="button" class="changeSideBarColor" data-color="white"></button>
                <button type="button" class="selected changeSideBarColor" data-color="dark"></button>
                <button type="button" class="changeSideBarColor" data-color="dark2"></button>
              </div>
            </div>
          </div>
        </div>
        <div class="custom-toggle">
          <i class="icon-settings"></i>
        </div>
      </div>
      {{-- End Custom template --}}
    </div>

    @include('partials.scripts')
    @stack('scripts')
  </body>
</html>
