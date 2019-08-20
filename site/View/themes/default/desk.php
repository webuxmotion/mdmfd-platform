<?php $this->theme->header();?>

<?php 
  $data['switcher'] = [
    'active' => 'md' 
  ];
  $this->theme->block('header-top', $data);
?>

<?php if (isset($page)): ?>
<div class="desk-page">
  <div class="desk-page__container">
    <div class="desk-page__title">
      <a href="/">MyDesks</a> -> 
      <a href="/<?=$desk->segment?>"><?=$desk->name?></a> ->
      <?= $page->title ?>
    </div>
    <div class="desk-page__content g-pt-30">

      <form id="formPage">
          <input type="hidden" name="page_id" id="formPageId" value="<?= $page->id ?>" />
          <div class="field">
              <label>Title</label>
              <input type="text" name="title" class="form-control" id="formTitle" value="<?= $page->title ?>" placeholder="Title page...">
          </div>
          <div class="field">
              <label>Link</label>
              <input type="text" name="link" class="form-control" id="formLink" value="<?= $page->link ?>" placeholder="Link...">
          </div>
          <button type="submit" class="desk-card__submit-button" onclick="page.update(this);return false;">
              Save
          </button>
          <div class="field">
              <label>Color</label>
              <div class="form__color-items">
                <?php foreach($colors as $color) : ?>
                <div class="form__color-item">
                  <input type="radio" name="color" class="form-control" value="<?=$color?>" placeholder="Link..." <?php if ($color == $page->color) echo 'checked' ?>>
                  <div class="form__color-item-preview" style="background-color: <?=$color?>;"></div>
                </div>
                <?php endforeach; ?>
              </div>
          </div>
          <div class="field">
              <label>Content</label>
              <textarea name="content" id="redactor"><?= $page->content ?></textarea>
          </div>
      </form>

    </div>
  </div>
</div>
<?php endif; ?>

<?php if (isset($pages)) : ?>
<div class="desk-page">
  <div class="desk-page__container">
    <div class="desk-page__title"><a href="/">MyDesks</a> -> <?=$desk->name?></div>
    <div class="desk-page__content">
      <div class="desk-page__page-item">
          <!-- page-card -->
          <div class="page-card page-card--add-container">
            <div class="page-card__content">
              <div class="page-card__add-form-wrap">
                <form action="/page/create/" method="POST" class="page-card__form">
                    <input type="hidden" name="redirect" value="/<?=$desk->segment?>">
                    <input type="hidden" name="user_id" value="<?=$user_id?>">
                    <input type="hidden" name="desk_id" value="<?=$desk->id?>">
                    <input type="hidden" name="color" value="#18abd5">
                    <div>
                      <label>Title</label>
                      <input type="text" name="title" required>
                    </div>
                    <div>
                      <label>Link</label>
                      <input type="text" name="link">
                    </div>
                    <button class="desk-card__submit-button">+ Add item</button>
                </form>
              </div>
            </div>
          </div>
          <!-- END page-card -->
      </div>
      <?php foreach($pages as $page) : ?>
        <div class="desk-page__page-item js-page-<?=$page->id?>">
          <!-- page-card -->
          <div class="page-card" style="background-color: <?=$page->color?>">
            <div class="page-card__content">
              <div class="page-card__title"><?=$page->title?></div>
              <?php if ($page->link != '') : ?>
              <a 
                href="<?=$page->link?>"
                target="_blank"
                class="page-card__external-link"
              >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" height="24" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg> 
              </a>
              <?php endif; ?>
              <a 
                href="?page=<?=$page->segment?>"
                class="page-card__open-button"
              >
                Open 
              </a>
              <button onclick="page.remove(<?=$page->id?>)" class="page-card__remove-button">X</button>
            </div>
          </div>
          <!-- END page-card -->
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php endif; ?>

<?php $this->theme->footer();?>