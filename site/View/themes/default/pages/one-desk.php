<?php 
    $data['ctx'] = $this; 

    $this->theme->header(); 
?>

<?php
    $this->theme->block('components/header-block', $data);
?>

<div class="grid">
    <div class="grid__sidebar">
        <?php
            $this->theme->block('components/desks-list');
        ?>
    </div>
    <div class="grid__main">
        <div class="grid__main-header">
            <div class="grid__main-header-text" style="background-color: red;"><?=$desk->name?></div>
        </div>
        <div class="grid__main-content">
            <?php
                if ($pages) {
                    $this->theme->block('components/pages-list');
                } else {
                    echo 'There are nothing to show!';
                }
            ?>
        </div>
        
    </div>
</div>



<?php $this->theme->footer();?>