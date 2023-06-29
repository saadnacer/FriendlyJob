@extends('layout')

@section('title','Accueil')

@section('content')
<section class="h-screen">
  <div class="h-full flex mt-20 justify-center gap-3 w-full lg:w-auto">
    <div class=" relative h-96 w-2/4 bg-red-500 w-full lg:w-auto" id="slider">
      <img class="h-96 w-full" src="/assets/img/slider/hearyou.jpg" alt="on vous ecoute" id="slide">
      <div class="absolute top-1/2 left-2 text-4xl cursor-pointer" id="precedent" onclick="ChangeSlide(-1)"><</div>
      <div class="absolute absolute top-1/2 right-2 text-4xl cursor-pointer" id="suivant" onclick="ChangeSlide(1)">></div>
    </div>
    <div class="flex flex-col rightbox grid-rows-2 h-96 w-80 gap-3 hidden lg:flex">
      <div class="w-full h-1/2 bg-gray-500">
        
      </div>
      <div class="w-full h-1/2 bg-gray-500">
        
      </div>
    </div>
  </div>
  <div class="pub">
    <div class="flex justify-evenly w-full">
      <div class="bg-red-500 w-80 h-52"></div>
      <div class="bg-red-500 w-80 h-52"></div>
      <div class="bg-red-500 w-80 h-52"></div>
      <div class="bg-red-500 w-80 h-52"></div>
    </div>
  </div>
</section>

@endsection
 