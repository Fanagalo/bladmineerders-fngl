<div class="moddate-full"></div>
<div class="moddate-area">
    <div class="moddate-content">
        <?php
            printf( __( '[:nl]Laatste bewerking[:en]Last modified[:]&nbsp;' ) );
            echo get_the_modified_date('j');?>.<?php echo MonthRoman( get_the_modified_date('n') ); ?>.<?php echo get_the_modified_date('Y');
        ?>
    </div>
</div>
<div class="moddate-full"></div>
