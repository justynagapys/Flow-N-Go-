@extends('layouts.app')
@section('content')
    <form method="POST">
        @csrf
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="submit" value="create!">
    </form>
@endsection