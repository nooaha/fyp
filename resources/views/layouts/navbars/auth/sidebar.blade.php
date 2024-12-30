@php
    // Get the first child of the user
    $firstChild = Auth::user()->children->first();
    // Pass the childId as the first child's ID (if exists) or fallback to null if no children
    $childId = $firstChild ? $firstChild->id : null;
@endphp

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
      
      <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('user-details.showParentDetail') ? 'active' : '' }}"
          href="{{ route('user-details.showParentDetail', ['childId' => request('childId')]) }}">
          <div
            class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-person-breastfeeding ps-2 pe-2 text-center text-dark"
              aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Profil Pengguna</span>
        </a>
      </li>
    </ul>
  </div>


</aside>