<div class="row">
{{-- Membres --}}
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-aqua">
		<div class="inner">
			 <h3>{{$nombres['membres']}}</h3>
			 <p>Membres</p>
		</div>
		<div class="icon">
			<i class="ion-person"></i>
		</div>
	 <a href="{{url('membres')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

{{-- Equipes --}}
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-green">
		<div class="inner">
			 <h3>{{$nombres['equipes']}}<sup style="font-size: 20px"></sup></h3>
			 <p>Equipes</p>
		</div>
		<div class="icon">
			 <i class="ion-ios-people"></i>
		</div>
		<a href="{{url('equipes')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

{{-- These en cours --}}
<div class="col-lg-3 col-xs-6">
	 <div class="small-box bg-yellow">
			<div class="inner">
				 <h3>{{$nombres['theses']}}</h3>
				 <p>Thèses en cours</p>
			</div>
			<div class="icon">
			 <i class="fa fa-clipboard"></i>
			</div>
			<a href="{{url('theses')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	 </div>
</div>

{{-- Articles --}}
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-red">
		<div class="inner">
			<h3>{{$nombres['articles']}}</h3>
			<p>Articles</p>
		</div>
		<div class="icon">
			<i class="ion-ios-paper"></i>
		</div>
		<a href="{{url('articles')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

{{-- Materials --}}
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-purple">
		<div class="inner">
			<h3>{{$nombres['materials']}}</h3>
			<p>Matériels</p>
		</div>
		<div class="icon">
			<i class="fa fa-wrench"></i>
		</div>
		<a href="{{route('materials.index')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

{{-- Partenaires --}}
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-teal">
		<div class="inner">
			<h3>{{$nombres['partenaires']}}</h3>
			<p>Partemaires</p>
		</div>
		<div class="icon">
			<i class="fa fa-handshake-o"></i>
		</div>
		<a href="{{route('partenaires.index')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

{{-- Contacts --}}
<div class="col-lg-3 col-xs-6">
	<div class="small-box bg-aqua">
		<div class="inner">
			<h3>{{$nombres['contacts']}}</h3>
			<p>Contacts</p>
		</div>
		<div class="icon">
			<i class="ion-person"></i>
		</div>
		<a href="{{route('contacts.index')}}" class="small-box-footer">Détails <i class="fa fa-arrow-circle-right"></i></a>
	</div>
</div>

</div>



