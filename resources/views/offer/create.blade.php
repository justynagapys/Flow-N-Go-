@extends('layouts.master') {{-- używa naszego master layoutu --}}

@section ('title', 'Crete offer') {{-- tytuł naszej sekcji --}}

@section('content')
    <form method="POST">
        @csrf
        Name:
        <input type="text" name="name">
        Description:
        <input type="text" name="description">
        <input type="submit" value="Create!">
    </form>
@endsection


