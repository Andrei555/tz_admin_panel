@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ 'Form of creation' }}</h1>

        @include('admin.common.errors')

        <form method="post" action="{{ route('admin.employees.store') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputFirstName">{{ 'First name' }}</label>
                <input class="form-control" type="text" name="first_name"
                       value="{{ old('first_name') }}" placeholder="{{ 'Enter your first name' }}">
            </div>
            <div class="form-group">
                <label for="inputLastName">{{ 'Last name' }}</label>
                <input class="form-control" type="text" name="last_name"
                       value="{{ old('last_name') }}" placeholder="{{ 'Enter your last name' }}">
            </div>
            <div class="form-group">
                <label for="inputEmail">{{ 'Email address' }}</label>
                <input class="form-control" type="text" name="email"
                       value="{{ old('email') }}" placeholder="{{ 'Enter your email' }}">
            </div>
            <div class="form-group">
                <label for="inputPhone">{{ 'Phone number' }}</label>
                <input class="form-control" type="text" name="phone"
                       value="{{ old('phone') }}" placeholder="{{ 'Enter your phone' }}">
            </div>
            <div class="form-group">
                <label for="formControlSelect">{{ 'Select company' }}</label>
                <select class="form-control" name="company_id">
                    <option selected disabled>{{ 'Companies' }}</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ 'Submit' }}</button>
            </div>
        </form>
    </div>
@endsection