<div class="app-main__outer">
		<div class="app-main__inner" >         
			<div class="row">
				<div class="col-md-12 col-lg-8 mb">
					<div class="mb-3 card">
						<div class="card-body">
							<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 ">
					
					<div class="card mb-3 widget-content bg-premium-dark">
						<a href="<?= base_url();?>login/admin_acceuil"  class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Economes</div>
								<div class="widget-subheading">2020-2021</div>
							</div>
							<div class="widget-content-right">
								<h3><span class="counter">72,320</span>	</h3>
							</div>
						</a>
					</div>
					<!-- raccourcis -->
					<div class="card mb-3 widget-content bg-arielle-smile">
						<a href="<?= base_url('ElevesControllers/statistique') ?>" class="widget-content-wrapper text-white">
							<div class="widget-content-left">
								<div class="widget-heading">Etudiants </div>
								<div class="widget-subheading">2000-2021</div>
							</div>
							<div class="widget-content-right">
								<h3><span class="counter">72,320</span>	</h3>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
	   
	</div>
</div>
</body>

<!-- script JS -->	
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title: {
		text: "Monthly Sales Data"
	},
	axisX: {
		includeZero: false,
		suffix: " "
	},
	axisY: {
		prefix: "$",
		labelFormatter: addSymbols
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
	{
		type: "column",
		name: "Fille",
		showInLegend: true,
		color: "blue",
		xValueFormatString: "MMMM YYYY",
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 5000 },
			{ x: new Date(2016, 1), y: 7000 },
			{ x: new Date(2016, 2), y: 6000}
		]
	}, 
	{
		type: "column",
		name: "FiGarcon",
		showInLegend: true,
		color: "green",
		xValueFormatString: "MMMM YYYY",
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 40000 },
			{ x: new Date(2016, 1), y: 42000 },
			{ x: new Date(2016, 2), y: 45000 }
		]
	}, 
	{
		type: "line",
		name: "Expected Sales",
		showInLegend: true,
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 40000 },
			{ x: new Date(2016, 1), y: 42000 },
			{ x: new Date(2016, 2), y: 45000 }
		]
	},
	{
		type: "area",
		name: "Profit",
		markerBorderColor: "white",
		markerBorderThickness: 2,
		showInLegend: true,
		yValueFormatString: "$#,##0",
		dataPoints: [
			{ x: new Date(2016, 0), y: 5000 },
			{ x: new Date(2016, 1), y: 7000 },
			{ x: new Date(2016, 2), y: 6000}
		]
	}]
});
chart.render();

function addSymbols(e) {
	var suffixes = ["", "K", "M", "B"];
	var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);

	if(order > suffixes.length - 1)                	
		order = suffixes.length - 1;

	var suffix = suffixes[order];      
	return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
</html>

