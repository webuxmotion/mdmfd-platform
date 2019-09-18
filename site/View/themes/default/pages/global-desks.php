<?php 
    $data['ctx'] = $this; 
    $data['activeMainButton'] = 'gd';
    $this->theme->header(); 
?>

<?php
    $this->theme->block('components/header-block', $data);
?>

GLOBAL DESKS

<?php $this->theme->footer();?>