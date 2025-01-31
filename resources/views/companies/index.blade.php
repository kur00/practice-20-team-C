@extends('layout')

@section('title','会社一覧')

@section('content')
<h2>会社一覧</h2>
<ul>
    @foreach($companies as $company)
        <li>{{ $company->name }} ({{$company->address}})</li>
    @endforeach

</ul>
@endsection