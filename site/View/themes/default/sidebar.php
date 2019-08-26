<div class="sidebar">
    <div class="sidebar__header">
        
        <a href="/" class="logo">
            <img class="logo__img" src="<?=Asset::getUrl()?>img/logo.svg">
            <span class="logo__text">MyDesks</span>
        </a>
    </div>
    <div class="sidebar__desks">
        <div class="sidebar__desks-scrollable">
            <?php 
                $ctx->theme->block('shared/desks-list');
            ?>
        </div>
    </div>
</div>