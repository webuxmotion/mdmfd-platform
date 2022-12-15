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
            <h1 class="hero__title">LeftTab</h1>
        </div>
        <div class="hero__row">
            <p class="hero__description">Link Actualizing Platform</p>
        </div>
        <div class="hero__row">
            <?php if (isset($_SESSION['registeredStatus'])) :?>
                <?php if ($_SESSION['registeredStatus'] !== 0) :?>
                    <h2 class="hero__registered-status-message">
                        Congratulation!<br>Please, login now!
                    </h2>
                <?php unset($_SESSION['registeredStatus']); endif; ?>
            <?php endif; ?>
            <form class="form form--login" role="form" method="POST" action="/authenticate/">
                <div class="form__row">
                    <input type="email" name="email" class="form__input" placeholder="Email" required autofocus>
                </div>
                <div class="form__row">
                    <input type="password" name="password" class="form__input" placeholder="Password" required>
                </div>
                <div class="form__row">
                    <button class="button form__submit-button" type="submit">Login</button>
                </div>
                <div class="form__row form__row--footer-links">
                    <div class="form__footer-link-wrap">
                        <a href="/register/" class="form__footer-link">Register</a>
                    </div>
                    <div class="form__footer-link-wrap">
                        <a href="/restore-password/" class="form__footer-link form__footer-link--gray">Forgot password?</a>
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