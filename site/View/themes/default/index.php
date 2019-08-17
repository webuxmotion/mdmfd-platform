<?php $this->theme->header();?>

<div class="hero">
    <div class="hero__container">
        <div class="hero__row">
            
        </div>
        <div class="hero__row">

        </div>
        <div class="hero__row">

        </div>
        <div class="hero__row">
            <form action="/desk/add/" method="POST">
                <input type="hidden" name="redirect" value="/">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <input type="text" name="name">
                <button>Save</button>
            </form>
        </div>
        <div class="hero__row">

        </div>
        <div class="hero__row">
            <p><?=date("Y");?></p>
        </div>
    </div>
</div>

<?php foreach($desks as $desk) : ?>
    <div class="desk-card">
        <a href="<?=$desk->segment?>"><?=$desk->name?></a>
    </div>
<?php endforeach; ?>



<?php $this->theme->footer();?>