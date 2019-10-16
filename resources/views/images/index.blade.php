@extends('layouts.app')

@section('content')
    <image-gallery :images="{{ $images }}"></image-gallery>
@endsection