<?php
global $post;
?>
<div class="mini-clndr" id="mini-clndr"></div>
<script type="text/template" id="calendar-template">
	<div class="clndr-controls clearfix">
		<div class="clndr-previous-button clearfix"></div>
		<div class="month clearfix"><%= month %> <%= year %></div>
		<div class="clndr-next-button clearfix"></div>
	</div>
	<div class="days-container clearfix">
		<div class="days clearfix">
			<div class="headers clearfix">
				<% _.each(daysOfTheWeek, function(day) { %>
				<div class="day-header clearfix"><%= day %></div>
				<% }); %>
			</div>
			<% _.each(days, function(day) { %>
			<div class="<%= day.classes %>"><a href="<?php echo get_post_type_archive_link("evento"); ?>?date=<%= moment(day.date).format('D-MM-YYYY') %> "><%= day.day %></a></div>
			<% }); %>
		</div>
	</div>
</script>
<script type="text/javascript">
    moment.locale('it');
    <?php if(is_singular(array("evento", "scheda_progetto")) || is_home()){

    $timestamp_inizio = dsi_get_meta("timestamp_inizio");
    $timestamp_fine= dsi_get_meta("timestamp_fine");
    $timestamp_inizio = $timestamp_inizio ? $timestamp_inizio : time();
    $timestamp_fine = $timestamp_fine ? $timestamp_fine : time() + (7 * 24 * 60 * 60);

    $begin = new DateTime(date_i18n("c",$timestamp_inizio));
    $end = new DateTime(date_i18n("c",$timestamp_fine));

   	?>
    var events = [
		<?php for($i = $begin; $i <= $end; $i->modify('+1 day')){ ?>
        { date: '<?php echo date( "Y-m-d", $i->getTimestamp() + 10000);  ?>'},
	    <?php } ?>
    ];
    <?php } ?>

    jQuery('#mini-clndr').clndr({
        daysOfTheWeek: ['LU', 'MA', 'ME', 'GI', 'VE', 'SA', 'DO'],
        events: events,
        template: jQuery('#calendar-template').html(),
        startWithMonth: "<?php echo date( "Y-m-d", $timestamp_inizio );  ?>"
    });

</script>

