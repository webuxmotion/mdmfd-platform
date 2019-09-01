<?php $this->theme->header();?>

<div class="grid">
  <div class="grid__sidebar">

    <?php 
      $data['ctx'] = $this;
      $this->theme->block('sidebar', $data);
    ?>

  </div>
  <div class="grid__content">

    <?php $this->theme->block('shared/profile-button'); ?>

    <div class="grid__content-scrollable">
      
      <?php if (isset($page)): ?>

        <?php if ($page): ?>
          
          <?php $this->theme->block('page-view'); ?>

        <?php else: ?>

          <h2>This PAGE does not exist</h2>
          <p>Go to <a href="/">main page</a></p>

        <?php endif; ?>

      <?php elseif (isset($pages)): ?>
      
        <?php $this->theme->block('desk-view'); ?>

      <?php else: ?>

        <h2>This desk does not exist</h2>
        <p>Go to <a href="/">main page</a></p>

      <?php endif; ?>

    </div>
  </div>
</div>

<?php $this->theme->footer();?>
