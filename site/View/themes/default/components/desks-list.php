<?php
$deskSegment = '';
if (isset($segment)) {
    $deskSegment = $segment;
}
?>

<nav class="desks-list">
    <div class="desks-list__header">MY DESKS</div>
    <ul class="desks-list__list">
        <?php foreach ($desks as $desk) : ?>

            <?php $elClass = $deskSegment == $desk->segment ? "class='is-active'" : ''; ?>

            <li <?=$elClass?>>
                <a href="/<?=$username?>/<?=$desk->segment?>"><?=$desk->name;?></a>
                <div class="desks-list__current-label" style="background-color: red;"></div>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>