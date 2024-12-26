<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex justify-content-center m-0 navbar-brand text-wrap"
      href="{{route('user-dashboard')}}">
      <img src="../assets/img/logo.png" alt="PediPulse Logo" style="max-height: 60px; width: auto;">
    </a>
  </div>
  <hr class="horizontal dark mt-3">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"
               href="#"
               id="childDropdown"
               data-bs-toggle="collapse"
               data-bs-target="#childAccordion"
               aria-expanded="{{ Request::is('user-dashboard/*') ? 'true' : 'false' }}">
                <div
                    class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i style="font-size: 1rem;" class="fas fa-lg fa-home ps-2 pe-2 text-center text-dark"
                       aria-hidden="true"></i>
                </div>
                <span class="nav-link-text ms-1">Paparan Utama</span>
            </a>

            <!-- Child Dropdown -->
            <div id="childAccordion" aria-expanded=" {{ Request::is('user-dashboard/*') ? 'show' : '' }}">
                <ul class="list-unstyled ps-3">
                    @if(isset($user))
                        @foreach ($user->children as $child)
                            <li class="nav-item">
                                <a class="nav-link {{ Request::is('user-dashboard/' . $child->id) ? 'active' : '' }}"
                                   href="{{ route('user-dashboard', ['child_id' => $child->id]) }}">
                                    <div
                                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                        @if($child->child_gender === 'Lelaki')
                                            <i style="font-size: 1rem;" class="fas fa-lg fa-child text-center text-dark" aria-hidden="true"></i>
                                        @elseif($child->child_gender === 'Perempuan')
                                            <i style="font-size: 1rem;" class="fas fa-lg fa-child-dress text-center text-dark" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                    <span class="nav-link-text ms-1 text-capitalize">{{ $child->child_name }}</span>
                                </a>
                            </li>
                        @endforeach
                    @else
                        <li>No children available</li>
                    @endif
                </ul>
            </div>
        </li>

      <!--Nav Header-->
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laravel Examples</h6>
      </li>
      <!--Nav User Profile-->
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-profile') ? 'active' : '') }} " href="{{ url('user-profile') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>customer-support</title>
              <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                  fill-rule="nonzero">
                  <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                    <g id="customer-support" transform="translate(1.000000, 0.000000)">
                      <path class="color-background"
                        d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                        id="Path" opacity="0.59858631"></path>
                      <path class="color-foreground"
                        d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                        id="Path"></path>
                      <path class="color-foreground"
                        d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                        id="Path"></path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">User Profile</span>
        </a>
      </li>
      <!--Nav User Management-->
      <li class="nav-item pb-2">
        <a class="nav-link {{ (Request::is('user-management') ? 'active' : '') }}" href="{{ url('user-management') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">User Management</span>
        </a>
      </li>
      <!--Nav Header-->
      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman</h6>
      </li>
      <!--Nav Graph-->
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('graf-tumbesaran-anak') ? 'active' : '') }}"
          href="{{ url('graf-tumbesaran-anak') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas  fa-lg fa-chart-line ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>

          </div>
          <span class="nav-link-text ms-1">Graf Tumbesaran Anak</span>
        </a>
      </li>
      <!--Nav Milestone-->
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('pencapaian-perkembangan') ? 'active' : '') }}"
          href="{{ url('pencapaian-perkembangan') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas  fa-lg fa-baby ps-2 pe-2 text-center text-dark "
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Pencapaian Perkembangan</span>
        </a>
      </li>
      <!--Nav M-Chat-->
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('m-chat') ? 'active' : '') }}" href="{{ url('m-chat') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas  fa-lg fa-clipboard-check ps-2 pe-2 text-center text-dark "
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">M-CHAT</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ (Request::is('tips-dan-intervensi') ? 'active' : '') }}"
          href="{{ url('tips-dan-intervensi') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas  fa-lg fa-heart-pulse ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Tips dan Intervensi</span>
        </a>
      </li>

      <!--Account Pages-->
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
      </li>
      <!--Profil pengguna-->
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('papar-maklumat') ? 'active' : '') }}" href="{{ url('papar-maklumat') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>customer-support</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(1.000000, 0.000000)">
                      <path class="color-background opacity-6"
                        d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z">
                      </path>
                      <path class="color-background"
                        d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z">
                      </path>
                      <path class="color-background"
                        d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z">
                      </path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Profil Pengguna</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ url('static-sign-in') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <svg width="12px" height="12px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>document</title>
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                  <g transform="translate(1716.000000, 291.000000)">
                    <g transform="translate(154.000000, 300.000000)">
                      <path class="color-background opacity-6"
                        d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z">
                      </path>
                      <path class="color-background"
                        d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                      </path>
                    </g>
                  </g>
                </g>
              </g>
            </svg>
          </div>
          <span class="nav-link-text ms-1">Sign In</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link  " href="{{ url('static-sign-up') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <img src="../assets/img/apple-icon.png" alt="Custom Icon" width="12" height="12">
          </div>
          <span class="nav-link-text ms-1">Sign Up</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidenav-footer mx-3 ">
    <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
      <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpeg')"></div>
      <div class="card-body text-start p-3 w-100">
        <div
          class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
          <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true" id="sidenavCardIcon"></i>
        </div>
        <div class="docs-info">
          <h6 class="text-white up mb-0">Need help?</h6>
          <p class="text-xs font-weight-bold">Please check our docs</p>
          <a href="/documentation/getting-started/overview.html" target="_blank"
            class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
        </div>
      </div>
    </div>
  </div>
</aside>
