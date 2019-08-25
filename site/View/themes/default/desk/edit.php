<?php $this->theme->header();?>

<div class="grid">
  <div class="grid__sidebar">

    <?php 
      $data['ctx'] = $this;
      $this->theme->block('sidebar', $data);
    ?>

  </div>
  <div class="grid__content">
    <div class="grid__content-scrollable">
      <h2>Edit desk</h2>
      <form method="POST" action="/desk/update/">
        <input name="id" id="desk_id" type="hidden" value="<?=$desk->id?>">
        <input name="user_id" id="user_id" type="hidden" value="<?=$desk->user_id?>">
        <input name="name" id="name" value="<?=$desk->name?>">
        <input name="segment" id="segment" value="<?=$desk->segment?>">
        <button onclick="desk.update(event, this)">Save</button>
      </form>
      <div class="message"></div>

    </div>
  </div>
</div>

<?php $this->theme->footer();?>