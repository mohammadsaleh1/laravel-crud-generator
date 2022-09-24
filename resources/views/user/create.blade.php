@extends('app')
@push('css')
@endpush
@section('content')
<form action="" method="POST">
                @csrf<textarea name="id" value="old(id) ?? "></textarea>
<textarea name="name" value="old(name) ?? "></textarea>
<textarea name="email" value="old(email) ?? "></textarea>
<textarea name="email_verified_at" value="old(email_verified_at) ?? "></textarea>
<textarea name="password" value="old(password) ?? "></textarea>
<textarea name="remember_token" value="old(remember_token) ?? "></textarea>
</form>@endsection 
 @push('js') 
 @endpush