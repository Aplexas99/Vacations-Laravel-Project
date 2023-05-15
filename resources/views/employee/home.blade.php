

@extends('app')
    @section('content')
        @include('navbar')
        <div class="container">
            <div class="row">
                <div class="col-md-3 " style="padding-left: 0px">
                @include('employee/employee-section')
                </div>
                <div class="col-md-9 sections">
                @include('employee/vacation-requests')
                </div>
            </div>
        </div>
    @endsection
