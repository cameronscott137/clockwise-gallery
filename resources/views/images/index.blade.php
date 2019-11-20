@extends('layouts.app')

@section('content')

<header class="text-center mt-10 md:mt-20 px-4">
    <img class="mx-auto mb-8 md:mb-10 w-12 h-12 md:w-20 md:h-20" src="{{ asset('img/icon-logo.svg') }}">
    <h1 class="font-futura font-bold text-4xl md:text-6xl leading-tight mb-4 tracking-wide">The Clockwork</h1>
    <p class="font-futura text-xl md:text-4xl leading-normal tracking-wide">Clockwise is a custom apparel company that prints, <br class="hidden md:block">stitches, and ships in Pittsburgh, PA.</p>
</header>

<image-gallery :images="{{ $images }}"></image-gallery>
@endsection