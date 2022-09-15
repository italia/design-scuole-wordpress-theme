<?php
if (!is_array($args) ) return;
if (!isset($args['sections']) ) return;
if (!isset($args['labels']) ) return;
if (!isset($args['id']) ) $args['id'] = 'crsl';
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
        <input type="radio" id="<?php echo $args['id']; ?>-<?php echo $index; ?>" name="crsl" <?php 
            if (!$index) echo 'checked'; 
        ?>>
        <label for="<?php echo $args['id']; ?>-<?php echo $index; ?>">
            <?php echo $args['labels'][$key]; ?>
        </label> 
        <article>
            <?php echo $value; ?>
        </article>
        <?php
        $index++;
    }
    ?>
</section>
