<div class="row">
	<canvas id="barThesesThesards" height="100"></canvas>
</div>

<div class="row">
	<canvas id="barArticles" height="110"></canvas>
</div>

<div class="row">
	<canvas id="pieArticles" height="100"></canvas>
</div>

@push('scripts.footer')
<script src="{{ asset('js/chart-js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('js/chart-js/Chart.min.js') }}"></script>

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
					text:'Théses et Thésards par années',
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

function createBarPieArticles(){
	var barArticles = document.getElementById('barArticles').getContext('2d');
	var pieArticles = document.getElementById('pieArticles').getContext('2d');
	var articles = {!!$articles!!};

	var mybarArticlesChart = new Chart(barArticles,{
			type: 'bar',//doughnut, pie
			data: {
							datasets:[
								{
									label: 'Article court',
									data: articles.types[0].reverse(),
									stack: 'stack 0',
									backgroundColor: 'rgba(0,137,123 ,0.8)'
								},
								{
									label: 'Article long',
									data: articles.types[1].reverse(),
									stack: 'stack 0',
									backgroundColor:'rgba(192,202,51 ,0.8)'
								},
								{
									label: 'Brevet',
									data: articles.types[2].reverse(),
									stack: 'stack 0',
									backgroundColor:'rgba(244,81,30 ,0.8)'
								},
								{
									label: 'Chapitre d\'un livre',
									data: articles.types[3].reverse(),
									stack: 'stack 0',
									backgroundColor:'rgba(117,117,117 ,0.8)'
								},
								{
									label: 'Livre',
									data: articles.types[4].reverse(),
									stack: 'stack 0',
									backgroundColor:'rgba(94,53,177 ,0.8)'
								},
								{
									label: 'Poster',
									data: articles.types[5].reverse(),
									stack: 'stack 0',
									backgroundColor:'rgba(57,73,171 ,0.8)'
								},
								{
									label: 'Publication(Revue)',
									data: articles.types[6].reverse(),
									stack: 'stack 0',
									backgroundColor:'rgba(211,47,47 ,0.8)'
								}
							],

							labels:articles.years.reverse(),
						},
			options:{
				title:{
					display:true,
					text:'Articles par types par années',
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

	var myPieArticlesChart = new Chart(pieArticles,{
			type: 'doughnut',//doughnut, pie
			data: {
							datasets:[
								{
									data: articles.typesAll,
									backgroundColor:[
										'rgba(0,137,123 ,0.8)',
										'rgba(192,202,51 ,0.8)',
										'rgba(244,81,30 ,0.8)',
										'rgba(117,117,117 ,0.8)',
										'rgba(94,53,177 ,0.8)',
										'rgba(57,73,171 ,0.8)',
										'rgba(211,47,47 ,0.8)'
									]
								}
							],

							labels:['Article court', 'Article long', 'Brevet', 'Chapitre d\'un livre', 'Livre', 'Poster', 'Publication(Revue)'],
						},
			options:{
				title:{
					display:true,
					text:'Articles par types',
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