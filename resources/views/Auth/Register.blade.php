
@extends('Auth.Master')
@section('title-auth', 'Register')
@section('navbar-title', 'Getting Started ')

@section('content-auth')
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

                        <p class="font-weight-bolder text-info text-gradient">Choose one</p>
                        <div class="mb-3">
                            
                            
                            <a href="{{ route('register-user') }}">
                                <button type="button" class="btn btn-primary" id="userButton" ">User</button>
                            </a>              
                            <a href="{{ route('register-merchant') }}">
                                <button type="button" class="btn btn-primary" id="userButton" ">Merchant</button>
                            </a>              
                        </div>
                    {{-- @endif --}}
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                    Already Have account?
                    <a href="{{ route('login') }}" class="text-info text-gradient font-weight-bold">Sign in</a>
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


@push('scripts')
<script>
    // function submitForm() {
    //     document.getElementById('user-type-form').submit();
    // }
</script>
@endpush