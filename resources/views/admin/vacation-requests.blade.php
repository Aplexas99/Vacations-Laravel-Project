

@extends('app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-3 " style="padding-left: 0px">
                @include('admin/admin-section')
                </div>
                <div class="col-md-9 vacation-section">
                @include('admin/vacation-requests-section')
                </div>
            </div>
        </div>
    @endsection
