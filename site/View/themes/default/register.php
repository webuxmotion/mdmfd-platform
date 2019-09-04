<?php $this->theme->header();?>

<div class="hero">
    <div class="hero__container">
        <div class="hero__row hero__row--top g-text-right">
            <select class="hero__select">
                <option value="english">en</option>
                <option value="russian">ru</option>
                <option value="ukrainian">ua</option>
            </select>
        </div>
        <div class="hero__row">
            <h1 class="hero__title">MDMFD</h1>
        </div>
        <div class="hero__row">
            <p class="hero__description">Link Actualizing Platform</p>
        </div>
        <div class="hero__row">
            <form class="form form--login" role="form" method="POST" action="/register-user/">
                <div class="form__row">
                    <input type="email" name="email" class="form__input" placeholder="Email" required autofocus>
                    <?=isset($emailErrorMessage) ? $emailErrorMessage : ''?>
                </div>
                <div class="form__row">
                    <input type="password" name="password" class="form__input" placeholder="Password" required>
                </div>
                <div class="form__row">
                    <button class="button form__submit-button" type="submit">Register</button>
                </div>
                <div class="form__row form__row--footer-links">
                    <div class="form__footer-link-wrap">
                        <a href="/login/" class="form__footer-link">Login</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="hero__row hero__row--video">
            <div class="hero__video-title">
                Video presentation
            </div>
            <div class="hero__video-wrap">
                <video 
                    width="100%" 
                    class="hero__video" 
                    controls="controls" 
                    poster="<?=Asset::getUrl()?>img/poster.png"
                >
                    <source src="<?=Asset::getUrl()?>files/mdmfd-presentation.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    Тег video не поддерживается вашим браузером. 
                </video>
            </div>
        </div>
        <div class="hero__row">
            <p><?=date("Y");?> © MDMFD. Link Actualizing Platform</p>
        </div>
    </div>
</div>

<?php $this->theme->footer();?>