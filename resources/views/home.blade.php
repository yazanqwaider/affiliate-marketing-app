@extends('layouts.master')

@section('content')
    <div>
        <a href="{{ Auth::user()->referral_link }}">referral link</a>
    </div>
@endsection