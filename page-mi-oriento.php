<?php
/* Template Name: Mi oriento
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

<main id="main-container" class="main-container">
       
      
       <?php get_template_part("martini-template-parts/hero/hero_title"); ?> 


    <section id="text-block" class="section bg-white">
        <div class="container">
            <div class="row main-content variable-gutters">
                
                <div class="col-lg-8 mt-5 mb-5">
                    <div class="pt-5 px-3">
                        <h4 class="mb-4">Il nuovo servizio di School Counseling del Martino Martini</h4>
                        <p>Sei in difficoltà con il tuo percorso scolastico e non sai se hai fatto la scelta giusta? Hai bisogno di aiuto nella scelta del percorso di Alternanza Scuola Lavoro? Vuoi orientarti meglio rispetto alle scelte post-diploma? Hai desideri e talenti ma non sai come realizzarli? Hai bisogno di aiuto nella compilazione del tuo CV o nella redazione del tuo portfolio?</p>
                        <p>Scrivi a <a href="mailto:mioriento@martinomartini.eu">mioriento@martinomartini.eu</a> e prendi appuntamento.</p>
                    </div>
                    <div class="col-sm-10 offset-sm-1 mt-5 mb-3">
                            <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                    </div> 
                </div><!-- content -->
                 
                <div id="sidebar" class="col-lg-3 offset-lg-1 px-5 px-3 px-lg-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12 col-lg-9" id="program-legend">
                                

                                <!-- Altre informazioni -->
                                 <?php
                                $ulteriori_informazioni = get_post_meta( get_the_ID(), 'martini_info', true );
                                if(trim($ulteriori_informazioni) != ""){
                                    ?>
                                    <h5>Altre informazioni</h5> 
                                    <div class="row variable-gutters">
                                        <div id="quotes" class="col-12 wysiwig-text">
                                            <?php echo wpautop($ulteriori_informazioni); ?>
                                        </div>
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <!-- //Altre informazioni -->

                                <!-- Campo contatti -->
                                <?php 
                                $emails = get_post_meta( get_the_ID(), 'martini_email', true );
                                $phone = get_post_meta( get_the_ID(), 'martini_phone', true );

                                
                                if(is_array ($emails) && count($emails) && strlen($emails[0])){ ?>
                                <h5>Contatti</h5> 
                                <ul class="link-list">
                                    
                                    <?php foreach ( $emails as $email){?>
                                    
                                    <li>
                                         <a href="mailto:<?php echo $email;?>" target=blank> <?php echo $email;?> </a> 
                                    </li>
                                    <?php }?>                        
                                </ul>
                                <?php } ?>

                                <?php
                                if(is_array ($phone) && count($phone) && strlen($phone[0])){ ?>
                                <h6>Telefono</h6>
                                <ul class="">
                                    
                                    <?php foreach ( $phone as $phone){?>
                                    
                                    <li>
                                         <a href="tel:<?php echo $phone;?>"> <?php echo $phone;?> </a> 
                                    </li>
                                    <?php }?>
                                   
                                </ul>

                                <?php } ?>
                                <!--/Campo contatti -->
                                
                                <!-- Campo modulistica -->
                                <?php 
                                $multidocuments_download = get_post_meta( get_the_ID(), 'documents_download', true );
                                if(is_array ($multidocuments_download) && !empty($multidocuments_download)){ ?>
                                <h5>Modulistica</h5> 
                                <ul class="link-list uppercase_text">
                                    
                                    <?php foreach ( $multidocuments_download as $docID => $documenti){?>
                                    
                                    <li>
                                         <a href="<?php echo $documenti;?>" target=blank> <?php echo get_the_title($docID);?> </a> 
                                    </li>
                                    <?php }?>
                                    
                                </ul>
                                <?php } ?>
                                <!--/Campo modulistica -->

                                <!-- Campo link -->
                                <?php 
                                $link_url = get_post_meta( get_the_ID(), 'martini_url', true );
                                
                                if(is_array ($link_url) && count($link_url) && strlen($link_url[0])){ ?>
                                <h5>Link utili</h5> 
                                <ul class="link-list">
                                    
                                    <?php foreach ( $link_url as $link_url){?>
                                    
                                    <li>
                                         <a href="<?php echo $link_url;?>" target=blank> <?php echo $link_url;?> </a> 
                                    </li>
                                    <?php }?>                         
                                </ul>
                                <?php } ?>
                                <!--/Campo link -->
                            </div>
                        </aside>
                    </div> <!--/ sidebar -->

            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();