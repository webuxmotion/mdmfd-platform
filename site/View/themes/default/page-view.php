<div class="desk-page">
    <div class="desk-page__container">
        <div class="desk-page__title">
        <a href="/<?=$desk->segment?>"><?=$desk->name?></a> ->
        <?= $page->title ?>
        </div>
        <div class="desk-page__content g-pt-30">

        <form id="formPage" style="width: 100%;">
            <div class="desk-page__top-fields">
            <input type="hidden" name="page_id" id="formPageId" value="<?= $page->id ?>" />
            <div class="field">
                <div class="field__row">
                    <label>Title</label>
                </div>
                <div class="field__row">
                    <input type="text" name="title" class="form-control" id="formTitle" value="<?= $page->title ?>" placeholder="Title page...">
                </div>
            </div>
            <div class="field">
                <div class="field__row">
                    <label>Link</label>
                </div>
                <div class="field__row">
                    <div class="field__cell">
                    <input type="text" name="link" class="form-control" id="formLink" value="<?= $page->link ?>" placeholder="Link...">
                    </div>
                </div>
            </div>
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
            <button type="submit" class="desk-card__submit-button" onclick="page.update(this);return false;">
                Save content and form
            </button>
</div>
            
            <div class="field">
                <h2>Content (markdown format)</h2>
                <div id="editSection"></div>
                <div id="editorContent" style="display: none;"><?= $page->markdown ?></div>
            </div>

            <div class="field">
                <h2>Content</h2>
                <textarea name="content" id="redactor"><?= $page->content ?></textarea>
            </div>
        </form>

        </div>
    </div>
</div>