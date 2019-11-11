@extends('layouts.app')

@section('content')

<div class="container mx-auto flex flex-wrap p-4 items-center mb-4 ">
    <a href="{{ url('/')}}" class="block mr-10">
        <img src="{{ asset('img/icon-logo_with_text.svg') }}">
    </a>
</div>

<div class="container mx-auto">
    <div class="px-4">
        <img class="w-auto mx-auto gallery-image mb-6" src="{{ $image->image_url }}">
        <p class="font-futura text-xl leading-normal tracking-wide text-center mb-12 max-w-lg mx-auto">
            {{ $image->name }}
        </p>
    </div>

    <div class="bg-gray-lighter py-6 px-4 mb-8 text-center mx-4">
        <h3 class="font-futura font-bold mb-3 text-2xl">Want Work This Good?</h3>
        <p class="font-futura text-lg mb-5">You deserve it, and we can make it.</p>
        <div class="sm:flex sm:flex-wrap sm:justify-center">
            <a href="#" class="mb-4 md:mb-0 block text-sm tracking-wide uppercase font-futura mx-2 bg-green text-white py-2 px-6 rounded-sm">
                Start Your Order
            </a>
            <a href="#" class="block text-sm tracking-wide uppercase font-futura mx-2 border border-green text-green py-2 px-6 rounded-sm">
                Contact Us
            </a>
        </div>
    </div>
</div>

<h3 class="font-futura font-bold text-4xl text-center mt-12 -mb-6">Time for More Browsing?</h3>
<image-gallery :images="{{ $images }}"></image-gallery>

@endsection