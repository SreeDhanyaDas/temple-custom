<?php
 
    get_header();
    
?>
<div class="title-bar">
    <h1>Poojas</h1>
</div>
<div class="container">
    <div class="row">
        <div class="col-xs-12 content-area">
            
    <?php 
        if (have_posts()):
        $c=0;
    ?>
    <div class="accordion" id="accordionExample">
    <?php
        while(have_posts()):
            the_post();
            $c++;
    ?>

            

        <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $c; ?>">
            <button class="accordion-button accordion-button-poojas" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $c; ?>" aria-expanded="<?php if($c==1){echo "true";} else {echo "false";} ?>" aria-controls="collapse<?php echo $c; ?>">
            <?php the_title(); ?>
            </button>
            </h2>
            <div id="collapse<?php echo $c; ?>" class="accordion-collapse collapse <?php if($c==1){echo "show";} ?>" aria-labelledby="heading<?php echo $c; ?>" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <?php the_content(); ?>
            </div>
            </div>
        </div>
    
    <?php
        endwhile;
    ?>
    </div>
    <?php
        endif;
        wp_reset_postdata();
?>
</div>
    
        
</div>
<?php get_footer(); ?>