<div class="desk-page">
    <div class="desk-page__container">
        <div class="desk-page__title">
            <?=$desk->name?>

        <a href="/desk/edit/<?=$desk->segment?>" class="desk-page__title-edit-button">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
            <g>
                <g>
                <path d="m119.2,114.3h-109.4c-2.3,0-4.1,1.9-4.1,4.1s1.9,4.1 4.1,4.1h109.5c2.3,0 4.1-1.9 4.1-4.1s-1.9-4.1-4.2-4.1z"/>
                <path d="m5.7,78l-.1,19.5c0,1.1 0.4,2.2 1.2,3 0.8,0.8 1.8,1.2 2.9,1.2l19.4-.1c1.1,0 2.1-0.4 2.9-1.2l67-67c1.6-1.6 1.6-4.2 0-5.9l-19.2-19.4c-1.6-1.6-4.2-1.6-5.9-1.77636e-15l-13.4,13.5-53.6,53.5c-0.7,0.8-1.2,1.8-1.2,2.9zm71.2-61.1l13.5,13.5-7.6,7.6-13.5-13.5 7.6-7.6zm-62.9,62.9l49.4-49.4 13.5,13.5-49.4,49.3-13.6,.1 .1-13.5z"/>
                </g>
            </g>
            </svg>
        </a>
        </div>

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
                        <div style="text-align: center;">
                        <button class="desk-card__submit-button">+ Add item</button>
                        </div>
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
                <button onclick="page.remove(<?=$page->id?>)" class="page-card__remove-button">
                <svg height="20" viewBox="1 1 511.99998 511.99998" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m256 0c-141.386719 0-256 114.613281-256 256s114.613281 256 256 256 256-114.613281 256-256c-.167969-141.316406-114.683594-255.832031-256-256zm0 480c-123.710938 0-224-100.289062-224-224s100.289062-224 224-224 224 100.289062 224 224c-.132812 123.65625-100.34375 223.867188-224 224zm0 0"/><path d="m380.449219 131.550781c-6.25-6.246093-16.378907-6.246093-22.625 0l-101.824219 101.824219-101.824219-101.824219c-6.140625-6.355469-16.269531-6.53125-22.625-.390625-6.355469 6.136719-6.53125 16.265625-.390625 22.621094.128906.132812.257813.265625.390625.394531l101.824219 101.824219-101.824219 101.824219c-6.355469 6.136719-6.53125 16.265625-.390625 22.625 6.136719 6.355469 16.265625 6.53125 22.621094.390625.132812-.128906.265625-.257813.394531-.390625l101.824219-101.824219 101.824219 101.824219c6.355469 6.136719 16.484375 5.960937 22.621093-.394531 5.988282-6.199219 5.988282-16.03125 0-22.230469l-101.820312-101.824219 101.824219-101.824219c6.246093-6.246093 6.246093-16.375 0-22.625zm0 0"/></svg>
                </button>
                </div>
            </div>
            <!-- END page-card -->
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>