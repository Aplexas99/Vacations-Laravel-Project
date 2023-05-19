
@extends('app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4 " style="padding-left: 0px">
                @include('employee/employee-section')
                </div>
                <div class="col-md-8 sections">
                @include('project-manager/vacation-requests-section')
                </div>
            </div>
        </div>
    @endsection
