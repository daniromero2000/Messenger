@extends('layouts.app')

@section('content')
<messager-component :user="{{ auth()->user() }}"></messager-component>
@endsection