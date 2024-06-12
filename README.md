# ![developers.italia](https://avatars1.githubusercontent.com/u/15377824?s=36&v=4 "developers.italia") Design Scuole Italia
[![Join the #design siti scuole channel](https://img.shields.io/badge/Slack%20channel-%23design_siti_scuole-blue.svg)](https://developersitalia.slack.com/messages/design-siti-scuole/)

## **Un sito per le scuole italiane**
### I primi passi con il tema Wordpress (2.12.0)

**Design Scuole Italia** è il tema WordPress che permette di aderire al [modello di sito istituzionale delle scuole](https://designers.italia.it/modelli/scuole/), progettato dal Dipartimento per la trasformazione digitale in collaborazione con il Ministero dell’Istruzione.

## **Installazione e supporto**

### **Come scaricare il tema**

Per scaricare il tema hai le seguenti opzioni:

+ scaricare lo zip della versione all'interno delle [release del tema](https://github.com/italia/design-scuole-wordpress-theme/releases)
+ eseguire un **fork** del repository cliccando sul pulsante in alto a destra <br>
  ![fork](https://user-images.githubusercontent.com/69706/188415997-2dfee9d2-2c45-4f5b-babd-d4f328770f04.png)
+ eseguire un **fork** del repository tramite il comando `git fork https://github.com/italia/design-scuole-wordpress-theme.git` da terminale
+ eseguire il **download**, cliccando prima sul pulsante "Code" e poi sulla voce "Download ZIP" dal menu a tendina 
![download-zip](https://user-images.githubusercontent.com/69706/188414872-9a0c33c5-19b1-461a-b577-29cb08723806.png)

Se non conosci il comando `fork` puoi [leggere questa guida](https://docs.github.com/en/get-started/quickstart/fork-a-repo) (disponibile solo in inglese).

_👉 **Nota bene**: se decidi di scaricare il tema tramite il `fork` non è necessario effettuare le _pull request_ sul repository originale_

### Come inserire il tema all'interno di un'installazione WordPress

Una volta scaricato il repository, inserisci la cartella all'interno del progetto WordPress al seguente percorso `wp-content > themes `.

Successivamente, crea la version _"child"_ del tema duplicando la cartella appena copia e aggiungendo l'estesione `-child`.

Esempio: 
```
wp-content > themes > design-scuole-wordpress-theme (tema parent)
wp-content > themes > design-scuole-wordpress-theme-child (tema child)
```

> È raccomandata l'installazione del tema come _"child"_ in modo tale da poterlo aggiornare facilmente senza compromettere le personalizzazioni locali. [Vedi la guida ufficiale](https://developer.wordpress.org/themes/advanced-topics/child-themes/#1-create-a-child-theme-folder) su come installare un tema _"child"_.

### Come aggiornare il tema
Le modalità di aggiornamento dipendono dall'opzione scelta per l'installazione:
- Se hai scaricato il tema tramite il comando **fork**, esegui il comando `git pull` da terminale.
- Se hai scaricato il file `.zip`, copia la cartella della nuova versione all'interno del percorso `wp-content > themes >design-scuole-wordpress-theme ` **(Raccomandato)**  

### Dipendenze 

Il tema non è più dipendente dai sottomoduli CMB2, quindi non sono più necessari i comandi:

+ `cd design-scuole-wordpress-theme/`
+ `git submodule init`
+ `git submodule update --remote`

In caso di problemi nell'aggiornamento di un repository già installato con i sottomoduli, è sufficiente rimuovere la directory `inc/vendor/CMB2` prima di eseguire il comando `git pull`.

### **Supporto tecnico ed editoriale**
Sul [canale Slack #design-siti-scuole](http://developersitalia.slack.com/messages/design-siti-scuole) puoi confrontarti sulle risorse e trovare le risposte a tutte le domande riguardo problemi tecnici o l’architettura dei contenuti.

È necessario avere un’utenza Slack di Developers Italia. [Attivala adesso](https://slack.developers.italia.it/).

---

## **Indice**

- [Cos'è](#cosè)
- [Cosa fa](#cosa-fa)
- [La cura verso i contenuti](#la-cura-verso-i-contenuti)
- [Da dove iniziare](#da-dove-iniziare)
- [Riscrivere o importare i contenuti del vecchio sito](#riscrivere-o-importare-i-contenuti-del-vecchio-sito)
- [Relazioni tra i contenuti](#relazioni-tra-i-contenuti)
- [I diversi content type](#i-diversi-content-type)
- [Personalizzazione](#personalizzazione)
- [La community di riferimento](#la-community-di-riferimento)
- [FAQ](#faq)
- [Licenze software dei componenti di terze parti](#licenze-software-dei-componenti-di-terze-parti)
- [Segnalazione bug](#segnalazione-bug)
- [Come contribuire](#come-contribuire)

### **Cos'è**
Il tema Design Scuole Italia è un’applicazione di WordPress, il sistema di gestione di contenuti (CMS) che consente di creare un sito web. 

Il tema è basato sul [modello di sito istituzionale delle scuole italiane](https://designers.italia.it/modello/scuole/), creato nell’ambito del progetto Designers Italia dal Dipartimento per la trasformazione digitale e il Ministero dell’Istruzione.

### **Cosa fa**
Il tema WordPress è stato progettato per adottare rapidamente il modello di sito istituzionale delle scuole. Il tema imposta automaticamente lo stile grafico del sito, i layout delle pagine e il menu di navigazione, permettendo di velocizzare l’adozione tecnica del modello e di focalizzarsi sulla creazione dei contenuti sulle pagine.

La progettazione del modello, iniziata nel 2018 con un aggiornamento nel 2022, si è basata su un’ampia ricerca con gli utenti. L’obiettivo del modello è di offrire a genitori, studenti e all’intera comunità scolastica un punto di accesso digitale al mondo della scuola che sia semplice, funzionale e che risponda alle loro esigenze. 

Il modello di sito istituzionale scolastico vuole comunicare l’identità e l’atmosfera di una scuola, fornendo agli utenti tutte le informazioni sull’organizzazione dell’istituto, sui percorsi di studio e sui servizi di supporto alla didattica.

Il tema Wordpress è pronto all’uso. [Scaricalo gratuitamente da GitHub](https://github.com/italia/design-scuole-wordpress-theme)

### **La cura verso i contenuti**
Il tema imposta automaticamente le aree del sito, le voci di menù e la struttura delle pagine. 

Inserendo i contenuti negli appositi campi predisposti per le varie tipologie di contenuto (content type), il tema comporrà automaticamente le diverse pagine del sito. Il compito dei redattori è quindi quello di curare i contenuti, senza doversi preoccupare di come verranno presentati a livello visivo sulle pagine. 

Gli istituti scolastici possono così risparmiare tempo nella progettazione e realizzazione del proprio sito e dedicare più tempo a comunicare con precisione e semplicità le informazioni, dall’organizzazione della scuola ai percorsi di studio e i servizi didattici. 

### **Da dove iniziare**
Inizia guardando gli esempi di istituti scolastici che hanno già adottato il modello, per prendere ispirazione su come scrivere i contenuti del sito:

[Il Liceo “Dal Piaz” di Feltre](https://liceodalpiaz.la-scuola.it/)

[L’Istituto Comprensivo Bosisio Parini di Lecco](https://comprensivobosisio.la-scuola.it/)

[L'Istituto Tecnico Euclide-Caracciolo di Bari](https://www.euclide-caracciolo.edu.it)

Consigliamo di cominciare a creare i diversi contenuti in questo ordine:
- luoghi;
- strutture organizzative;
- persone;
- servizi;
- indirizzi di studio.

Per creare i contenuti del nuovo sito e imparare a gestirlo al meglio, è utile creare uno o più gruppi di lavoro composti da una rappresentanza del personale tecnico-amministrativo e da una rappresentanza dei docenti. 

La creazione di un team è importante soprattutto per mappare le informazioni necessarie prima della fase di scrittura vera e propria. Ad esempio, per poter scrivere contenuti sui servizi didattici dell’istituto, è necessario un confronto preliminare con gli esperti di questo ambito per chiarire come sono fatti i servizi e come funzionano. 

L’obiettivo dei vari gruppi di lavoro è di creare questi contenuti e di aggiornarli quando necessario.

In fase iniziale, consigliamo di creare un unico esempio per ciascuna tipologia di contenuto, in modo da validare la struttura con i gruppi di lavoro e usarlo come linea guida per la stesura di tutti i contenuti di quella tipologia.

Una volta iniziato il lavoro sulle prime 5 tipologie di contenuto suggerite, si può continuare con: 
- notizie;
- eventi;
- circolari;
- documenti;
- progetti scolastici;
- schede didattiche.

Prima della pubblicazione del sito, è utile definire con chiarezza chi sarà responsabile della pubblicazione di ciascuna delle tipologie di contenuti, in modo da garantire un flusso di pubblicazione costante. Non tutte le sezioni del sito andranno gestite e aggiornate con la stessa frequenza. È bene prendere consapevolezza delle varie sezioni e della frequenza con cui ciascun aggiornamento va fatto.

Le schede didattiche, ovvero gli approfondimenti su un argomento specifico, sono l’unico contenuto che può esser scritto liberamente dai docenti, dopo averli fatti iscrivere a WordPress.

#### Editor Gutenberg
🚨 **Attenzione!** Il tema non supporta l'editor dei blocchi Gutenberg. È quindi necessario verificare che il plugin **Disable Gutenberg** sia correttamente installato e attivo.
Le schede didattiche, ovvero gli approfondimenti su un argomento specifico, sono l’unico contenuto che può esser scritto liberamente dai docenti, dopo averli fatti iscrivere a WordPress.

### **Riscrivere o importare i contenuti del vecchio sito**
L’aggiornamento di un sito è un’ottima opportunità per riscrivere, riorganizzare ed aggiornare tutti i contenuti relativi ai luoghi, alle strutture, ai servizi, alle persone, agli indirizzi di studio e ai progetti della scuola.

Notizie ed eventi passati, non essendo più attuali, non vanno migrati sul nuovo sito.

Per importare documenti e circolari dal vecchio al nuovo sito, si può utilizzare lo strumento di import/export nativo di WordPress. La resa di questi contenuti, una volta migrati, andrà verificata manualmente e dipenderà molto dalla qualità degli stessi nel sito precedente. 

Il tema tenterà una riconciliazione automatica delle tipologie di contenuto più frequentemente usate dalle scuole che utilizzano WordPress: come gli eventi, le circolari e i documenti di amministrazione trasparente.

### **Relazioni tra i contenuti**
I siti WordPress presentano una serie di tipologie di contenuto (_content type_) che sono in relazione tra loro. Ogni tipologia di contenuto viene creata attraverso una “scheda” nel backend di WordPress, che presenta i vari campi dove aggiungere i contenuti per creare la pagina.

Questa impostazione permette di combinare i vari elementi per la creazione delle pagine, così che i contenuti vengano creati soltanto una volta e poi riutilizzati, se necessario, in varie parti del sito. Una volta comprese le relazioni tra le tipologie di contenuti, sarà facile creare le pagine del sito.

Alcune relazioni tra tipologie di contenuti, sono:

- Strutture organizzative - Servizi
- Progetti - Persone
- Strutture organizzative - Luoghi
- Servizi - Documenti

Questo significa, ad esempio, che ogni pagina di una struttura organizzativa può presentare una relazione con contenuti come i luoghi e i servizi.

🚨 **Attenzione**: Dal punto di vista pratico, è necessario che i contenuti che si vuole collegare vengano creati in un ordine preciso: prima i _content type_ che fungono da contenuti di dettaglio e poi il _content type_ contenitore (es. prima i servizi, i luoghi e le persone e solo dopo la struttura organizzativa che raggruppa servizi, luoghi, persone creati in precedenza).

Per collegare tra loro diverse tipologie di contenuto, quindi:
1.	crea la scheda o le schede dei contenuti di dettaglio (ad esempio, il luogo “Palazzo Baldini” che verrà associato ad una struttura organizzativa);
2.	crea la scheda del contenuto contenitore (ad esempio, la scheda della struttura organizzativa “Segreteria scolastica”);
3.	Associa, tramite l’apposito campo, le schede contenuto di dettaglio alla scheda contenuto (ad esempio, il luogo “Palazzo Baldini” alla struttura organizzativa “Segreteria scolastica”).

Per associare nuovi contenuti di dettaglio ad altri già esistenti:
1.	Crea la nuova scheda di contenuto di dettaglio (ad esempio, la scheda servizio “Pagamento mensa scolastica” da associare alla scheda del contenuto contenitore “Segreteria scolastica”).
2.	Entra nella scheda del contenuto contenitore e, tramite l’apposito campo, associa la scheda del contenuto di dettaglio (la scheda servizio “Pagamento mensa scolastica” alla scheda “Segreteria scolastica”).

Nella maggior parte dei casi questa correlazione è bidirezionale e automatica. Quando si crea, ad esempio, una relazione tra un luogo e una struttura, questa verrà mostrata sia nel dettaglio del luogo che in quello della struttura.

### **I diversi _content type_**

#### I luoghi

Con la scheda luoghi è possibile creare pagine per tutti gli ambienti dell’istituto: edifici scolastici, uffici, laboratori, palestre e biblioteche. I campi presenti nella scheda guidano alla realizzazione della pagina. È possibile indicare la posizione sulla mappa dei luoghi, che sarà poi visibile sulla pagina. I luoghi possono essere messi in relazione tra loro, come per esempio un laboratorio presente all’interno di un edificio scolastico.

#### Le strutture organizzative

La struttura organizzativa è uno degli elementi essenziali nella presentazione dell’istituto. In caso di istituti comprensivi, è necessario creare in primo luogo la struttura “Genitore” di tipo “Scuola” (l’istituto stesso) e successivamente le strutture “figlie” (i singoli plessi). Nella scheda della singola struttura va indicato il luogo o i luoghi in cui la struttura ha sede. Oltre ai plessi sono strutture organizzative anche le commissioni, gli uffici di segreteria, i dipartimenti, gli organi collegiali, etc.

#### I servizi

La scheda servizi è una novità del tema Design Scuole Italia ed è utile a raccontare e organizzare i servizi offerti dalla scuola, dall’iscrizione al registro elettronico. I servizi vengono organizzati e presentati in base alla loro tipologia. Anche quando i servizi sono erogati tramite piattaforme esterne, è utile creare una scheda per informare del servizio e indicarne le modalità di accesso.

#### Le persone

Le persone corrispondono agli utenti WordPress. Attivando un’utenza WordPress, sarà possibile creare una pagina per ogni persona e menzionarle sugli altri contenuti del sito.
È necessario creare un’utenza WordPress anche per chi non avrà un ruolo attivo nella gestione del sito, scegliendo di non condividere le credenziali d’accesso. Se vengono condivise le credenziali d’accesso, ogni utente potrà gestire le proprie informazioni personali e di contatto, produrre altri contenuti (assegnando le giuste autorizzazioni), gestire notifiche personalizzate e firmare delle circolari.

Si consiglia di creare il prima possibile le utenze delle persone, così da poterle subito correlare con i contenuti inseriti. 

#### I percorsi e gli indirizzi di studio

La sezione dei percorsi di studio è dedicata a illustrare l’offerta formativa dell’istituto, differenziato per ogni ordine di scuola o tipologia di indirizzo.

#### I documenti

La sezione documenti raccoglie tutti i documenti scolastici, dai file PDF ai documenti dell’albo online e della sezione amministrazione trasparente.
I documenti in albo hanno una numerazione progressiva non modificabile e, una volta pubblicati, possono esere soltanto eliminati. I documenti possono esssere associati ai diversi _content type_ del sito, quando necessario. Si consiglia di creare schede documenti piuttosto che caricare i file direttamente dentro i _content type_, così da renderli più facilmente ricercabili e indicizzabili dai motori di ricerca.

#### I progetti 

Il _content type_ “progetto” presenta i progetti e le attività svolte insieme agli studenti nell’ambito della didattica tradizionale, progetti extracurriculari o delle uscite didattiche.

#### Le schede didattiche

Le schede didattiche permettono di descrivere un approfondimento tematico a cura di uno o più insegnanti. Il contenuto è rivolto agli studenti. Il _content type_ “scheda didattica” può essere associato con con i luoghi, le strutture e i documenti della scuola.

#### Le notizie

Le notizie sono rappresentate dal _content type_ nativo di WordPress “articolo” e sono di 2 tipi, news e articoli. Vengono raccolte in una pagina di presentazione generale e sono filtrabili per tipologia. È anche presente una pagina di archivio.

La tipologia news è pensata per raccontare le notizie e i comunicati ufficiali della scuola, mentre la tipologia articoli è pensata per articoli generici stile blog.

#### Eventi e calendario eventi

Il _content type_ “evento” serve a creare eventi che hanno una data di inizio e fine, visualizzabili in un calendario scolastico (ad esempio, la chiusura delle attività nel periodo natalizio).

#### Le circolari

Il _content type_ “circolare” crea una pagina di presentazione della circolare sul sito della scuola e permette di raccogliere commenti e feedback da parte degli utenti interessati.

Il flusso di vita tipico di una circolare all’interno di un istituto è solitamente il seguente:
1.	l'insegnante crea una scheda circolare;
2.	la scheda viene inviata alla segreteria;
3.	la segreteria la mostra al preside;
4.	il preside la legge e, apportate eventuali modifiche, la firma;
5.	la segreteria protocolla la circolare;
6.	la segreteria invia la circolare a tutti i docenti (o a tutta la scuola), i quali riceveranno una notifica nella propria area personale.

L’utente WordPress a cui è associata una circolare riceverà una notifica via email e vedrà un avviso sul sito, un “alert” visibile in testata. Sarà possibile accedere alla circolare tramite la dashboard WordPress.

Nella scheda della circolare è possibile anche visionare tutti i feedback ricevuti (firme, adesioni, prese visione).

### **Personalizzazione**
Nell’area di configurazione è possibile (e talvolta necessario) personalizzare alcuni caratteristiche del sito, come i testi di presentazione o le notizie da mostrare in evidenza o nella pagina di presentazione della scuola.

L’area di configurazione è divisa in tab per le diverse aree del sito.

Cliccando su “Configurazione" è possibile definire:

-	**opzioni di base**: i contenuti dell'intestazione del sito, come il tipo di istituto, il nome dell’istituto e la città;
-	**dati fiscali e di contatto**: le informazioni di base della scuola (indirizzo, pec, codice ipa, codice meccanografico, ecc), vengono riportate nel piè di pagina e nelle pagine interne;
-	**avvisi in Home**: i messaggi di avviso mostrati mostrati all'inizio dei contenuti della pagina iniziale;
-	**home**: i contenuti in evidenza, le novità, i banner, i servizi e gli argomenti mostrati nella pagina iniziale del sito;
-	**scuola**: tutti i contenuti relativi alla sezione scuola, ovvero l’immagine e la citazione principali, la timeline della storia della scuola, le strutture dell’organizzazione scolastica, i luoghi, l’area documentale e i numeri della scuola;
-	**presentazione**: area dove selezionare gli articoli che popolano la sezione “presentazione della scuola”;
-	**servizi**: area di gestione della pagina di panoramica dei servizi, in cui è possibile selezionare le tipologie di servizi da mostrare; 
-	**novità**: area in cui selezionare le tipologie di articoli da mostrare nella pagina di panoramica delle novità;
-	**didattica**: area in cui selezionare il tipo di visualizzazione da mostrare nella sezione didattica, scegliendo se mostrare a sinistra le scuole e a destra i percorsi di studio (utile nel caso di istituti composti da diverse scuole) o se mostrare gli indirizzi di studio a sinistra e le scuole a destra (utile per istituti con poche scuole ma diversi indirizzi di studio);
-	**persone**: area di configurazione della sezione di presentazione del personale scolastico, ordinata in base alle strutture organizzative selezionate;
-	**organizzazione**: area di configurazione della pagina di presentazione dell’organizzazione scolastica, tramite la selezione delle strutture organizzative da mostrare;
-	**luoghi**: area in cui configurare la tipologia e l’ordine delle tipologie di luoghi da mostrare;
-	**documenti**: area di configurazione dei documenti, organizzati in base alle tipologie selezionate;
-	**accesso ai servizi**: area per configurare i servizi esterni alla scuola da mostrare nella modale di accesso (registro elettronico o altri) e le informazioni del modulo di login all'area riservata di Wordpress;
-	**socialmedia**: collegamenti ai social mostrati nell'intestazione e nel piè di pagina.
-	**altro**: la descrizione della sezione Argomenti, i contenuti ulteriori del piè di pagina, il token mapbox (da creare per utilizzare le mappe openstreetmap dei luoghi), la configurazione delle estensioni protette dall'accesso esterno, il testo delle mail delle circolari e il setup della sezione albo.


### **La community di riferimento**
Scopri i canali della community dove confrontarti sulle risorse del modello:

-	[Forum Italia](https://forum.italia.it/) - unisciti alla discussione sul design dei servizi digitali con gli esperti del settore;
-	[Canale Slack](http://developersitalia.slack.com/messages/design-siti-scuole) - dialoga e collabora in tempo reale con la community di Designers Italia;
-	[GitHub](https://github.com/italia/design-scuole-wordpress-theme) - il repository GitHub del tema WordPress “Design Scuole Italia”.

### **F.A.Q**
➔	**Chi gestisce il sito?**

L’uso del tema non impatta le modalità con cui viene abitualmente gestito il sito scolastico e rimane una responsabilità degli istituti. Molti istituti fanno affidamento su fornitori esterni per hosting e manutenzione.

➔	**Perché esiste un tema pronto solo per WordPress?**

WordPress è il CMS più usato dalle scuole. Puoi usare l’apposito [kit per creare temi per altri CMS](https://github.com/italia/design-scuole-pagine-statiche/).

➔	**Non ho WordPress. Cosa devo fare?**

Puoi passare a[ WordPress](https://it.wordpress.org/) in qualunque momento, oppure usare le [altre risorse per la creazione del sito scolastico](https://designers.italia.it/modelli/scuole/). 


➔	**Quali sono i benefici dell’uso del tema WordPress?**

L’adozione del tema WordPress, pronto all’uso, ti permette di:
- usare configurazioni preimpostate, risparmiando tempo sugli aspetti più tecnici della creazione di un sito;
- dedicare più tempo alla cura dei contenuti e alla loro organizzazione, puntando sulla qualità. 

**➔	Posso fare dei cambiamenti al sito?**

WordPress è un ambiente pensato per modificare con semplicità ogni aspetto del sito. 

➔	**È consigliato fare cambiamenti al sito?**

Il tema WordPress copre già tutte le esigenze di base, emerse da una lunga ricerca con con il personale scolastico e le famiglie. 

WordPress permette di aggiungere innumerevoli funzionalità, per far fronte alle esigneze dei singoli istituti (come, ad esempio, creare un’area condivisa di materiali didattici). Quando si sviluppa una nuova funzionalità, è opportuno condividerla con il resto della comunità tramite [Forum Italia](https://forum.italia.it/), [GitHub](https://github.com/italia/design-scuole-wordpress-theme) o il [progetto Porte Aperte sul Web](https://www.porteapertesulweb.it/).

È sconsigliato apportare modifiche strutturali al sito, come modificare la classificazione delle informazioni o la struttura di navigazione. Modifiche di questo tipo possono impedire di beneficiare di evoluzioni future del prodotto, a cause di problematiche di aggiornamento del tema. Puoi segnalare necessità di questo tipo direttamente alla community di Designers Italia tramite i vari canali di contatto. I feedback ricevuti verranno raccolti e considerati per le successive evoluzioni del modello.

#### **Bootstrap Italia**
Design Scuole Italia rispetta le nuove linee guida di design dell’Agenzia per l’Italia digitale rilasciare dal [**Team per la Trasformazione Digitale**](https://teamdigitale.governo.it/) e le caratteristiche per i servizi web della Pubblica Amministrazione contenute nel Piano triennale per l’informatica nella Pubblica Amministrazione 2017/2019.

Nel tema vengono integrate le componenti di [**Bootstrap Italia**](https://italia.github.io/bootstrap-italia/).

---

## Licenze software dei componenti di terze parti

### Componenti distribuiti con i template
Di seguito elencati i componenti distribuiti con il tema WordPress:

- [CMB2](https://github.com/CMB2/CMB2) © Justin Sternberg, licenza GNU GPL v3.0;
- [CMB2-conditional-logic](https://github.com/awran5/CMB2-conditional-logic/) © Ahmed Khalil, licenza GNU GPL v2.0;
- [CMB2-field-Leaflet-Geocoder](https://github.com/villeristi/CMB2-field-Leaflet-Geocoder) © Ville Ristimäki, licenza MIT;
- [cmb-field-select2](https://github.com/mustardBees/cmb-field-select2) © Phil Wylie, licenza GNU GPL v3.0;
- [cmb2-attached-posts](https://github.com/CMB2/cmb2-attached-posts) © Justin Sternberg, licenza GNU GPL v3.0;
- [TGM-Plugin-Activation](https://github.com/TGMPA/TGM-Plugin-Activation) © Gary Jones, licenza GNU GPL v2.0;
- [Parsedown](http://parsedown.org) © Aidan Woods, licenza MIT;
- [dompdf](https://github.com/dompdf/dompdf) © Matthew Bauer, licenza LGPL 2.1.


Di seguito elencati i componenti distribuiti (derivati dal template html utilizzato per realizzare il tema: https://github.com/italia/design-scuole-pagine-statiche), che hanno una propria licenza diversa da CC0:

- [jQuery](https://jquery.com/) © jQuery Foundation, licenza MIT;
- [Popper.js](https://popper.js.org/) © Federico Zivolo and contributors, licenza MIT;
- [Bootstrap Italia](https://italia.github.io/bootstrap-italia/) © Team per la Trasformazione Digitale, licenza BSD;
- [Bootstrap 4](https://getbootstrap.com/) © Twitter, Inc., licenza MIT;
- [Bootstrap Select](https://developer.snapappointments.com/bootstrap-select/) © SnapAppointments, LLC, licenza MIT;
- [Owl Carousel 2](https://owlcarousel2.github.io/OwlCarousel2/) © Owl (David Deutsch), licenza MIT;
- [jQuery Easing](http://gsgd.co.uk/sandbox/jquery/easing/) © George McGinley Smith, licenza BSD;
- [CLNDR](https://kylestetz.github.io/CLNDR/) © Kyle Stetz, licenza MIT;
- [FitVids](http://fitvidsjs.com/) © Dave Rupert, licenza MIT;
- [Hamburgers](https://jonsuh.com/hamburgers/) © Jonathan Suh, licenza MIT;
- [Match Height](https://brm.io/jquery-match-height/) © Liam Brummitt, licenza MIT;
- [ScrollTo](https://github.com/flesler/jquery.scrollTo) © Ariel Flesler, licenza MIT;
- [Leaflet](https://leafletjs.com/) © Vladimir Agafonkin, licenza BSD;
- [Perfect Scrollbar](https://github.com/mdbootstrap/perfect-scrollbar/) © Hyunje Jun, licenza MIT;
- [Responsive Tabs](http://jellekralt.github.io/Responsive-Tabs/) © Jelle Kralt, licenza MIT;
- [Sticky Kit](https://leafo.net/sticky-kit/) © Leafo, licenza MIT;
- [svgxuse](https://icomoon.io/svgxuse-demo/) © Icomoon, licenza MIT.


## Segnalazione bug
Vuoi segnalare un bug o fare una richiesta?

Prima di tutto assicurati che sia un problema relativo al tema WordPress e non a plugin installati o impostazioni del CMS, poi dai un'occhiata a come creare una [issue](https://github.com/italia/bootstrap-italia/blob/master/CONTRIBUTING.md#creare-una-issue) ed infine, se lo ritieni necessario, apri la issue [in questo repository](https://github.com/italia/design-scuole-wordpress-theme/issues).

## Come contribuire
Vorresti dare una mano contribuendo allo sviluppo del tema?

Se non l'hai già fatto, inizia spendendo qualche minuto per approfondire la tua conoscenza su l'[Architettura dell'Informazione dei siti web delle Scuole Italiane (ODS 337KB)](https://designers.italia.it/files/resources/modelli/scuole/adotta-il-modello-di-sito-scolastico/definisci-architettura-e-contenuti/Architettura-informazione-sito-scuole.ods) e fai riferimento alle [indicazioni su come contribuire](https://github.com/italia/design-scuole-wordpress-theme/blob/main/CONTRIBUTING.md).

A questo punto, è necessario scaricare una copia in locale del tema tramite il comando `git fork https://github.com/italia/design-scuole-wordpress-theme.git` da terminale o cliccando sul pulsante Fork <br>
![fork](https://user-images.githubusercontent.com/69706/188419656-21fa5b0e-c52a-4168-a1d1-8ea9a149da6a.png)

Una volta terminate le modifiche è necessario aprire una _pull request_ per sottoporle alla revisione del team.

---

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU Affero General Public License as published
by the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
