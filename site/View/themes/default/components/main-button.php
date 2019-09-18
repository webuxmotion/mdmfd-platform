<?php
    if ($item->active) {
        $activeClass = 'is-active';
    } else {
        $activeClass = '';
    }
?>
<a href="<?=$item->link?>" class="main-button <?=$activeClass?>">
    <?=$item->text?>
</a>