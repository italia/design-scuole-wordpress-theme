<?php
global $post;
$id = isset($args['id']) ? $args['id'] : $post->ID;
$link = isset($args['link']) ? $args['link'] : get_permalink();
$title = isset($args['title']) ? $args['title'] : get_the_title();
?>

<section id="postID-<?php echo $id; ?>" class="martini-list--item px-0 py-4 align-items-center">
    <div class="row container-martini px-0 px-2 align-items-center">
        <div class="col-12 col-md-6">
            <a href="<?php echo $link; ?>">
                <h4 class="mb-0"><?php echo $title; ?></h4>
            </a>
        </div>
        <div class="col-12 col-md-6 align-items-start text-md-right">
            <a class="btn-sm-default" href="<?php echo $link; ?>">
                <button class="w-auto mt-3 mt-md-0 mb-0">Visita la pagina</button>
            </a>
        </div>
    </div>
</section>