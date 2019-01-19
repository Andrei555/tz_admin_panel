@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ 'Form of edit' }}</h1>

        @include('admin.common.errors')

        <form method="post" action="{{ route('admin.companies.update', $company) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="patch">
            <div class="row">
                <div class="col-sm-6">
                    <img src="{{ $company->getLogoUrl() }}" alt="no_avatar" width="500" height="auto">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="inputName">{{ 'Company name' }}</label>
                        <input class="form-control" type="text" name="name"
                               value="{{ $company->name }}" placeholder="{{ 'Enter name' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">{{ 'Email address' }}</label>
                        <input class="form-control" type="text" name="email"
                               value="{{ $company->email }}" placeholder="{{ 'Enter email' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputWebsite">{{ 'Site of the company' }}</label>
                        <input class="form-control" type="text" name="url"
                               value="{{ $company->website }}" placeholder="{{ 'Enter link to site' }}">
                    </div>
                    <div class="form-group">
                        <label for="inputLogo">{{ 'Upload company logo' }}</label>
                        <input class="form-control" type="file" name="logo">
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">{{ 'Submit' }}</button>
            </div>
        </form>
    </div>
@endsection