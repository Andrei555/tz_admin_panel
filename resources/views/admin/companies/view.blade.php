@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">{{ $company->name }}</h1>
        <div class="row">
            <div class="col-sm-6">
                <img src="{{ $company->getLogoUrl() }}" alt="no_avatar" width="500" height="auto">
                <h5 class="my-4">
                    <span>{{ 'Email: ' }}</span>{{ $company->email }}
                </h5>
                <h5 class="my-4">
                    <span>{{ 'Site: ' }}</span>
                    <a href="{{ $company->website }}">{{ $company->website }}</a>
                </h5>
            </div>
            <div class="col-sm-6">
                <h5 class="text-center">{{ 'List of employee' }}</h5>
            </div>
        </div>
    </div>
@endsection