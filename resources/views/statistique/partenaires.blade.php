<div class="row">
	<canvas id="piePartenaires" height="100"></canvas>
</div>

@push('scripts.footer')
<script>
function createPiePartenaires(){
	var piePartenaires = document.getElementById('piePartenaires').getContext('2d');
	var partenaires = {!!$partenaires!!};

	var myPiePartenairesChart = new Chart(piePartenaires,{
			type: 'pie',//doughnut, pie
			data: {
							datasets:[
								{
									data: [partenaires.encadreurs ,partenaires.coencadreurs, partenaires.articles, partenaires.projects],
									backgroundColor:[
										'rgba(0,137,123 ,0.8)',
										'rgba(192,202,51 ,0.8)',
										'rgba(244,81,30 ,0.8)',
										'rgba(117,117,117 ,0.8)'
									]
								}
							],

							labels:['encadreur','Co encadreur', 'contacts articles', 'contacts projets'],
						},
			options:{
				// title:{
				// 	display:true,
				// 	text:'contacts ',
				// 	fontSize:25
				// },
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