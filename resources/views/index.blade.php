@extends('layouts.main')

@section('content')
<main class="main" id="main">
    <div class="pagetitle">
        <h1>Users</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      <section class="section">
          <div class="row">
              <div class="col-md-8">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                      <h5 class="card-title">Users <span>| All</span></h5>
                      @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong > {{ session('message') }} </strong>
                        </div>
                        @endif
                      <table class="table table-borderless datatable">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                       <tbody>
                           @php
                               $n = 1;
                           @endphp
                           @forelse ($users as $user)
                                <tr>
                                    <th>{{ $n++ }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-4">
                                                <a href="/users/{{ $user->id }}/edit" class="btn btn-sm btn-primary d-block">edit</a>
                                            </div>
                                            <div class="col-4">
                                                <form action="/users/{{ $user->id }}" method="POST" >
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger d-block" onclick="return confirm('Do you want to delete this user?')">delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                           @empty
                                <tr>
                                    <td colspan="4" class="text-danger text-center">No users have been added in the system.</td>
                                </tr>
                           @endforelse
                       </tbody>
                      </table>

                    </div>

                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add User</h4>

                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror"                                         placeholder="Enter Name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-2">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        placeholder="Enter Email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary float-end">Add User</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
          </div>
      </section>
</main>
@endsection
