<?php
/* Template Name: 1 Livello - terza media
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();


?>

    <main id="main-container" class="main-container">

        <?php get_template_part("martini-template-parts/hero/hero_title"); ?>

        <?php
        while ( have_posts() ) :
            the_post();
            set_views($post->ID);
            

            $mail = get_post_meta("martini_email");
            $phone = get_post_meta("martini_phone");
            $documenti = get_post_meta("documents_download");
            $link_url = get_post_meta("martini_url");
            $ulteriori_informazioni = get_post_meta("martini_info");
            $info_variabili_titolo = get_post_meta("martini_titolo");
            $info_variabili = get_post_meta("martini_info_variable");

        ?>

        <section id="text-block" class="section bg-white">
            <div class="container">
                <div class="row main-content variable-gutters">

                    <div class="col-lg-8 mt-5 mb-5">
                        <div class="pt-5 px-3">
                            <p>Nel 2012 l’Istituto Martino Martini è diventato <strong>centro EDA. </strong><br><br>

                                La sua offerta formativa include un corso finalizzato al conseguimento del diploma conclusivo del primo ciclo di istruzione, previo superamento dell’Esame di Stato finale <strong>(diploma di terza media)</strong>. <br><br>
                                Si rivolge agli adulti (che hanno compiuto sedici anni), italiani e stranieri, che desiderano completare gli studi interrotti da ragazzi. <br><br>
                                Il corso si svolge nel periodo ottobre-maggio.
                            </p>
                            
                            <?php the_content(); ?>
                        </div>
                    </div><!-- /col-lg-6 -->

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

                                <!-- Info variabili - titolo -->
                                 <?php
                                $info_variabili_titolo = get_post_meta( get_the_ID(), 'martini_titolo', true );
                                if(trim($info_variabili_titolo) != ""){
                                    ?>
                                    <h5><?php echo wpautop($info_variabili_titolo); ?></h5> 
                                    <?php
                                }
                                ?>
                                <!-- //Info variabili - titolo -->

                                <!-- Info variabili -->
                                 <?php
                                $info_variabili = get_post_meta( get_the_ID(), 'martini_info_variable', true );
                                if(trim($info_variabili) != ""){
                                    ?>
                                    <div class="row variable-gutters">
                                        <div class="col-12 wysiwig-text">
                                            <?php echo wpautop($info_variabili); ?>
                                        </div>
                                    </div><!-- /row -->
                                    <?php
                                }
                                ?>
                                <!-- //Info variabili -->

                                

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
endwhile;
get_footer();