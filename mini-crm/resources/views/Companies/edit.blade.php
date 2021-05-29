@extends('layouts.app', ['title' => 'Edit Company Information'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">Update Information : {{ $company->name }}</div>

                    <div class="card-body">
                        <form action="/company/{{$company->slug}}/edit" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            @include('companies.partials.form')
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@stop