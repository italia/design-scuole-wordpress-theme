<div id="pre-header" class="bg-petrol desktop">
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-8">
                <a href="https://www.miur.gov.it/" target="_blank" style="margin-right: 10px" aria-label="MIUR - Collegamento esterno - Apre su nuova scheda">
                    <strong>MIUR</strong>
                </a>
                <a href="mailto:KRPC02000L@istruzione.it" style="margin-right: 10px" target="_blank" aria-label="Indirizzo email del liceo">
                    <strong> <i class="fa fa-envelope" aria-hidden="true"></i> KRPC02000L@istruzione.it</strong>
                </a>
                <a href="tel:00390962905731" style="margin-right: 10px" target="_blank" aria-label="Numero di telefono del liceo">
                    <strong> <i class="fa fa-phone" aria-hidden="true"></i> 0962905731</strong>
                </a>
                <span>Codice Meccanografico KRPC02000L  Codice Fatturazione UFHY7G</span>
            </div><!-- /col-6 -->
            <div class="col-4 header-utils-wrapper">
                <div class="header-utils">
                    <?php
                    if(!is_user_logged_in()) {
                        get_template_part("template-parts/header/header-anon");
                    }else{
                        get_template_part("template-parts/header/header-logged");
                    }
                    ?>
                </div><!-- /header-utils -->
            </div><!-- /col-6 -->
        </div><!-- /row -->
    </div><!-- /container -->
</div>

<div id="pre-header" class="bg-petrol mobile">
    <div class="container">
        <div class="row variable-gutters">
            <div class="col-8">
                <a href="https://www.miur.gov.it/" target="_blank" style="margin-right: 10px" aria-label="MIUR - Collegamento esterno - Apre su nuova scheda">
                    <strong>MIUR</strong>
                </a>
                <a href="mailto:KRPC02000L@istruzione.it" style="margin-right: 10px" target="_blank" aria-label="Indirizzo email del liceo">
                    <strong> <i class="fa fa-envelope" aria-hidden="true"></i></strong>
                </a>
                <a href="tel:00390962905731" style="margin-right: 10px" target="_blank" aria-label="Numero di telefono del liceo">
                    <strong> <i class="fa fa-phone" aria-hidden="true"></i> </strong>
                </a>
                
            </div><!-- /col-6 -->
            <div class="col-4 header-utils-wrapper">
                <div class="header-utils">
                    <?php
                    if(!is_user_logged_in()) {
                        get_template_part("template-parts/header/header-anon");
                    }else{
                        get_template_part("template-parts/header/header-logged");
                    }
                    ?>
                </div><!-- /header-utils -->
            </div><!-- /col-6 -->
        </div><!-- /row -->
    </div><!-- /container -->
</div>

<?php
