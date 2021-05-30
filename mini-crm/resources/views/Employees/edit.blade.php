@extends('layouts.app', ['title' => 'Edit Employees Information'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">Update Information : {{ $employee->firstname }} {{$employee->lastname}}</div>

                    <div class="card-body">
                        <form action="/employee/{{$employee->slug}}/edit" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            @include('employees.partials.form')
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop