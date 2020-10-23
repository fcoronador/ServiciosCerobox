@extends('layouts.app')

@section('content')
    <example-component></example-component>

   @foreach ($clientes as $item)
       {{$item->nombre}}
   @endforeach

@endsection