@extends('layouts.crudapp')
@section('content')

    <form action="{{ route('update',$student) }}" method="post">
        @csrf
        <div class="container">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong> {{ $error }} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                @endforeach
            @endif
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" placeholder="Please Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Class</label>
                <input type="text" class="form-control" id="class" name="class" value="{{ $student->class }}" placeholder="Please Enter your class">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}"  placeholder="Please Enter address">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </form>
@endsection