@extends('layouts.app')

@section('content')
    <Clientes></Clientes>
   @foreach ($clientes as $item)
       {{$item->nombre}}
   @endforeach

@endsection