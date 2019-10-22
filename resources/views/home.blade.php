@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(\Illuminate\Support\Facades\Auth::check())
            <div class="card">
                <div class="card-header">Requests</div>

                <div class="card-body">
                    <router-view></router-view>
                </div>
            </div>
                @endif
        </div>
    </div>
</div>
@endsection
