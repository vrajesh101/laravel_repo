@extends("layout.layout")

@section("title","Page 4")

@section("content")
<h1>Page 4</h1>
<h1>{{url()->current()}}</h1>
<h1>{{url()->full()}}</h1>
<h1>{{URL::previous()}}</h1>

@endsection