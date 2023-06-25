<!-- tab1.blade.php -->
@extends('referrals.referralProcess.layout.referral-tabs-layout')

@section('tab-content')
<div class="tab-pane {{ $activeTab === 'tab3' ? 'active' : '' }}" id="tab2" role="tabpanel">
    <h1>Tab 3 Content</h1>
    <!-- Add your content for Tab 1 here -->
</div>
@endsection
