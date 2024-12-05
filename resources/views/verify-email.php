@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-root" id="kt_app_root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-center flex-lg-row-fluid p-10">
            <div class="d-flex justify-content-center flex-column p-15 bg-body shadow-sm rounded w-100 w-md-550px mx-auto">
                <div class="text-center mb-2">
                    <a href="/" class="mb-5 d-inline-block">
                        <img alt="Logo" src="{{ asset('assets/media/logos/logo-color.png') }}" class="h-80px" />
                    </a>
                </div>
                @if(session('success'))
                <script>
                    Swal.fire({
                        text: "{{ session('success') }}",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                </script>
                @endif

            </div>
            <div class="text-center">
                <p>Your email has been verified successfully. Please login to continue.</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</div>
@endsection