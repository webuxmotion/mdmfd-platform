<?php
if (isset($switcher)) {
  $active = $switcher['active']; 
} else {
  $active = 'md';
}
?>
<div class="header-top">
  <div class="header-top__container">
    <div class="header-top__cell">
      <a href="/" class="header-top__logo">MDMFD</a>
    </div> 
    <div class="header-top__cell">
      <div class="header-top__switcher">
        <a href="/" class="header-top__switcher-control <?php if ($active == 'md') echo 'is-active';?>">My Desks</a>
        <a href="/" class="header-top__switcher-control <?php if ($active == 'mfd') echo 'is-active';?>">My Friend's Desks</a>
      </div>
    </div> 
    <div class="header-top__cell">
      <div class="header-top__profile">
        <label for="profile-icon" class="header-top__profile-label"></label>
        <input id="profile-icon" type="checkbox" class="header-top__input" hidden>
        <div class="header-top__profile-dropdown">
           <a href="/logout/">Logout</a> 
        </div>
      </div>     
    </div> 
  </div>
</div>
