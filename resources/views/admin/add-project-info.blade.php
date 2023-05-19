

@extends('app')
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4 " style="padding-left: 0px">
                @include('admin/admin-section')
                </div>
                <div class="col-md-8 sections">
                @include('admin/add-project-info-section')
                </div>
            </div>
        </div>
    @endsection

