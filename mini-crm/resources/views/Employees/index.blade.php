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
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5>
                            <a class="card-title text-dark">
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

                        <div>
                            <div class="flex mt-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                                <a href="/employee/{{$employee->slug}}/edit" class="btn btn-sm btn-success">Edit</a>
                            </div>
                            
                            
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-2">
                                            <div>Employee Name: {{$employee->firstname}}</div>
                                            <div class="text-secondary">
                                                <small>Registered on {{$employee->created_at->format("d F, Y")}}</small>
                                            </div>
                                            </div>
                                        <form action="/employee/{{$employee->slug}}/delete" method="post">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger" type="submit">Yes</button>
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                        
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