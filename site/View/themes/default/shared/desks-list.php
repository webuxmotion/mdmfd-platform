<div class="desks-list">
  <div class="desks-list__container">

    <div class="desks-list__item">
        <!-- desk-card -->
        <div class="desk-card">
          <div class="desk-card__form-wrap">
            <form action="/desk/add/" method="POST" class="desk-card__form">
                <input type="hidden" name="redirect" value="/">
                <input type="hidden" name="user_id" value="<?=$user_id?>">
                <input type="text" name="name" placeholder="Your desk name" required>
                <button class="desk-card__submit-button">+ Add desk</button>
            </form>
          </div>
        </div>
        <!-- END desk-card -->
    </div>

  

    <?php foreach($desks as $item) : ?>
      <?php
        $activeClass = '';
        if (isset($desk)) {
          if ($desk !== null) {
            if ($desk->segment == $item->segment) {
              $activeClass = 'is-active';
            }
          }
        }
      ?>
        <div class="desks-list__item">
            <!-- desk-card -->
            <div class="desk-card <?=$activeClass?>">
              <a 
                href="/<?=$item->segment?>"
                class="desk-card__link"
              >
                <?=$item->name?>
              </a>
            </div>
            <!-- END desk-card -->
        </div>
    <?php endforeach; ?>

  </div>
</div>