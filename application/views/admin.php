<!-- <div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<!-- <div class="col-lg-3">
					<a href="<?= base_url('EtudiantsControllers/index'); ?>">
						<button type="button" class="btn btn-outline-primary btn-lg btn-block">
							<span class="fa fa-edit"></span> sommes 
						</button>
					</a>
				</div> -->
				<!-- <h2 class="col-lg-4 title-1 m-b-25">Listes des Eleves</h2>
				<div class="col-lg-4">
					<div class="overview-wrap">
						<button class="btn btn-outline-primary btn-lg btn-block" data-toggle="modal" data-target="#largeModal">
							<i class="zmdi zmdi-plus"></i>
							Payements
						</button>
					</div>
				</div> -->
			</div>
			<br>
			<div class="row">
				<div class="col-sm-12 col-lg-12">
				<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
			
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="largeModalLabel">Payement de frais d'inscriptions</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('ParametreControllers/addClasse') ?>" method="post" novalidate="novalidate">
					
					<div class="form-group">
						<label for="classe_serie" class="control-label mb-1">Nombre de matiere</label>
							<input id="nombre_matiere" name="input_val[nombre_matiere]" type="number" class="form-control" aria-required="true" aria-invalid="false" placeholder="20">
						
					</div>
					<input id="save" name="save"  type="submit" class="btn btn-lg btn-success" value="Enregistrer">
					
				</form>
			</div>
		</div>
	</div>
</div>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Crude Oil Reserves vs Production, 2016"
	},	
	axisY: {
		title: "Billions of Barrels",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "Millions of Barrels/day",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Proven Oil Reserves (bn)",
		legendText: "Proven Oil Reserves",
		showInLegend: true, 
		dataPoints:[
			{ label: "Saudi", y: 266.21 },
			{ label: "Venezuela", y: 302.25 },
			{ label: "Iran", y: 157.20 },
			{ label: "Iraq", y: 148.77 },
			{ label: "Kuwait", y: 101.50 },
			{ label: "UAE", y: 97.8 }
		]
	},
	{
		type: "column",	
		name: "Oil Production (million/day)",
		legendText: "Oil Production",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "Saudi", y: 10.46 },
			{ label: "Venezuela", y: 2.27 },
			{ label: "Iran", y: 3.99 },
			{ label: "Iraq", y: 4.45 },
			{ label: "Kuwait", y: 2.92 },
			{ label: "UAE", y: 3.1 }
		]
	}]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
</script> -->
