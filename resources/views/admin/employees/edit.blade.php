@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ 'Form of edit' }}</h1>

        @include('admin.common.errors')

        <form method="post" action="{{ route('admin.employees.update', $employee) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="patch">
            <div class="form-group">
                <label for="inputFirstName">{{ 'First name' }}</label>
                <input class="form-control" type="text" name="first_name"
                       value="{{ $employee->first_name }}" placeholder="{{ 'Enter your first name' }}">
            </div>
            <div class="form-group">
                <label for="inputLastName">{{ 'Last name' }}</label>
                <input class="form-control" type="text" name="last_name"
                       value="{{ $employee->last_name }}" placeholder="{{ 'Enter your last name' }}">
            </div>
            <div class="form-group">
                <label for="inputEmail">{{ 'Email address' }}</label>
                <input class="form-control" type="text" name="email"
                       value="{{ $employee->email }}" placeholder="{{ 'Enter your email' }}">
            </div>
            <div class="form-group">
                <label for="inputPhone">{{ 'Phone number' }}</label>
                <input class="form-control" type="text" name="phone"
                       value="{{ $employee->phone }}" placeholder="{{ 'Enter your phone' }}">
            </div>
            <div class="form-group">
                <label for="formControlSelect">{{ 'Select company' }}</label>
                <select class="form-control" name="company_id">
                    <option value="{{ $employee->company->id }}" selected>{{ $employee->company->name }}</option>
                    @foreach($companies as $company)
                        @if($employee->company->id == $company->id)
                            @continue
                        @else
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ 'Submit' }}</button>
            </div>
        </form>
    </div>
@endsection