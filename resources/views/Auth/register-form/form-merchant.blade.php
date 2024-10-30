<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

@extends('Auth.Master')
@section('title-auth', 'Register')
@section('navbar-title', 'Getting Started ')

@section('content-auth')
@include('sweetalert::alert')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-8">
                    <div class="card-header pb-0 text-left bg-transparent">
                        <h3 class="font-weight-bolder text-info text-gradient">Get your things Ready</h3>
                        <p class="mb-0">Complete this form to continue</p>
                    </div>
    
                    <div class="card-body">
                        <form role="form" method="POST" action="">
                            @csrf
                            <input type="hidden" name="member_level" value="merchant">
                            <label>Nama Toko</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="nama-toko" placeholder="Nama Toko" value="{{ old('nama-toko') }}">
                            </div>
                            <label>Email</label>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" aria-label="Email" aria-describedby="email-addon">
                            </div>
                            <label>Password</label>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password" placeholder="Password" value="{{ old('password') }}" aria-label="Password" aria-describedby="password-addon">
                            </div>
                            <label>Alamat</label>
                            <div class="mb-3">
                                <textarea class="form-control" name="address" id="" placeholder="Alamat" value="{{ old('address') }}" cols="30" rows="3"></textarea>
                            </div>           
                            <label>Tipe UMKM</label>
                            <div class="mb-3">
                                @php
                                    $merchants = ['UMKM','Cafe', 'Warung Makan','Lapak Mahasiswa','Pedagang Keliling']
                                @endphp
                                <select id="merchant-select" name="type"  class="form-control">
                                    @foreach ($merchants as $merchant)
                                        <option value="{{ $merchant}}">{{ $merchant}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Owner</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="owner" placeholder="Name" value="{{ old('owner') }}" aria-label="Nama" aria-describedby="type-addon">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign UP</button>
                            </div>
                        </form> 
                          
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1">
                        <p class="mb-4 text-sm mx-auto">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">Sign In</a>
                        </p>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n3">
                    <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/sate.jpg')"></div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    </main>

   
    
@endsection

@if ($errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var errorMessage = "";
            @foreach ($errors->all() as $error)
                errorMessage += "{{ $error }}\n";
            @endforeach
            swal("Error", errorMessage, "error");
        });
    </script>
@endif