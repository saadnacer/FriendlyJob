@extends('layout')

@section('title','Accueil')

@section('content')

  <div class="h-[550px] flex mt-20 justify-center gap-3 w-full lg:w-auto">
    <div class="relative w-[900px] bg-red-500 h-[500px] lg:w-auto shadow" id="slider">
      <img class="shadow h-full w-[900px]" src="/assets/img/slider/hearyou.jpg" alt="on vous ecoute" id="slide">
      <div class="absolute top-1/2 left-2 text-4xl cursor-pointer" id="precedent" onclick="ChangeSlide(-1)"><</div>
      <div class="absolute top-1/2 right-2 text-4xl cursor-pointer" id="suivant" onclick="ChangeSlide(1)">></div>
    </div>
    
    <div class=" flex-col h-[500px] w-[500px] grid grid-cols-2 gap-3 shadow hidden lg:grid">
  <div class="w-full h-full bg-gray-500">
    <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
  </div>
  <div class="w-full h-full bg-gray-500">
    <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
  </div>
  <div class="w-full h-full bg-gray-500">
    <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
  </div>
  <div class="w-full h-full bg-gray-500">
    <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
  </div>
</div>

  </div>
  <div class="pub  ">
    <div class="flex flex-wrap justify-evenly w-full gap-4 h-[250px] mb-5 lg:flex-wrap">
      <div class="bg-red-500 w-52 h-52 lg:w-80 lg:h-52">
        <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
      </div>
      <div class="bg-red-500 w-52 h-52 lg:w-80 lg:h-52">
        <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
      </div>
      <div class="bg-red-500 w-52 h-52 lg:w-80 lg:h-52">
        <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
      </div>
      <div class="bg-red-500 w-52 h-52 lg:w-80 lg:h-52">
        <img class="h-full w-full" src="/assets/img/rightbox/feuillejaune.jpg" alt="">
      </div>
    </div>
  </div>


@endsection
 