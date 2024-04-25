<!-- resources/views/auth/forgot-password.blade.php -->

@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Reset Password') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('user.updatePassword') }}">
            @csrf
        
            <div>
                <label for="password">Password Baru</label>
                <input id="password" type="password" name="password" required>
            </div>
        
            <div>
                <label for="password_confirmation">Konfirmasi Password Baru</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
        
            <button type="submit">Ubah Password</button>
        </form>
        
        
    </div>
</div>
@endsection
