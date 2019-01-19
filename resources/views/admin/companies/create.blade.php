@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <h1 class="text-center">{{ 'Form of creation' }}</h1>

        @include('admin.common.errors')

        <form method="post" action="{{ route('admin.companies.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputName">{{ 'Company name' }}</label>
                <input class="form-control" type="text" name="name"
                       value="{{ old('name') }}" placeholder="{{ 'Enter name' }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input class="form-control" type="text" name="email"
                       value="{{ old('email') }}" placeholder="{{ 'Enter email' }}">
            </div>
            <div class="form-group">
                <label for="exampleInputWebsite">{{ 'Site of the company' }}</label>
                <input class="form-control" type="text" name="url"
                       value="{{ old('url') }}" placeholder="{{ 'Enter link to site' }}">
            </div>
            <div class="form-group">
                <label for="exampleInputLogo">{{ 'Upload company logo' }}</label>
                <input class="form-control" type="file" name="logo">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection