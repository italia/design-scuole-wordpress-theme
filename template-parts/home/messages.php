<?php global  $messages; ?>
<?php foreach($messages as $message): ?>
    <?php

    if(trim($message['testo_message'] ?? "") == "") continue;
    $message_date = isset($message['data_message']) ? strtotime($message['data_message']) : false;
    $now = strtotime("now");
    $color = $message['colore_message'] == 'yellow' ? 'black' : 'white';
    if ($message_date && ($message_date <= $now)) continue; ?>

    <div class="p-4 home-message <?php echo $message['colore_message'] ?>">
        <div class="home-message-content">
            <p class="msg">
                <?php if($message['icona_message'] ?? false): ?>
                <svg id="alert" viewBox="0 0 492.963 492.963">
                    <path d="M246.458,169.582c-11.5,0-19.1,9.6-19.1,19.1v114.8c0,11.5,7.6,19.101,19.1,19.101s19.101-9.601,19.101-19.101v-114.8C265.559,177.182,257.958,169.582,246.458,169.582z"/>
                    <circle cx="246.458" cy="379.982" r="19.1"/>
                    <path d="M483.658,391.382l-206.6-334.7c-17.2-26.8-44-26.8-61.2,0l-206.5,334.7c-21,36.3-5.7,65,36.3,65h399.7C489.358,456.382,504.658,427.781,483.658,391.382z M451.158,437.281h-409.3c-21,0-28.7-15.3-17.2-32.5l210.4-340.399c5.7-11.5,17.2-11.5,24.899,0l210.4,340.399C479.858,421.981,472.158,437.281,451.158,437.281z"/>
                </svg>
                <?php endif; ?>
                <?php echo nl2br($message['testo_message']) ?>
                <?php if($message['link_message'] ?? false): ?>
                    <a href="<?php echo $message['link_message']; ?>" class="btn btn-sm btn-outline-<?php echo $color; ?> ml-3">Dettagli</a>
                <?php endif; ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>