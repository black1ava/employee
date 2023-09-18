@extends('layouts.index')
@section('content')
  <div class="container p-5">
    <div class="card mx-5">
      <div class="card-header">
        <h3 class="card-title">Edit Employee</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('employee.update', $employee) }}" method="post">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $employee->name }}">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <button class="btn btn-primary w-100">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection