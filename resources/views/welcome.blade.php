@extends('layout')

@section('title','Accueil')

@section('content')
<div class="h-[550px] flex mt-20 justify-center gap-3 w-full lg:w-auto">
  <div class="relative w-full bg-red-500 h-[500px] lg:w-auto shadow" id="slider">
    <img class="shadow h-full w-full object-cover" src="/assets/img/slider/hearyou.jpg" alt="on vous ecoute" id="slide">
    <div class="absolute top-1/2 left-2 text-4xl cursor-pointer" id="precedent" onclick="ChangeSlide(-1)">
      &lt;
    </div>
    <div class="absolute top-1/2 right-2 text-4xl cursor-pointer" id="suivant" onclick="ChangeSlide(1)">
      &gt;
    </div>
  </div>

  <div class="flex flex-col gap-3">
    <div class="h-[500px] w-[500px] lg:w-500 grid grid-cols-2 gap-3 shadow">
      <div class="w-full h-full bg-gray-500">
        <img class="h-full w-full object-cover" src="/assets/img/rightbox/equipe1.jpg" alt="">
      </div>
      <div class="w-full h-full bg-gray-500">
        <img class="h-full w-full object-cover" src="/assets/img/rightbox/equipe2.jpg" alt="">
      </div>
      <div class="w-full h-full bg-gray-500">
        <img class="h-full w-full object-cover" src="/assets/img/rightbox/equipe3.jpg" alt="">
      </div>
      <div class="w-full h-full bg-gray-500">
        <img class="h-full w-full object-cover" src="/assets/img/rightbox/equipe4.jpg" alt="">
      </div>
    </div>
  </div>
</div>


@endsection