<div class="row">
	<div class="col-md-6">
		<canvas id="pieMaterialsEmpruntable" height="150"></canvas>
	</div>
	<div class="col-md-6">
		<canvas id="pieMaterialsDisponible" height="150"></canvas>
	</div>
</div>

@push('scripts.footer')
<script>
function createPieMaterialsEmpruntable(){
	var pieMaterialsEmpruntable = document.getElementById('pieMaterialsEmpruntable').getContext('2d');
	var pieMaterialsDisponible = document.getElementById('pieMaterialsDisponible').getContext('2d');
	var materials = {!!$materials!!};

	var myPieMaterialsEmpruntableChart = new Chart(pieMaterialsEmpruntable,{
			type: 'doughnut',//doughnut, pie
			data: {
							datasets:[
								{
									data: [materials.empruntable ,materials.nonEmpruntable],
									backgroundColor:[
										'rgba(0,137,123 ,0.8)',
										'rgba(192,202,51 ,0.8)'
									]
								}
							],

							labels:['Empruntable','non empruntable'],
						},
			options:{
				title:{
					display:true,
					text:'Materials empruntable',
					fontSize:25
				},
				legend:{
					display:true,
					position:'right',
					labels:{
						fontColor:'#000'
					}
				},
				layout:{
					padding:{
						left:0,
						right:0,
						bottom:0,
						top:0
					}
				},
				tooltips:{
					enabled:true
				}
			}
	});

	var myPieMaterialsDisponibleChart = new Chart(pieMaterialsDisponible,{
			type: 'doughnut',//doughnut, pie
			data: {
							datasets:[
								{
									data: [materials.disponible ,materials.nonDisponible],
									backgroundColor:[
										'rgba(244,81,30 ,0.8)',
										'rgba(94,53,177 ,0.8)'
									]
								}
							],

							labels:['Disponible','non disponible'],
						},
			options:{
				title:{
					display:true,
					text:'Materials disponible',
					fontSize:25
				},
				legend:{
					display:true,
					position:'right',
					labels:{
						fontColor:'#000'
					}
				},
				layout:{
					padding:{
						left:0,
						right:0,
						bottom:0,
						top:0
					}
				},
				tooltips:{
					enabled:true
				}
			}
	});
}
</script>
@endpush