<div class="box-body">
	<!-- The time line -->
	<ul class="timeline" style="padding-top: 30px;">
		<!-- timeline time label -->
		
		<!-- /.timeline-label -->
		<!-- timeline item -->
		<li>
			<i class="fa  fa-tag bg-red"></i>

			<div class="timeline-item">

				<h3 class="timeline-header"><a >Intitulé</a></h3>

				<div class="timeline-body">
					{{$equipe->intitule}} 
				</div>
			</div>
		</li>
		<!-- END timeline item -->
		<!-- timeline item -->
		<li>
			<i class="fa fa-user bg-aqua"></i>

			<div class="timeline-item">
			 

				<h3 class="timeline-header no-border"><a>Chef de l'équipe </a></h3>
				<div class="timeline-body">
				 <a href="{{url('membres/'.$equipe->chef_id.'/details')}}"> {{$equipe->chef->name}} {{$equipe->chef->prenom}}
					</a>
				</div>
			</div>
		</li>
		<!-- END timeline item -->
		<!-- timeline item -->
		<li>
			<i class="fa fa-comment bg-yellow"></i>

			<div class="timeline-item">
			<h3 class="timeline-header"><a >Résumé</a></h3>

				<div class="timeline-body">
					{{$equipe->resume}}
				</div>
			</div>
		</li>

		<li>
			<i class="fa fa-search bg-purple"></i>

			<div class="timeline-item">
			<h3 class="timeline-header"><a >Axes de recherche</a></h3>

				<div class="timeline-body">
					{{$equipe->axes_recherche}}
				</div>
			</div>
		</li>
	 
		<li>
			<i class="fa fa-clock-o bg-gray"></i>
		</li>
	</ul>
</div>