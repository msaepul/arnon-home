  <aside style="background-color: #f0eeee" class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/" class="brand-link">
          <img src="{{ asset('/') }}dist/img/arnon.png" alt="Arnon Bakery Logo" class="brand-image">
          <span class="brand-text font-weight-dark">App Central Arnon</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar auto-hide">
          <!-- Sidebar user (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <a href="{{ asset('/') }}storage/uploads/img-usr/{{ Auth::user()->foto }}" class="fancybox"
                      data-fancybox="gallery1" data-caption="{{ Auth::user()->nama_lengkap }}">
                      <img src="{{ asset('/') }}storage/uploads/img-usr/{{ Auth::user()->foto }}"
                          class="img-circle elevation-2" alt="User Image" style="margin-top: 40%;">
                  </a>
              </div>
              <div class="info">
                  <a href="{{ route('user_profile') }}" class="d-block">{{ Auth::user()->nama_lengkap }}</a>
                  <p class="d-block">
                      <span
                          @if (strlen(allakses()) > 10) data-toggle="tooltip" data-placement="bottom"
                          title="{{ allakses() }}" @endif>{{ limits(allakses()) }}</span>
                      - {{ cabang() }}<br>
                      <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                  </p>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline" style="margin-top: -15%">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          @if (request()->is('layout/*'))
              @include('layout.menusismed')
          @elseif (request()->is('wodesain*'))
              @include('wodesain.menuwodesain')
          @elseif (request()->is('komunikasi*'))
              @include('komunikasi.menukomunikasi')
          @else
              @include('layout.menusismed')
          @endif
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
      <script>
          $(function() {
              $('[data-toggle="tooltip"]').tooltip()
          })
      </script>
  </aside>
