  @extends('layouts.app')
   @section('content')
<section>

<div class="service container">
<div class="infos d-flex">
    <div class="inner">
    <p class="our">OUR SERVICES</p>
<h3>We Are Providing Digital services</h3></div>
<div class="controls d-flex align-items-end"><button class="but" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class=""><i class="fas fa-chevron-left"></i></span>
    <span class="visually-hidden"></span>
  </button>
  <button class="but but2" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class=""><i class="fas fa-chevron-right"></i></span>
    <span class="visually-hidden"></span>
  </button></div>
</div>


<div class="blocks col-12 d-flex">




    <div id="carouselExampleControls" class="carousel slide col-12" data-bs-ride="carousel">
        <div class="carousel-inner">








          <div class="carousel-item active ">
              <div class="genblock d-flex justify-content-between flex-wrap">
                @foreach($services as $servis)
            <div class="block bl1 d-flex flex-column align-items-center">
                <div class="img"><img style="max-width:40px" src="{{ asset('storage/' . $servis->image ) }}" alt=""></div>
              <p class="gentit">{{ $servis->title_1 }}</p>
              <p class="sectit">{{$servis->text}}</p>
                  <div class="ent ent1"><a href="#" class="white"><i class="fas fa-arrow-right"></i></a></div>
              </div>
              @endforeach

             
                
              </div>
          </div>

         
          </div>










        </div>


      </div>

































</div>


</div>

</section>


<section>
   
    <div class="about container d-flex justify-content-between flex-wrap">
    @foreach ($abouts as $abt)
    <div  class="left col-12 col-lg-5" style=" max-width:500px; background: url({{ asset('storage/' . $abt->{'image'}) }})"></div>
    @endforeach
@foreach ($abouts as $abt)
<div class="right col-12 col-lg-6">
    <p class="ourtxt">{{ $abt->title }}</p>
    <p class="tit">{{$abt->text}}</p>
    <p class="abouttxt"></span>
        </p>
        <a href="#" class="learn">Read More</a>
</div>
@endforeach

    </div>
  
</section>




<section class="lemon">

<div class="innerplace container d-flex justify-content-between flex-wrap">
@foreach($pages as $pag)
<div class="cardi d-flex flex-column align-items-center">
        <div class="img"><img src="{{ asset('storage/' . $pag->image ) }}"style="max-width:200px"alt=""></div>
      <p class="gentit">{{ $pag->title }}</p>
      <p class="sectit">{{ $pag->text }}</p>
</div>
@endforeach
</div>






</section>


<section class="mb container">

<div class="car2info">
    <p class="ourtxt">OUR PORTFOLIO</p>
    
    <p class="tit">Take A Look At Our Latest Work</p>

</div>

<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
     
      <div class="carousel-item active" data-bs-interval="10000">
        <div class="carousel2 d-flex flex-wrap justify-content-between">
        @foreach($portfolio as $prt)
            <div class="regtangle  {{ $loop->first ? 'active in' : '2' }} "><img style="height: 343px; width:100%; " src="{{  asset('storage/'. $prt->image) }}"></div>
         @endforeach   
            
        </div>
      </div>
   
     
    </div>
    <div class="control2">
    <button class="but but2 butt3" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class=""><i class="fas fa-chevron-left"></i></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="but but2" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class=""><i class="fas fa-chevron-right"></i></span>
      <span class="visually-hidden">Next</span>
    </button></div>
  </div>


</section>


<section class="teachers">
<div class="inner-info container">
<p class="our">OUR TEAM</p>
<h3>Our top dedicated professionals.</h3>

<div class="treners d-flex flex-wrap justify-content-between">
@foreach($team as $tem)
<div class="trener d-flex flex-column justify-content-end {{ $loop->first ? 'active in' : '2' }} "><img style="height: 343px; max-width:100%; " src="{{  asset('storage/'. $tem->image) }}">
  <p class="name">{{ $tem->title }} <br> <span class="prof">{{ $tem->text }}</span> </p>
</div>
@endforeach


</div>

</div>
</section>



<section class="mb">

<div class="container">
<div class="priceinfo d-flex justify-content-between align-items-center">
  <div class="txts">
    <p class="ourtxt">OUR PRICING</p>
    <p class="tit">Choose A Plan That’s Right For You</p>
  </div>
  <div class="mover d-flex">
    <p class="date colorchange">Monthly</p>
    <div class="bigger d-flex align-items-center ">
      <div class="roll"></div>
    </div> <p class="date">Yearly</p>
  </div>
</div>

<div class="cards d-flex justify-content-between flex-wrap">

    @foreach($pricing as $pric)
  <div class="pricecard pr1 d-flex flex-column align-items-center">
    <p class="name nm1">Basic Plan</p>
    <div class="img "><img style="max-width:80px;" src="{{ asset('storage/' . $pric->image) }}" alt=""></div>
    <p class="gentit gen1"><span class="dol dol1">{{ $pric->title_1 }}</span> /Month</p>
    <p class="sectit sec1"> <br>
       <br>
      {{ $pric->text_1 }} <br>
      {{ $pric->text_2 }} <br>
      {{ $pric->text_3 }}<br>
      {{ $pric->text_4 }}</p>
      <a href="#" class="start st1">Start Now</a>
  </div>
  @endforeach
  
  
</div>




</div>

</section>

<section class="moreblue">
<div class="clients container">

<h4>
  We’re trusted by clients.
</h4>
<div class="aggregat d-flex flex-wrap justify-content-between">
<div class="client d-flex flex-column justify-content-between align-items-center">
  <div class="circle"></div>
  <p class="clname">Mina Whatson</p>
  <p class="clprof">CONSULTANT</p>
  <p class="clabout">There are many variations of passages of Lorem Ipsum available, but the
    majority have suffered alteration in some form, by injected humour,
    or randomised words which don't look even slightly believable.
    If you are going to use a passage of Lorem Ipsum, </p>
</div>
<div class="client d-flex flex-column justify-content-between align-items-center">
  <div class="circle"></div>
  <p class="clname">Mina Whatson</p>
  <p class="clprof">CONSULTANT</p>
  <p class="clabout">There are many variations of passages of Lorem Ipsum available, but the
    majority have suffered alteration in some form, by injected humour,
    or randomised words which don't look even slightly believable.
    If you are going to use a passage of Lorem Ipsum, </p>
</div>
</div>

</div>
</section>

@endsection







