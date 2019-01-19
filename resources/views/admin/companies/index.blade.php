@extends('admin.layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">{{ 'Companies' }}</h1>

        @include('admin.common.flash_message')

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Logo</th>
                    <th scope="col">Title</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                <tr>
                    <td>
                        <img src="{{ $company->getLogoUrl() }}" alt="no_avatar" width="auto" height="24">
                    </td>
                    <td>
                        <a href="{{ route('admin.companies.show', ['id' => $company->id]) }}">
                            {{ $company->name }}
                        </a>
                    </td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <form action="{{ route('admin.companies.destroy', $company) }}" method="post" name="form_delete">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <a href="{{ route('admin.companies.edit', $company) }}">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <a href="#" onclick="document.forms['form_delete'].submit()">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center">
            <a class="btn btn-success" href="{{ route('admin.companies.create') }}" role="button">
                <strong><i class="fas fa-plus-square"></i> {{ 'Add new company' }}</strong>
            </a>
            <ul class="pagination justify-content-center mt-4">
                {{ $companies->links() }}
            </ul>
        </div>
    </div>
@endsection