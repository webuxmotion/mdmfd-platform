<ul class="pages-list">
    <?php foreach ($pages as $page) : ?>
        <li>
            <a href="/<?=$username?>/<?=$segment?>/<?=$page->segment;?>"><?=$page->title;?></a>
        </li>
    <?php endforeach; ?>
</ul>