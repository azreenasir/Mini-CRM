@extends('layouts.app')

@section('title', 'All Company')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h3>All Employee List</h3>
            <hr>
        </div>
        <div>
            <a href="{{route('employees.create')}}" class="btn btn-primary">Register Employee</a>
        </div>
    </div>
    
    <div class="row">
        @forelse ($employees as $employee)
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5>
                            <a href="{{route('employees.show', $employee->slug)}}" class="card-title text-dark">
                                {{$employee->firstname}} {{$employee->lastname}}
                                <hr>

                            </a>
                        </h5>
                        
                        <div class="text-secodary">
                            <div>Email: {{$employee->email}}</div> 
                            <div>Phone Number: {{$employee->phone}}</div> 
                            <div>Work at: {{$employee->company->name}}</div> 
                        </div>
                    
                    </div>
                </div> 
            </div>

        @empty
            <div class="col-md-4">
                <div class="alert alert-info">
                    There are no Employee.
                </div>
            </div>
        @endforelse
        
    </div>

    <div class="d-flex justify-content-center">
        <div>
            {{$employees->links()}}
        </div>
    </div>
    

</div>
@stop