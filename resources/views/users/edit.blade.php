@extends('layouts.main')

@section('content')
   <main class="main" id="main">
       <section class="section">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update User</h4>
                        @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong > {{ session('message') }} </strong>
                        </div>
                        @endif
                        <form action="{{ route('users.update', [$user->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control form-control-user @error('name') is-invalid @enderror"                                         placeholder="Enter Name">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                    placeholder="Enter Email" value="{{ $user->email }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-end">Update User</button>
                            </div>
                        </form>
                    </div>

                </div>
           </div>
       </section>
   </main>
@endsection
