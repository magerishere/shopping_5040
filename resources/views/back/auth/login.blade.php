@extends('back.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">
                    Admin Login
                </h5>
                <form action="">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Login To Dashboard</button>

                </form>
            </div>

        </div>
    </div>
@endsection
