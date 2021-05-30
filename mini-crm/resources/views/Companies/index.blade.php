@extends('layouts.app')

@section('title', 'All Company')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h3>All Company List</h3>
            <hr>
        </div>
        <div>
            <a href="/company/create" class="btn btn-primary">Register Company</a>
        </div>
    </div>
    
    <div class="row">
        @forelse ($companies as $company)
            <div class="col-md-4">
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

    <div class="d-flex justify-content-center">
        <div>
            {{$companies->links()}}
        </div>
    </div>
    

</div>
@stop