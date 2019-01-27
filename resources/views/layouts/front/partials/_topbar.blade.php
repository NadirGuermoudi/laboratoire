<div class="topbar">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="topbar-call text-left">
					<ul>
						@if(isset($labo->email))
						<li><i class="fa fa-envelope-o theme-color"></i> {{ $labo->email }}</li>
						@endif
						@if(isset($labo->telephone))
						<li><i class="fa fa-phone"></i> <a href="tel:+7042791249"> <span>{{ $labo->telephone }}</span> </a> </li>
						@endif
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="topbar-social text-right">
					<ul>
						@if(isset($labo->facebook))
						<li><a href="https://{{ $labo->facebook }}"><span class="ti-facebook"></span></a></li>
						@endif
						<li><a href="https://{{ $labo->google }}"><span class="ti-google"></span></a></li>
						@if(isset($labo->google))
						<li><a href="https://{{ $labo->twitter }}"><span class="ti-twitter"></span></a></li>
						@endif
						@if(isset($labo->youtube))
						<li><a href="https://{{ $labo->youtube }}"><span class="ti-youtube"></span></a></li>
						@endif
					</ul>
				</div>
			</div>
		 </div>
	</div>
</div><!--topbar-->