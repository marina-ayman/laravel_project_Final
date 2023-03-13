

@extends('temp')
@section('bodyContent')

<link rel="stylesheet" href="{{asset("./assets/css/index.css")}}">
<div class="content">

{{-- 
	<link rel="stylesheet" href="./assets/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="./assets/css/owl-carousel.css" >
	 <link rel="stylesheet" href="./assets/css/bootstrap.min.css" > --}}

{{-- need carsoul --}}
	<div class="section full-height">
		<div class="absolute-center">
			<div class="section">
				<div class="container">
					<div class="row">
						<div class="col-12">
				<h1><span>M</span><span>A</span><span>K</span><span>E</span>  <span>U</span><span>R</span>  <span>T</span><span>R</span><span>I</span><span>P</span><br>
				<span>M</span><span>U</span><span>T</span><span>E</span></h1>
				<p>🤍💙</p>	
						</div>	
					</div>		
				</div>		
			</div>
			<div class="section mt-5">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div id="switch">
								<div id="circle"></div>
							</div>
						</div>	
					</div>		
				</div>			
			</div>
		</div>
	</div>
	<div class="my-5 py-5">
	</div> 




</div>


<section class="popular-places" id="popular">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading">
					<span>Popular Places</span>
					<h2>Integer sapien odio</h2>
				</div>
			</div> 
		</div> 
		<div class="owl-carousel owl-theme">
			<div class="item popular-item">
				<div class="thumb">
					<img src="{{asset("./assets/imgs/3.png.jpg")}}" alt="">
					<div class="text-content">
						<h4>Mauris tempus</h4>
						<span>76 listings</span>
					</div>
					<div class="plus-button">
						<a href="#"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
			<div class="item popular-item">
				<div class="thumb">
					<div class="text-content">
						<h4>Aenean dolor</h4>
						<span>18 listings</span>
					</div>
					<img src="{{asset("./assets/imgs/3.png.jpg")}}" alt="">
					<div class="plus-button">
						<a href="#"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
			<div class="item popular-item">
				<div class="thumb">
					<div class="text-content">
						<h4>Nunc at quam</h4>
						<span>55 listings</span>
					</div>
					<img src="{{asset("./assets/imgs/3.png.jpg")}}" alt="">
					<div class="plus-button">
						<a href="#"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
			<div class="item popular-item">
				<div class="thumb">
					<img src="{{asset("./assets/imgs/3.png.jpg")}}" alt="">
					<div class="text-content">
						<h4>Fusce ac turpis</h4>
						<span>66 listings</span>
					</div>
					<div class="plus-button">
						<a href="#"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
		
					<div class="plus-button">
						<a href="#"><i class="fa fa-plus"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>























	@endsection