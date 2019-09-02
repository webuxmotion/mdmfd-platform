<div class="sidebar sidebar--profile">
    <div class="sidebar__header">
        
        <a href="/" class="logo">
            <img class="logo__img" src="<?=Asset::getUrl()?>img/logo.svg">
            <span class="logo__text">MyDesks</span>
        </a>
    </div>
    <div class="sidebar__desks">
        <h2>Profile</h2>
        <?php 
            $ctx->theme->block('shared/profile-button-nav');
        ?>
    </div>
</div>