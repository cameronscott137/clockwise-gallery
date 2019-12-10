@extends('layouts.app')

@section('title', 'The Clockwork')

@section('content')

<header class="text-center mt-10 md:mt-20 px-4">
    <h1 class="font-futura font-bold text-4xl md:text-6xl leading-tight mb-4 tracking-wide">The Clockwork</h1>
    <p class="font-futura text-xl md:text-4xl leading-normal tracking-wide">Clockwise is a custom apparel company that prints, <br class="hidden md:block">stitches, and ships in Pittsburgh, PA.</p>
</header>

<image-gallery :images="{{ $images }}"></image-gallery>
@endsection