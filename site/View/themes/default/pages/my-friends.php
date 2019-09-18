<?php 
    $data['ctx'] = $this; 
    $data['activeMainButton'] = 'mfd';
    $this->theme->header(); 
?>

<?php
    $this->theme->block('components/header-block', $data);
?>

my friends list

<?php $this->theme->footer();?>