@extends('layouts.app', ['title' => 'Register Company'])

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">Register Employee</div>

                    <div class="card-body">
                        <form action="/employee/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('employees.partials.form', ['submit' => 'Register'])
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop