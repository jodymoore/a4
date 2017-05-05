@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $user->name }}
@endsection

@section('content')

    <h1 id="deleteconf" >Confirm deletion</h1>
    <form method='POST' action='/delete/{{ $user->id }}'>

        {{ csrf_field() }}

        <input type='hidden' name='id' value='{{ $user->id }}'?>

        <h2>Are you sure you want to delete <em>{{ $user->name }}</em>?</h2>

        <input type='submit' value='Yes, delete this user.' class='btn btn-danger'>

    </form>

@endsection

