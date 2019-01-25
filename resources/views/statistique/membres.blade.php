<div class="row">
	<canvas id="pieMembre" height="100"></canvas>
</div>

@push('scripts.footer')
<script>
function createPieMombre(){
	var pieMembre = document.getElementById('pieMembre').getContext('2d');
	var grades = {!!$grades!!};

	var myPieMembreChart = new Chart(pieMembre,{
			type: 'doughnut',//doughnut, pie
			data: {
							datasets:[
								{
									data: Object.values(grades),
									backgroundColor:[
										'rgba(0,137,123 ,0.8)',
										'rgba(192,202,51 ,0.8)',
										'rgba(244,81,30 ,0.8)',
										'rgba(117,117,117 ,0.8)',
										'rgba(94,53,177 ,0.8)',
										'rgba(57,73,171 ,0.8)'
									]
								}
							],

							labels:Object.keys(grades),
						},
			options:{
				title:{
					display:true,
					text:'Membres par grades',
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

{{-- <script type="text/javascript">
	var orders = $('#orders');
	var name = $('#name');
	var drink = $('#drink');

	function addOrder(order){
		$orders.append('<li>name : '+ order.name + ', drink....');
	}
	$(function(){

		$.ajax({
			type:'POST',
			url: "{{ route('statistique.ffff') }}",
			success: function(orders){
				$.each(orders, function(i, order){
					addOrder(order);
				});
			},
			error:function(){
				alert('Erreur Ajax');
			}
		});
	});

	$('#add-order').click(function(){
		var order = {
			name: $name.val(),
			drink: $drink.val(),
		};

		$.ajax({
			type: 'POST',
			url: "{{ route('statistique.ffff') }}",
			data: order,
			success: function(){
				addOrder(newOrder);
			},
			error:function(){
				alert('Erreur Ajax');
			}
		});
	});
</script> --}}