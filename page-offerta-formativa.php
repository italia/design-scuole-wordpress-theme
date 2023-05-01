<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Design_Scuole_Italia
 */

get_header();
?>

<?php
$attributes=array(
    'title' => false,
    'limit' => 4,
    'labels' => array(
        'Title 0',
        'Title 1',
        'Title 2',
        'Title 3',
    ),
    'sections' => array(
        'Content 0',
        'Content 1',
        'Content 2',
        'Content 3',
    ),
)

?>

<main id="main-container" class="main-container">
    <section>
        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>
    </section>
    <div class="container">
        
        <section class="bg-white pt-5 pb-3">
            <?php get_template_part('martini-template-parts/carousel/indirizzi', null, 'licei');?>
        </section>

        <section class="bg-white py-5">
            <?php get_template_part('martini-template-parts/carousel/indirizzi', null, 'istituto');?>
        </section>
    </div>

</main>
<?php
get_footer();