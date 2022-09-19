<?php
if (!is_array($args) ) return;
if (!isset($args['sections']) ) return;
if (!isset($args['labels']) ) return;
?>

<section class="carousel" style="height: 20rem; --grid-rows-num:<?php 
echo count($args['labels']); 
?>;">
    <?php

    if (!is_bool($args['title']) ) 
    echo  '<h2>'.$args['title'].'</h2>';

    echo '<div></div>';

    $index=0;
    foreach ($args['sections'] as $key=>$value){
        if (!isset($args['labels'][$key])) continue;
        ?>
        <!-- <?php echo $key; ?> -->
        <input type="radio" id="crsl<?php echo $index; ?>" name="crsl" <?php 
            if (!$index) echo 'checked'; 
        ?>>
        <label for="crsl<?php echo $index; ?>">
            <div>
                <?php echo $args['labels'][$key]; ?>
            </div>
        </label> 
        <article>
            <div>
                <?php echo $value; ?>
            <div>
        </article>
        <?php
        $index++;
    }
    ?>
</section>
