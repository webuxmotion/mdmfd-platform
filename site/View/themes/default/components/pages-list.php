<div class="pages-list">
    <?php foreach ($pages as $page) : ?>
        <?php
            $href = "/" . $username . "/" . $segment . "/" . $page->segment;
        ?>
        <div class="pages-list__item">
            <div class="card">
                <a 
                    href="<?=$href?>"
                    class="card__link"
                    style="background-color: <?=$page->color?>"
                >
                    <?=$page->title;?>
                </a>
                <?php if ($page->link != '') : ?>
                    <a
                        href="<?=$page->link?>"
                        class="card__external-link"
                        target="_blank"
                    >

                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>