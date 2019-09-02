<?php $this->theme->header();?>

<div class="grid">
  <div class="grid__sidebar">

    <?php 
      $data['ctx'] = $this;
      $this->theme->block('profile-sidebar', $data);
    ?>

  </div>
  <div class="grid__content">
    <?php 
      $data['ctx'] = $this;
      $this->theme->block('shared/profile-button', $data);
    ?>
    <div class="grid__content-scrollable" style="padding: 20px;">
      
      <h1>Personal data</h1>

      <form>
        <div>
          <label for="firstname">Firstname</label>
          <input id="firstname" name="firstname">
        </div>
        <div>
          <label for="lastname">Lastname</label>
          <input id="lastname" name="lastname">
        </div>
      </form>
    </div>
  </div>
</div>

<?php $this->theme->footer();?>