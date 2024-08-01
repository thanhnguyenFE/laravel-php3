@extends('admin.layouts.app')
@section('main-content')
 <h1>Xin chào {{ Auth::user()->name }}</h1>
@endsection
