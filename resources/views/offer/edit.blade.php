@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Edit') {{-- tytuł naszej sekcji --}}

@section('content')
<form method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="name">
        <input type="text" name="description">
        <input type="submit" value="update!">
    </form>
@endsection