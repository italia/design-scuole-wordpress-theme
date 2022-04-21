<?php
    global $calendar_card;
?>
<?php if ($calendar_card == true) {
    ?>
    <div class="card card-bg card-event bg-white card-thumb-rounded">
        <div class="card-body">
    <?php
    }
?>
    <div class="mini-clndr" id="mini-clndr"></div>
    <script type="text/template" id="calendar-template">
        <div class="clndr-controls clearfix">
            <div tabindex="0" class="clndr-previous-button clearfix"></div>
            <div class="month clearfix"><%= month %> <%= year %></div>
            <div tabindex="0" class="clndr-next-button clearfix"></div>
        </div>
        <div class="days-container clearfix">
            <div class="days clearfix">
                <div class="headers clearfix">
                    <% _.each(daysOfTheWeek, function(day) { %>
                    <div class="day-header clearfix"><%= day %></div>
                    <% }); %>
                </div>
                <% _.each(days, function(day) { %>
                <div aria-label="link to <%= moment(day.date).format('D-MM-YYYY') %> events" class="<%= day.classes %>"><a title="<%= day.title %>" href="<?php echo get_post_type_archive_link("evento"); ?>?date=<%= moment(day.date).format('D-MM-YYYY') %> "><%= day.day %></a></div>
                <% }); %>
            </div>
        </div>
    </script>
    <script type="text/javascript">
        moment.locale('it');
        var events = [
            <?php
            $args = array('post_type' => 'evento',
                'posts_per_page' => -1,
                'meta_key' => '_dsi_evento_timestamp_inizio',
                'orderby' => 'meta_value',
                'order'     => 'DESC',
                'meta_query' => array(
                    array(
                        'key' => '_dsi_evento_timestamp_inizio',
                        'value' => time(),
                        'compare' => '>',
                        'type' => 'numeric'
                    )
                )
            );
            $eposts = get_posts($args);
            foreach ($eposts as $epost) {
                $timestamp_inizio = dsi_get_meta("timestamp_inizio", "", $epost->ID);
                $timestamp_fine= dsi_get_meta("timestamp_fine", "", $epost->ID);

                $begin = new DateTime(date_i18n("c",$timestamp_inizio));
                $end = new DateTime(date_i18n("c",$timestamp_fine));

                for($i = $begin; $i <= $end; $i->modify('+1 day')){ ?>
                {date: '<?php echo date("Y-m-d", $i->getTimestamp() + 10000);  ?>'},
                <?php }
            }

            $timestamp_inizio = $timestamp_inizio ? $timestamp_inizio : time();
            $timestamp_fine = $timestamp_fine ? $timestamp_fine : time() + (7 * 24 * 60 * 60);
            ?>
        ];


        jQuery('#mini-clndr').clndr({
            daysOfTheWeek: ['LU', 'MA', 'ME', 'GI', 'VE', 'SA', 'DO'],
            events: events,
            template: jQuery('#calendar-template').html(),
            startWithMonth: "<?php echo date( "Y-m-d", $timestamp_inizio);  ?>"
        });

    </script>
<?php if ($calendar_card == true) {
    ?>
        </div>
    </div>
    <?php
    }
?>

<?php
