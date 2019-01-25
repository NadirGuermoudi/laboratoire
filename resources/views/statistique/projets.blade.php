<div class="row">
	<canvas id="barProjets" height="100"></canvas>
</div>

@push('scripts.footer')
<script>
function createBarProjets(){
	var barProjets = document.getElementById('barProjets').getContext('2d');
	var projets = {!!$projects!!};

	var mybarProjetsChart = new Chart(barProjets,{
			type: 'bar',//doughnut, pie
			data: {
							datasets:projets.equipes,
							// 	{
							// 		label: 'Theses',
							// 		// data: projets.theses.reverse(),
							// 		backgroundColor: 'rgba(0,137,123 ,0.8)'
							// 	},
							// 	{
							// 		label: 'Thesards',
							// 		// data: projets.thesards.reverse(),
							// 		backgroundColor:'rgba(192,202,51 ,0.8)'
							// 	}
							// ],

							labels:projets.years.reverse(),
						},
			options:{
				title:{
					display:true,
					text:'Projets par equipe par années',
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
				},
				scales:{
					yAxes:[{
						ticks:{
							stepSize:1
						}
					}]
				}
			}
	});
}
</script>
@endpush