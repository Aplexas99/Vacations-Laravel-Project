

@extends('app')
    @section('content')
        @include('navbar')
        <div class="container">
            <div class="row">
                <div class="col-md-3 " style="padding-left: 0px">
                @include('employee-section')
                </div>
                <div class="col-md-9 vacation-section">
                @include('vacation-requests')
                </div>
            </div>
        </div>
    @endsection
