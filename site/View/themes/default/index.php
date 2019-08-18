<?php $this->theme->header();?>

<?php 
  $data['switcher'] = [
    'active' => 'md' 
  ];
  $this->theme->block('header-top', $data);
?>

<div class="desks-list">
  <div class="desks-list__container">

    <div class="desks-list__item">
        <!-- desk-card -->
        <div class="desk-card">
          <div class="desk-card__form-wrap">
            <form action="/desk/add/" method="POST" class="desk-card__form">
                <input type="hidden" name="redirect" value="/">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <input type="text" name="name" required>
                <button class="desk-card__submit-button">+ Add desk</button>
            </form>
          </div>
        </div>
        <!-- END desk-card -->
    </div>

    <?php foreach($desks as $desk) : ?>
        <div class="desks-list__item">
            <!-- desk-card -->
            <div class="desk-card">
              <a 
                href="<?=$desk->segment?>"
                class="desk-card__link"
              >
                <?=$desk->name?>
              </a>
            </div>
            <!-- END desk-card -->
        </div>
    <?php endforeach; ?>

  </div>
</div>

<?php $this->theme->footer();?>
