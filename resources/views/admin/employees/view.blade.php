@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">{{ $employee->fullName() }}</h1>
        <div>
            <h5><span>{{ 'Company: ' }}</span>{{ $employee->company->name }}</h5>
            <h5><span>{{ 'Email: ' }}</span>{{ $employee->email }}</h5>
            <h5><span>{{ 'Phone: ' }}</span>{{ $employee->phone }}</h5>
        </div>
    </div>
@endsection