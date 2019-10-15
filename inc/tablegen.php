
<script type="text/javascript" src="<?php echo plugin_dir_url(__FILE__); ?>includes/excellentexport.min.js"></script>

<div class="table-responsive">

<table class="order-table table table-striped" id="gare">
    <thead>
    <tr><td colspan="6">
            Bandi di gara - <strong><?php if ($anno != 'all') { echo $anno; } else { echo 'Tutti gli anni'; } ?></strong>
            <input style="float:right;" type="search" id="s" class="light-table-filter" data-table="order-table" placeholder="Cerca...">
        </td></tr>
    <tr>
        <th colspan="2" scope="col">Oggetto</th>
        <th scope="col">CIG</th>
        <th scope="col">Importo<br/>agg.</th>
        <th scope="col">Durata<br/>lavori</th>
        <th scope="col">Modalità<br/>affidamento</th>
    </tr>
    </thead>
    <tbody>

    <?php

    if ($anno=="all") { $anno=''; }

    query_posts( array( 'post_type' => 'avcp', 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => -1, 'annirif' => $anno) );

    while ( have_posts() ) : the_post();

        global $post;

        $d_i = get_post_meta(get_the_ID(), 'avcp_data_inizio', true);
        $d_f = get_post_meta(get_the_ID(), 'avcp_data_fine', true);

        $d_i =  $d_i ? date("d/m/Y", strtotime( $d_i )) : '-';
        $d_f =  $d_f ? date("d/m/Y", strtotime( $d_f )) : '-';

        echo '<tr style="display: table-row;">';
        echo '<td scope="row" colspan="2"><a href="' . get_permalink() . '">' . get_the_title() . '</a></td>';
        echo '<td>' . get_post_meta($post->ID, 'avcp_cig', true) . '</td>';
        echo '<td align="center">€<strong>' . get_post_meta($post->ID, 'avcp_aggiudicazione', true) . '</strong></td>';
        echo '<td align="center">' . $d_i . '<br/>' . $d_f . '<br/>';

        if (function_exists('DateTime')) {
            $date1 = new DateTime(get_post_meta(get_the_ID(), 'avcp_data_inizio', true));
            $date2 = new DateTime(get_post_meta(get_the_ID(), 'avcp_data_fine', true));
            $diff = $date2->diff($date1)->format("%a");
            echo '<small><strong>' . $diff . '</strong> gg</small>';
        }

        echo '</td>';

        echo '<td>' . strtolower(substr(get_post_meta(get_the_ID(), 'avcp_contraente', true), 3)) . '</td>';
        echo '</tr>';

    endwhile;
    wp_reset_query();

    echo '</tbody>

    <tfoot>
        <tr>
            <td colspan="6">';

    echo '<div style="float:right;">
                        Scarica in

            <a href="' . get_site_url() . '/avcp" target="_blank" title="File .xml"><button>XML</button></a>
            <a download="' . get_bloginfo('name') . '-gare' . $anno . '.xls" href="#" onclick="return ExcellentExport.excel(this, \'gare\', \'Gare\');"><button>EXCEL</button></a>
            <a download="' . get_bloginfo('name') . '-gare' . $anno . '.csv" href="#" onclick="return ExcellentExport.csv(this, \'gare\');"><button>CSV</button></a>
            </div>';

    echo '</td>
        </tr>
    </tfoot>
    </table>';

    echo '</div>';



    echo '<div class="clear"></div>';
    ?>

    <script>

        (function(document) {
            'use strict';

            var LightTableFilter = (function(Arr) {

                var _input;

                function _onInputEvent(e) {
                    _input = e.target;
                    var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                    Arr.forEach.call(tables, function(table) {
                        Arr.forEach.call(table.tBodies, function(tbody) {
                            Arr.forEach.call(tbody.rows, _filter);
                        });
                    });
                }

                function _filter(row) {
                    var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
                    row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('light-table-filter');
                        Arr.forEach.call(inputs, function(input) {
                            input.oninput = _onInputEvent;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });

        })(document);

    </script>
