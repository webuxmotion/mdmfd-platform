<?php
if (isset($activeMainButton)) {
    $activeButton = $activeMainButton;
} else {
    $activeButton = false;
}
?>
<header class="header-block">
    <div class="header-block__main-switcher">
        <div class="header-block__main-switcher-group g-pr-50">
            <div class="header-block__main-switcher-item">
                <?php
                    $data['item'] = (object) [
                        "text" => "MD",
                        "link" => "/" . $user->username,
                        "active" => $activeButton == 'md' ? true : false
                    ];
                    $ctx->theme->block('components/main-button', $data);
                ?>
            </div>
            <div class="header-block__main-switcher-item">
                <?php
                    $data['item'] = (object) [
                        "text" => "MFD",
                        "link" => "/{$user->username}/my-friends-desks/",
                        "active" => $activeButton == 'mfd' ? true : false
                    ];
                    $ctx->theme->block('components/main-button', $data);
                ?>
            </div>
        </div>
        <div class="header-block__main-switcher-group">
            <div class="header-block__main-switcher-item">
                <?php
                    $data['item'] = (object) [
                        "text" => "GD",
                        "link" => "/{$user->username}/global-desks/",
                        "active" => $activeButton == 'gd' ? true : false
                    ];
                    $ctx->theme->block('components/main-button', $data);
                ?>
            </div>
        </div>
        
    </div>
    
</header>