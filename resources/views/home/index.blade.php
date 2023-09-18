@extends('layouts.index')
@section('content')
  <div class="container p-5">
    <table class="table table-dark table-striped">
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
      </thead>
      <tbody>
        @foreach ($employees as $employee)
          <tr>
            <td>{{ $employee->id }}</td>
            <td>{{ $employee->name }}</td>
            <td>
              <a href="{{ route('employee.edit', $employee) }}" class="card-link text-light">
                <span class="material-symbols-outlined">
                  edit
                </span>
              </a>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#employee-{{ $employee->id }}" class="card-link text-danger">
                <span class="material-symbols-outlined">
                  delete
                </span>
              </a>
            </td>
            <div class="modal fade" id="employee-{{ $employee->id }}">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title">Delete employee</h3>
                  </div>
                  <div class="modal-body">
                    Are you sure you want to delete this employee?
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('employee.destroy', $employee) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger">Delete</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection