<?php
if (!is_array($args) ) return;
if (!isset($args['sections']) ) return;
if (!isset($args['labels']) ) return;
?>
<?php 
// var_dump( $args );
// var_dump( $args['sections'] );
// var_dump( $args['labels'] );
?>
<style>
.carousel {
    display: grid; 
    grid-auto-flow: row dense; 
    grid-auto-flow: row;
    grid-auto-columns: 1fr; 
    grid-auto-rows: 1fr; 
    grid-template-columns: 9% 1fr 1fr; 
    grid-template-rows: repeat(var(--grid-rows-num, 4), 1fr); 
    /* grid-template-rows: repeat(auto-fit, 1fr);  */
    /* grid-template-rows: auto [last-line]; */
    gap: 0% 0px; 
    grid-template-areas: 
        ".      title  text"
        /* "select label1 text"
        "select label2 text"
        "select label3 text"
        "select label4 text" */
        ; 
    width: 100%; 
    height: 100%; 
}
/* .carousel > input { grid-area: select; } */
.carousel > h2 { 
    grid-area: title; 
    margin: 1rem 0;
    text-transform: uppercase;
}
.carousel > input[type=radio] { 
    grid-column-start: 1; 
    margin: auto;
    appearance: none;
    background-color: #C4C4C4;
    border-radius: 50%;
}
.carousel > input[type=radio]:not(:checked) { 
    background-color: #C4C4C4;
}
.carousel > input[type=radio]:checked { 
    background-color: #E6285F;
}

.carousel > label { 
    grid-column-start: 2; 
    margin: auto 0;
}
/* .carousel > label:nth-of-type(1) { grid-area: label1; }
.carousel > label:nth-of-type(2) { grid-area: label2; }
.carousel > label:nth-of-type(3) { grid-area: label3; }
.carousel > label:nth-of-type(4) { grid-area: label4; } */
/* .carousel > article { grid-area: text; } */
.carousel > article { 
    /* grid-column-start: 3; 
    grid-row-end: last-line;  */
    /* background-color: lightgrey; */
    /* grid-area: 1 / 3 / -1 / -1; */
    grid-area: 1 / 3 / last-line / -1;
}
.carousel > * {align-self: stretch;}

.carousel > input {
    /* grid-column: 1; */
    height: 14px;
    width: 14px;
}
.carousel > article {
    /* grid-row: first-line / last-line; */
    /* grid-area: 1 / col3-start / last-line / 3; */
    padding: 1rem 2rem;
}
.carousel > input:checked + label{
    font-weight: bold;
}
.carousel > input:checked + label + article{
    font-weight: bold;
}
.carousel > input:not(:checked) + label + article{
    display: none;
}
</style>


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
