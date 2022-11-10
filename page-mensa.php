<?php
/* Template Name: Mensa
 *
 * didattica template file
 *
 * @package Design_Scuole_Italia
 */

get_header();

$presentazione_landing_url = dsi_get_template_page_url("page-templates/presentazione.php");
?>



<main id="main-container" class="main-container">
       
    <?php get_template_part("martini-template-parts/hero/hero_page"); ?> 
    <div class="container">
        <section id="image-block">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h2>La mensa</h2>
                    <p>La mensa del Martini è gestita dalla <a href="">Comunità Rotaliana-Königsberg</a>. 
                    L’accesso al servizio mensa è consentito agli studenti solo nelle giornate in cui hanno un rientro pomeridiano obbligatorio.  Agli studenti iscritti alle attività <strong>facoltative</strong> pomeridiane è data la possibilità di usufruire del servizio mensa utilizzando i buoni cartacei al costo unitario di € 7,18.
                    Non sarà possibile acquistare un singolo buono cartaceo, ma solo un minimo di 5 buoni al costo di € 35,90, facendo un bonifico bancario intestato all’Istituto Martino Martini, utilizzando il seguente IBAN:  <strong>I T 4 9 V 0 2 0 0 8 3 5 0 4 0 0 0 0 0 0 5 8 4 3 8 0 4</strong> indicando la seguente causale: <strong>buoni mensa cartacei - Cognome e nome (dello studente)</strong> ritirando i buoni acquistati presso la segreteria didattica in orario aperto al pubblico (signora Rita Cristan) dietro presentazione della contabile del bonifico effettuato. </p>
                </div>
                <div class="col-sm-12 offset-md-1 col-md-5">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/img-placeholder-500x384.jpg" alt="">
                </div>
            </div>
        </section>
        
        <section id="image-block">
            <div class="row">
            
                <div class="col-sm-12 col-md-6 offset-md-1 order-md-2">
                    <h2>Prenotazione</h2>
                    <p><strong>La prenotazione del pasto</strong> può essere effettuata anche nei giorni precedenti quello in cui si vuole consumare il pasto, ma tassativamente <strong>entro le ore 9.00</strong> del giorno indicato. Può avvenire tramite un’app da <strong>smartphone</strong> o tramite il portale della mensa da pc, loggandosi con le credenziali assegnate (le medesime con cui si ricarica il credito dei pasti).
                    Coloro che non dispongono di uno smartphone e non hanno la possibilità di prenotare il pasto da casa, possono utilizzare a tal fine il pc collocato nella sala lettura di via Perlasca. Gli studenti di via Filzi possono anche rivolgersi ai tecnici informatici presenti in succursale.
                    <strong>La prenotazione via smartphone</strong> genera un QR code che dovrà essere letto da un apposito lettore ottico. Ve ne sono due in via Perlasca: uno in atrio e l’altro in prossimità dell’ingresso alla mensa. Questi ultimi rilasceranno una ricevuta cartacea da ritirare e consegnare in mensa al momento della fruizione del pasto. Per evitare code presso i lettori ottici negli orari in cui ci si reca in mensa, si consiglia a tutti di provvedere alla stampa della ricevuta con un certo anticipo (i giorni precedenti, il giorno stesso prima delle otto o durante l’intervallo).
                    <strong>La prenotazione tramite pc</strong> richiede di stampare direttamente la ricevuta da consegnare in mensa al momento della fruizione del pasto.
                    Gli studenti con <strong>esigenze di dieta particolare per intolleranze o allergie</strong> devono andare sul sito <a href="www.menuscuole.it">www.menuscuole.it</a>  e selezionare “richiedere una dieta in mensa” e, alla pagina successiva, “Comunità Rotaliana Königsberg e Comunità Paganella”. Si seguano poi le indicazioni.
                    <strong>Il tempo mensa è di 50 minuti</strong>: chi finisce le lezioni alle 12.20 rientra in aula alle 13.10 e chi va in mensa alle 13.10 rientra alle 14.00.
                    </p>
                </div>
                <div class="images col-sm-12 col-md-5 order-md-1">
                    <img src="<?php echo get_template_directory_uri () ?>/assets/placeholders/placeholder-380x480.jpg" alt="">
                </div>
            </div>
        </section>

        <div class="col-sm-12 col-md-3">
            <?php echo get_included_files() ?>
            <h5>MENU SETTIMANALE</h5>
        </div>

    </div>
        

</main>

<?php
get_footer();