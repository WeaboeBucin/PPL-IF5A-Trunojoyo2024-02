@extends('Admin.Layout.Master')
@section('head')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('aris/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('aris/dist/css/adminlte.min.css?v=3.2.0') }}">
@endsection
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="mt-14 rounded-lg border-2 border-dashed border-gray-200 p-4 dark:border-gray-700">
            <section class="content-header">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">CHANGE PASSWORD</h3>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="submit" class="btn btn-default float-right">Reset</button>
                        </div>

                    </form>
                </div>
            </section>
        </div>
    </div>

    <script src="{{ asset('aris/plugins/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('aris/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('aris/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script src="{{ asset('aris/dist/js/adminlte.min.js?v=3.2.0') }}"></script>
@endsection
