@extends('app')
@push('css')
@endpush
@section('content')
      <table>

                <thead>

                    <tr><th>id</th>
<th>name</th>
<th>email</th>
<th>email_verified_at</th>
<th>password</th>
<th>remember_token</th>
</tr>

                </thead>

                <tbody>
                @foreach ($all as $element)\n
               <tr>\n<td>{{ $element->id}}</td>
<td>{{ $element->name}}</td>
<td>{{ $element->email}}</td>
<td>{{ $element->email_verified_at}}</td>
<td>{{ $element->password}}</td>
<td>{{ $element->remember_token}}</td>
</tr>
@endforeach

                </tbody>

            </table>
@endsection  @push('js')  @endpush