@extends('layouts.app')

@section('title', 'All Company')

@section('content')
<div class="container">
        <div class="my-3">
            <h3><a class="text-dark" style="text-decoration: none" href="{{route('companies.index')}}">Company</a></h3>
            <hr>
        </div>
    
    <div class="row">
        @forelse ($companies as $company)
            <div class="col-md-6">
                <div class="card mb-4">
                    <a href="{{route('companies.show', $company->slug)}}">
                        <img style="height: 300px; object-fit: cover; object-position: center;" class="card-img-top" src="{{ $company->takeImage }}"> 
                    </a>
                    <div class="card-body">
                        <h5>
                            <a class="text-dark" href="{{route('companies.show', $company->slug)}}" class="card-title">
                                {{$company->name}}

                            </a>
                        </h5>
                        
                        <div class="text-secodary">
                            Email: {{$company->email}}
                        </div>

                        <div class="text-secodary">
                            Website: {{$company->website}}
                        </div>
                        
                    </div>
                </div> 
            </div>

        @empty
            <div class="col-md-4">
                <div class="alert alert-info">
                    There are no company.
                </div>
            </div>
        @endforelse
        
    </div>

    <div class="my-3">
        <h3><a class="text-dark" style="text-decoration: none" href="{{route('employees.index')}}">Employee</a></h3>
        <hr>
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
                            Email: {{$employee->email}}
                        </div>

                        <div class="text-secodary">
                            Phone Number: {{$employee->phone}}
                        </div>

                        <div class="text-secodary">
                            Work at: {{$employee->company->name}}
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
    

</div>
@stop