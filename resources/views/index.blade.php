
@extends('layouts.master')
@section('content')

@include('header')
<h4 id="welcome">Welcome to Quik Pizza</h4>
<div id="container">
 <!-- Carousel code Starts -->
    <div  id="login_carousel" class="carousel slide" data-ride="carousel" >
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#login_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#login_carousel" data-slide-to="1" class=""></li>
        <li data-target="#login_carousel" data-slide-to="2" class=""></li>
      </ol>
 
        <div class="carousel-inner">
        <div class="item active">
          <img class="img-rounded" src="/images/PizzaPageBanner.jpg" alt="00">
          <div class="carousel-caption">

            <p></p>
          </div>
        </div>

        <div class="item">
          <img class="img-rounded" src="/images/pizza-pic3.jpg" alt="44">
          <div class="carousel-caption">

            <p></p>
          </div>
        </div> 
        <div class="item">
          <img class="img-rounded" src="/images/pizza-pic4.jpg" alt="47">
          <div class="carousel-caption">

            <p></p>
          </div>
        </div>            
      </div>
  
      <!-- Controls -->
      <a class="left carousel-control" href="#login_carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#login_carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
    <!-- Carousel code Ends --></div>

</div>

@endsection