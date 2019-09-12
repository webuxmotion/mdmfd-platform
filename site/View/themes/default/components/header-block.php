<header class="header-block">
    <div class="header-block__main-switcher">
        <div class="header-block__main-switcher-group">
            <div class="header-block__main-switcher-item">
                <?php
                    $data['item'] = (object) [
                        "text" => "MD",
                        "link" => "/" . $user->username
                    ];
                    $ctx->theme->block('components/main-button', $data);
                ?>
            </div>
            <div class="header-block__main-switcher-item">
                <?php
                    $data['item'] = (object) [
                        "text" => "MFD",
                        "link" => "/{$user->username}/my-friends-desks/"
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
                        "link" => "/{$user->username}/global-desks/"
                    ];
                    $ctx->theme->block('components/main-button', $data);
                ?>
            </div>
        </div>
        
    </div>
    
</header>