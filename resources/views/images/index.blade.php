@extends('layouts.app')

@section('content')

<header class="text-center mt-20">
    <img class="mx-auto mb-10" src="{{ asset('img/icon-logo.svg') }}">
    <h1 class="font-futura font-bold text-6xl leading-tight mb-4 tracking-wide">Our Work, <br class="hidden md:block">Like Clockwork</h1>
    <p class="font-futura text-4xl leading-normal tracking-wide">Clockwise is a custom apparel company that prints, <br class="hidden md:block">stitches, and ships in Pittsburgh, PA.</p>
</header>

<image-gallery :images="{{ $images }}"></image-gallery>
@endsection