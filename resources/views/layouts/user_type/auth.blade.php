@extends('layouts.app')

@section('auth')


    @if(\Request::is('static-sign-up')) 
        @include('layouts.navbars.guest.nav')
        @yield('content')
        @include('layouts.footers.guest.footer')
    
    @elseif (\Request::is('static-sign-in')) 
        @include('layouts.navbars.guest.nav')
            @yield('content')
        @include('layouts.footers.guest.footer')
    
    
    @else
        @php
            $isAdmin = auth()->user() && isset(auth()->user()->username); // Check for username (admin)
            $isParent = auth()->user() && isset(auth()->user()->email);  
        @endphp

        @if($isAdmin)
            
            @include('layouts.navbars.auth.admin-sidebar', ['user' => auth()->user()])
            <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
                @include('layouts.navbars.auth.nav')
                <div class="container-fluid py-4">
                    @yield('content')
                    @include('layouts.footers.auth.footer')
                </div>
            </main>

        
        @elseif (\Request::is('profile'))  
            @include('layouts.navbars.auth.sidebar')
            <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                @include('layouts.navbars.auth.nav')
                @yield('content')
            </div>
        
        @elseif (\Request::is('maklumat-pengguna'))  
            @include('layouts.navbars.auth.nav-details')
            <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                @yield('content')
                @include('layouts.footers.auth.footer')
            </div>

        @else
            @include('layouts.navbars.auth.sidebar', ['user' => auth()->user()])
            <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
                @include('layouts.navbars.auth.nav')
                <div class="container-fluid py-4">
                    @yield('content')
                    @include('layouts.footers.auth.footer')
                </div>
            </main>
        @endif
        
        @include('components.fixed-plugin')
    @endif

@endsection