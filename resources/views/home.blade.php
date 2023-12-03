@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Click This Company Information</h5>

                <a href="{{route('company.index')}}" class="btn btn-primary">Add Company</a>

            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Click This Employee Information</h5>

                <a href="{{route('employee.index')}}" class="btn btn-primary"> Add Employee</a>


            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Click This Product Information</h5>

                <a href="{{route('productData')}}" class="btn btn-primary"> Add Product</a>


            </div>
        </div>
    </div>
</div>
@endsection