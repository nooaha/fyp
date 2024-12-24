<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xxl my-3 fixed-start ms-1 "
  id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
      aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex justify-content-center m-0 navbar-brand text-wrap"
      href="{{ route('user-dashboard', ['childId' => $childId ?? $user->children->first()->id]) }}">
      <img src="{{ asset('assets/img/logo.png') }}" alt="PediPulse Logo" style="max-height: 60px; width: auto;">
    </a>
  </div>
  <hr class="horizontal dark mt-3">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <!-- Child Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ Request::is('user-dashboard/*') ? 'active' : '' }}" href="#"
          id="childDropdown" data-bs-toggle="collapse" data-bs-target="#childAccordion"
          aria-expanded="{{ Request::is('user-dashboard/*') ? 'true' : 'false' }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-home ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Paparan Utama</span>
        </a>

        <!-- Child Dropdown -->
        <div id="childAccordion" aria-expanded="{{ Request::is('user-dashboard/*') ? 'show' : '' }}">
          <ul class="list-unstyled ps-3">
            @if(isset($user) && $user->children->isNotEmpty())
        @foreach ($user->children as $child)
      <li class="nav-item">
        <a class="nav-link {{ request('childId') == $child->id ? 'active' : '' }}"
        href="{{ route('user-dashboard', ['childId' => $child->id]) }}">
        <div
        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        @if($child->child_gender === 'Lelaki')
      <i style="font-size: 1rem;" class="fas fa-lg fa-child text-center text-dark" aria-hidden="true"></i>
    @elseif($child->child_gender === 'Perempuan')
    <i style="font-size: 1rem;" class="fas fa-lg fa-child-dress text-center text-dark"
    aria-hidden="true"></i>
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

      <li class="nav-item mt-2">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman</h6>
      </li>

      <!-- Nav Graph -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('growth-tracking.showGrowthChart') ? 'active' : '' }}"
          href="{{ route('growth-tracking.showGrowthChart', ['childId' => request('childId')]) }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-chart-line ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Graf Tumbesaran Anak</span>
        </a>
      </li>

      <!-- Nav Milestone -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('child-milestone.showMilestoneList') ? 'active' : '' }}"
          href="{{ route('child-milestone.showMilestoneList', ['childId' => request('childId')]) }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-baby ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Pencapaian Perkembangan</span>
        </a>
      </li>

      <!-- Nav M-Chat -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('mchat.index') ? 'active' : '' }}"
          href="{{ route('mchat.index', ['childId' => request('childId')]) }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-clipboard-check ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">M-CHAT</span>
        </a>
      </li>

      <!-- Tips dan Intervensi -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('tips-dan-intervensi') ? 'active' : '' }}"
          href="{{ url('tips-dan-intervensi') }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-heart-pulse ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Tips dan Intervensi</span>
        </a>
      </li>

      <!-- 
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Halaman Akaun</h6>
      </li>Account Pages -->

      <!-- Profil pengguna -->
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('profil-pengguna') ? 'active' : '' }}"
          href="{{ url('profil-pengguna') }}">
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
          <span class="nav-link-text ms-1">Profil</span>
        </a>
      </li>
    </ul>
  </div>


</aside>