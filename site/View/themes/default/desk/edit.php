<?php $this->theme->header();?>

<?php 
  $data['switcher'] = [
    'active' => 'md' 
  ];
  $this->theme->block('header-top', $data);
?>

<form method="POST" action="/desk/update/">
  <input name="id" id="desk_id" type="hidden" value="<?=$desk->id?>">
  <input name="user_id" id="user_id" type="hidden" value="<?=$desk->user_id?>">
  <input name="name" id="name" value="<?=$desk->name?>">
  <input name="segment" id="segment" value="<?=$desk->segment?>">
  <button onclick="desk.update(event, this)">Save</button>
</form>
<div class="message"></div>

<?php $this->theme->footer();?>
