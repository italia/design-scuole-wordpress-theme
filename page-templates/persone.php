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
<main id="main-container" class="main-container bluelectric">
	
	<?php get_template_part("template-parts/common/breadcrumb"); ?>
	
	<?php get_template_part("template-parts/hero/persone"); ?>
	
	<section class="section <?php echo $classcolor; ?> py-5">
		<div class="container">
			<div class="title-section mb-5">
				<h2 class="h4">
				<?php $args = array('meta_key' => '_dsi_persona_ruolo_scuola','meta_value'	=> 'dirigente');
				$users = get_users($args);$number_of_users = count($users); if ($number_of_users > 0) {echo 'Dirigente scolastico';}?>
				</h2>
			</div>	
		<div class="row variable-gutters">	
		<?php  
		$args = array('meta_key' => '_dsi_persona_ruolo_scuola',  'meta_value'	=> 'dirigente');
		$users = get_users($args);
			foreach($users as $user){
			$autore = get_user_by("ID", $user->data->ID);
			get_template_part("template-parts/autore/card-persona");
			}
		?>
		</div>		
	</section>					
				
	<section class="section <?php echo $classcolor; ?> py-5">
		<div class="container">
			<div class="title-section mb-5">
				<h2 class="h4">
				<?php $args = array('meta_key' => '_dsi_persona_ruolo_scuola','meta_value'	=> 'docente');
				$users = get_users($args);$number_of_users = count($users); if ($number_of_users > 0) {echo 'Personale docente';}?>
				</h2>
			</div>	
		<div class="row variable-gutters">	
		<?php  
		$args = array('meta_key' => '_dsi_persona_ruolo_scuola',  'meta_value'	=> 'docente');
		$users = get_users($args);
			foreach($users as $user){
			$autore = get_user_by("ID", $user->data->ID);
			get_template_part("template-parts/autore/card-persona");
			}
		?>
		</div>		
	</section>	


	<section class="section <?php echo $classcolor; ?> py-5">
		<div class="container">
			<div class="title-section mb-5">
				<h2 class="h4">
				<?php $args = array('meta_key' => '_dsi_persona_ruolo_scuola','meta_value'	=> 'personaleata');
				$users = get_users($args);$number_of_users = count($users); if ($number_of_users > 0) {echo 'Personale non docente';}?>
				</h2>
			</div>	
		<div class="row variable-gutters">	
		<?php  
		$args = array('meta_key' => '_dsi_persona_ruolo_scuola',  'meta_value'	=> 'personaleata');
		$users = get_users($args);
			foreach($users as $user){
			$autore = get_user_by("ID", $user->data->ID);
			get_template_part("template-parts/autore/card-persona");
			}
		?>
		</div>		
	</section>	
	

</main>

<?php
get_footer();



