@extends('admin.layouts.app_admin')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">{{ 'Employees' }}</h1>

        @include('admin.common.flash_message')

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Company</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>
                        <a href="{{ route('admin.employees.show', $employee) }}">
                            {{ $employee->fullName() }}
                        </a>
                    </td>
                    <td>{{ $employee->company->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        <form action="{{ route('admin.employees.destroy', $employee) }}" method="post" class="form_delete">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="DELETE">
                            <a href="{{ route('admin.employees.edit', $employee) }}">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <a href="#" onclick="sendForm()">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="text-center">
            @if ($companies->isEmpty())
                <h5 class="mt-5 text-danger">{{ 'To add an employee first create a company!' }}</h5>
            @else
                <a class="btn btn-success" href="{{ route('admin.employees.create') }}" role="button">
                    <strong><i class="fas fa-plus-square"></i> {{ 'Add new employee' }}</strong>
                </a>
            @endif
            <ul class="pagination justify-content-center mt-4">
                {{ $employees->links() }}
            </ul>
        </div>
    </div>

    <script>
        function sendForm() {
            event.target.closest('form.form_delete').submit();
        }
    </script>
@endsection