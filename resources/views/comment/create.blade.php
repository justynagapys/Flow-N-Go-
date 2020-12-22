@extends('layouts.app')
@section('content')
    <form method="POST">
        @csrf
        <input type="text" name="message">
        <input type="submit" value="create!">
    </form>
@endsection