<?php
/* Template Name: Sportello CIC
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
                    <div id="organigramma_page" class="pt-5 px-3">                        
                        <?php the_content(); ?>
                    </div>
                </div><!-- content -->
                 
                <div id="sidebar" class="col-lg-3 offset-lg-1 px-5 px-3 px-lg-3 py-5">
                        <aside class="aside-main aside-sticky">
                            <div class="col-12" id="program-legend">
                                

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
                                    <div class="mailfield pb-1">
                                        <?php
                                        $martini_group_contact = get_post_meta(get_the_ID(), 'martini_group_contact', true);
                                        if (is_array($martini_group_contact) && !empty($martini_group_contact)) { ?>
                                        
                                        <h5>Contatti</h5>
                                        <ul>      
                                            <?php
                                            $martini_group_contact = get_post_meta(get_the_ID(), 'martini_group_contact', true);
                                            if (is_array($martini_group_contact) && !empty($martini_group_contact)) 

                                            foreach ($martini_group_contact as $martini_contact) {
                                                $martini_contatto = esc_html($martini_contact["martini_contatto"], 'nome contatto');
                                                $martini_contatto = esc_html($martini_contact["martini_numero_contatto"], 'numero contatto');
                                                $martini_contatto = esc_html($martini_contact["martini_email"], 'email'); ?>

                                                <li>
                                                    <?php if ($martini_contact["martini_contatto"] != "") echo '<h6 class"mailfield"> ' . $martini_contact["martini_contatto"] . ' </h6>'; ?>
                                                    <?php if ($martini_contact["martini_numero_contatto"] != "") echo '<a href="tel:'.$martini_contact["martini_numero_contatto"].'"> ' . $martini_contact["martini_numero_contatto"] . ' </a>'; ?>
                                                    <br>
                                                    <?php if ($martini_contact["martini_email"] != "") echo '<a href="mailto:'. $martini_contact["martini_email"] . '"> ' . $martini_contact["martini_email"] . ' </a>'; ?>
                                                </li>
                                            
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                        <?php } ?>
                                    </div>
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

                                <!-- Campo link url -->
                                <div class="mailfield pb-1">
                                       <?php
                                       $martini_group_link = get_post_meta(get_the_ID(), 'martini_group_link', true);
                                       if (is_array($martini_group_link) && !empty($martini_group_link)) { ?>
                                      
                                       <h5>Link utili</h5>
                                       <ul>     
                                           <?php
                                           $martini_group_link = get_post_meta(get_the_ID(), 'martini_group_link', true);
                                           if (is_array($martini_group_link) && !empty($martini_group_link))


                                           foreach ($martini_group_link as $martini_link) {
                                               $martini_link_ID = esc_html($martini_link["martini_link_ID"], 'Testo del link');
                                               $martini_url_link = esc_html($martini_link["martini_url_link"], 'link URL');
                                               ?>


                                               <li>
                                                  
                                                   <a href="<?php echo $martini_url_link;?>" target=blank> <?php echo $martini_link_ID;?> </a>
                                                  
                                               </li>
                                          
                                           <?php
                                           }
                                           ?>
                                       </ul>
                                       <?php } ?>
                                   </div>
                               <!--/Campo link url -->
                            </div>
                        </aside>
                    </div> <!--/ sidebar -->

            </div><!-- /row -->
        </div><!-- /container -->
    </section>



</main>



<?php
get_footer();
?>