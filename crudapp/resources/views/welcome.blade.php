@extends('layouts.crudapp')
@section('content')
    <div class="container">
        @if(session('successMsg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> {{ session('successMsg') }} </strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        @endif
        <table class="table table-striped text-center">
            <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">Name</th>
                <th scope="col">Class</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>

            </tr>
            </thead>
            <tbody>

                @foreach($students as $student)
                    <tr>
                    <th scope="row">{{ $student->id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>{{ $student->address }}</td>
                    <td> <a class="btn btn-primary" href="{{ route('edit',$student->id) }}">Edit</a>
                        <form method="post" id="delete-form-{{ $student->id }}" action="{{ route('delete',$student->id) }}" style="display: none;">
                           @csrf
                            {{ method_field('delete') }}
                        </form>

                        <button onclick="if (confirm('Are you want to this ?')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $student->id }}').submit();

                        }else{
                                event.preventDefault();
                                }"class="btn btn-danger">Delete</button>

                    </tr>
                @endforeach


            </tbody>
        </table>
        {{ $students->links() }}

    </div>

@endsection