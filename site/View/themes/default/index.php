<?php $this->theme->header();?>

<div class="grid">
  <div class="grid__sidebar">

    <?php 
      $data['ctx'] = $this;
      $this->theme->block('sidebar', $data);
    ?>

  </div>
  <div class="grid__content">
    <?php 
      $this->theme->block('shared/profile-button');
    ?>
    <div class="grid__content-scrollable">
      <p>Hello! This is MyDesks App</p>
    </div>
  </div>
</div>

<?php $this->theme->footer();?>
