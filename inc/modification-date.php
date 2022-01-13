<div class="moddate-full">
    <div class="moddate-area">
        <?php printf( __( '[:nl]Laatste bewerking[:en]Last modified[:] ' ) ); ?>
        <?php echo get_the_modified_date('j');?>.<?php echo MonthRoman( get_the_modified_date('n') ); ?>.<?php echo get_the_modified_date('Y');?>
    </div>
</div>