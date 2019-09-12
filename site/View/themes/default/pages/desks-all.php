<?php $data['ctx'] = $this; $this->theme->header(); ?>

<?php
    $this->theme->block('components/header-block', $data);
?>

<?=$username?>

<?=$user->id?>

<?php print_r($desks);?>

<?php $this->theme->footer();?>