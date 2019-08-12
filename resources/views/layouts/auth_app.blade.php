@extends('layouts.app')

@section('overallContent')
    <div class="container-scroller">
        @include('parts.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('parts.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')

                </div>
                @include('parts.footer')
            </div>
        </div>
    </div>
@endsection