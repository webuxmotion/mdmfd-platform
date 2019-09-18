<?php 
    $data['ctx'] = $this;
    $data['activeMainButton'] = 'md';

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
        
    </div>
</div>

<?php $this->theme->footer();?>