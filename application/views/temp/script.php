
    <!-- Jquery JS-->
    <script src="<?php echo base_url();?>/assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url();?>/assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url();?>/assets/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url();?>/assets/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url();?>/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url();?>/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url();?>/assets/vendor/select2/select2.min.js">
	</script>
	<!-- calendier -->
	<script src="<?= base_url();?>/assets/vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script src="<?= base_url();?>/assets/vendor/fullcalendar-3.10.0/fullcalendar.js"></script>
	<!-- DataTables -->
	<script src="<?= base_url();?>/assets/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url();?>/assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url();?>/assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url();?>/assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>/assets/jquery/buttons.print.min.js"></script>
  <script src="<?= base_url();?>/assets/jquery/dataTables.buttons.min.js"></script>
  <script src="<?= base_url();?>/assets/jquery/jszip.min.js"></script>
	<script>
	$(function () {
		// $('#example1').DataTable( {
		// 	dom: 'Bfrtip',
		// 	buttons: [
    //       'copy', 'csv', 'excel', 'pdf', 'print'
    //     ]
    // // 	});
		// $("#example1").DataTable({
		// 	"responsive": true,
    //   "autoWidth": false,
		// });
		
		$('#example1').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
    $('#example2').DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
<!-- calendar -->
<script type="text/javascript">
$(function() {
  // for now, there is something adding a click handler to 'a'
  var tues = moment().day(2).hour(19);

  // build trival night events for example data
  var events = [
    {
      title: "Special Conference",
      start: moment().format('YYYY-MM-DD'),
      url: '#'
    },
    {
      title: "Doctor Appt",
      start: moment().hour(9).add(2, 'days').toISOString(),
      url: '#'
    }

  ];

  var trivia_nights = []

  for(var i = 1; i <= 4; i++) {
    var n = tues.clone().add(i, 'weeks');
    console.log("isoString: " + n.toISOString());
    trivia_nights.push({
      title: 'Trival Night @ Pub XYZ',
      start: n.toISOString(),
      allDay: false,
      url: '#'
    });
  }

  // setup a few events
  $('#calendar').fullCalendar({
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,agendaWeek,agendaDay,listWeek'
    },
    events: events.concat(trivia_nights)
  });
});
    </script>

    <!-- Main JS-->
    <script src="<?php echo base_url();?>/assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>/assets/canvasjs.min.js"></script>