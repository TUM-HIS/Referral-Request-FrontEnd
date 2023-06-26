<!-- tabs-layout.blade.php -->

@extends('layouts.backend')

@section('content')
    <main id="main" class="main">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $activeTab === 'tab1' ? 'active' : '' }}" href="{{ route('referral.tabs', ['tab' => 'tab1']) }}" role="tab">Tab 1</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $activeTab === 'tab2' ? 'active' : '' }}" href="{{ route('referral.tabs', ['tab' => 'tab2']) }}" role="tab">Tab 2</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $activeTab === 'tab3' ? 'active' : '' }}" href="{{ route('referral.tabs', ['tab' => 'tab3']) }}" role="tab">Tab 3</a>
                </li>
                <!-- Add more tabs as needed -->
            </ul>

            <div class="tab-content">
                @yield('tab-content')
            </div>
        </div>
    </main>
@endsection
