<?php
/* Template Name: Persone
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post;
get_header();

function visualizza_utenti($ruolo_utente, $intestazione_sezione) {
    // carica tutti gli utenti e li ordina per cognome
	$args = array(
        'meta_key' => 'last_name', 
        'orderby' => 'meta_value',
        'order' => 'ASC', 
        //seleziona gli utenti in base al ruolo
	'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_dsi_persona_ruolo_scuola',
                'value' => $ruolo_utente,
                'compare' => '='
            )
        )
    );
$users = get_users($args);
    $number_of_users = count($users);
    if ($number_of_users > 0) {
        ?>
        <section class="section mt-4">
            <div class="container">
                <div class="title-section mb-5">
                <h2 class="h4"><?php echo $intestazione_sezione; ?></h2>
                </div>
            <div class="row variable-gutters">
            <?php
                foreach ($users as $user) {
                    global $autore; 
                    $autore = get_user_by("ID", $user->ID); 
                    get_template_part("template-parts/autore/card-persona");
                }
            ?>
            </div>      
        </section>  
        <?php
    }
}

?>
	
<main id="main-container" class="main-container redbrown">

    <?php get_template_part("template-parts/common/breadcrumb"); ?>
    <?php get_template_part("template-parts/hero/persone"); ?>
    <?php visualizza_utenti('dirigente', 'Dirigente Scolastico'); ?>
    <?php visualizza_utenti('docente', 'Personale docente'); ?>
    <?php visualizza_utenti('personaleata', 'Personale non docente'); ?>

</main>

<?php
get_footer();
