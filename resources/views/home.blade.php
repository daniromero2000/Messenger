@extends('layouts.app')

@section('content')
<messager-component :user-id="{{ auth()->user()->id }}"></messager-component>
@endsection