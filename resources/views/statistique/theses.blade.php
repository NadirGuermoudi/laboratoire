<div class="row">
	<canvas id="barThesesThesards" height="100"></canvas>
</div>

@push('scripts.footer')
<script>
function createBarThesesThesard(){
	var barThesesThesards = document.getElementById('barThesesThesards').getContext('2d');
	var thesesThesard = {!!$thesesThesard!!};

	var mybarThesesThesardsChart = new Chart(barThesesThesards,{
			type: 'bar',//doughnut, pie
			data: {
							datasets:[
								{
									label: 'Theses',
									data: thesesThesard.theses.reverse(),
									backgroundColor: 'rgba(0,137,123 ,0.8)'
								}
								// ,{
								// 	label: 'Thesards',
								// 	data: thesesThesard.thesards.reverse(),
								// 	backgroundColor:'rgba(192,202,51 ,0.8)'
								// }
							],

							labels:thesesThesard.years.reverse(),
						},
			options:{
				title:{
					display:true,
					text:'Théses par années',
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