<?php
/* Template Name: Persone
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */
global $post;
get_header();


?>
<main id="main-container" class="main-container redbrown">
	
	<?php get_template_part("template-parts/common/breadcrumb"); ?>
	
	<?php get_template_part("template-parts/hero/persone"); ?>

<?php 
$args = array('meta_query' => array(
	'relation' => 'AND',
		array(
			'key' => '_dsi_persona_ruolo_scuola',
			'value'	=>	'dirigente'
		),
		array(
			'key' => '_dsi_persona_privacy_hidden',
			'value'	=>	'false'
		)
));
$users = get_users($args);
$number_of_users = count($users); 
if ($number_of_users > 0) {
?>	
	<section class="section mt-4">
		<div class="container">
			<div class="title-section mb-5">
			<h2 class="h4">Dirigente Scolastico</h2>
			</div>	
		<div class="row variable-gutters">	
		<?php  
			foreach($users as $user){
				$autore = get_user_by("ID", $user->data->ID);
				get_template_part("template-parts/autore/card-persona");
			}
		?>
		</div>		
	</section>					
<?php } ?>

<?php 
$args = array('meta_query' => array(
	'relation' => 'AND',
		array(
			'key' => '_dsi_persona_ruolo_scuola',
			'value'	=>	'docente'
		),
		array(
			'key' => '_dsi_persona_privacy_hidden',
			'value'	=>	'false'
		)
));	
$users = get_users($args);
$number_of_users = count($users); 
if ($number_of_users > 0) { 
?>				
	<section class="section mt-4">
		<div class="container">
			<div class="title-section mb-5">
			<h2 class="h4">Personale docente</h2>
			</div>		
		<div class="row variable-gutters">	
		<?php  
			foreach($users as $user){
				$autore = get_user_by("ID", $user->data->ID);
				get_template_part("template-parts/autore/card-persona");
			}
		?>
		</div>		
	</section>	
<?php } ?>


<?php 
$args = array('meta_query' => array(
	'relation' => 'AND',
		array(
			'key' => '_dsi_persona_ruolo_scuola',
			'value'	=>	'personaleata'
		),
		array(
			'key' => '_dsi_persona_privacy_hidden',
			'value'	=>	'false'
		)
));
$users = get_users($args);
$number_of_users = count($users); 
if ($number_of_users > 0) {
?>
	<section class="section mt-4">
		<div class="container">
			<div class="title-section mb-5">
			<h2 class="h4">Personale non docente</h2>
			</div>	
		<div class="row variable-gutters">	
		<?php  
			foreach($users as $user){
			$autore = get_user_by("ID", $user->data->ID);
			get_template_part("template-parts/autore/card-persona");
			}
		?>
		</div>		
	</section>	
<?php } ?>

<?php 
	$contenuto_ulteriore = dsi_get_option("contenuto_ulteriore_sezione_persone", "persone");
	if($contenuto_ulteriore!= "") {
		?>
		<section class="section bg-light py-5">
			<div class="container">
				<div class="title-section">
					<h2 class="h4">Informazioni ulteriori</h2>
				</div>
				<?php echo $contenuto_ulteriore; ?>
			</div>
		</section>
		<?php
	} 
?>

</main>

<?php
get_footer();
