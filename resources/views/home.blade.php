@extends('layouts.app')

@section('content')
<messanger-component :user="{{ auth()->user() }}">
</messanger-component>
@endsection