<div class="sidebar">
    <div class="sidebar__header">
        <a href="/" class="logo">MyDesks</a>
    </div>
    <div class="sidebar__desks">
        <div class="sidebar__desks-scrollable">
            <?php 
                $ctx->theme->block('shared/desks-list');
            ?>
        </div>
    </div>
</div>