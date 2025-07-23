</main>
<footer class="footer footer--main">
  <div class="footer-top">
    <div class="container">
      <div class="footer-top__items">

        <?php if ($field = get_field('logo_f', 'option')): ?>
          <a href="<?= get_home_url() ?>" class="logo logo--footer">
            <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
              <img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($field['ID'], 'full') ?>
            <?php endif ?>
          </a>
        <?php endif ?>

        <?php if ($field = get_field('form_f', 'option')): ?>
          <?= do_shortcode('[contact-form-7 id="' . $field . '" html_class="feedback__form feedback__form--footer"]') ?>
          <div class="gratitude gratitude-3">
            <span>
              <svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 14L9.5 22.5L31 1" stroke="#65BC54" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
              </svg>
            </span>
            <strong>Заявка успешно отправлена!</strong>
            <p>Наш менеджер свяжется с вами в ближайшее время!</p>
          </div>
        <?php endif ?>

      </div>
    </div>
  </div>

  <?php if ($locations = get_nav_menu_locations()): ?>

    <div class="footer-midle">
      <div class="container">
        <div class="footer-midle__items">

          <?php 
          // Создайте массив с именами мест для навигационных меню в нужном порядке
          $menu_order = [
            'footer-3',  
            'footer-2',  
            'footer-1',  
            'footer-4',  
          ];

          foreach ($menu_order as $index): ?>

            <?php if (isset($locations[$index]) && has_nav_menu($index)): ?>
            <nav class="footer__nav">
              <strong><?= wp_get_nav_menu_object($locations[$index])->name ?></strong>
              
              <?php wp_nav_menu( array(
                'theme_location'  => $index,
                'container'       => '',
                'items_wrap'      => '<ul>%3$s</ul>'
              ) ); ?>

            </nav>
            <?php endif ?>

          <?php endforeach ?>

        </div>
      </div>
    </div>

<?php endif ?>

<div class="footer-bottom">
  <div class="container">
    <div class="footer-bottom__items">

      <?php if ($field = get_field('copyright_f', 'option')): ?>
        <small class="footer__rights"><?= $field ?></small>
      <?php endif ?>
      
      <div>
        <?php if ($field = get_field('link_f', 'option')): ?>
          <a href="<?= $field['url'] ?>" class="footer__policy"<?php if($field['target']) echo ' target="_blank"' ?>><?= $field['title'] ?></a>
        <?php endif ?>
        <a href="/obrabotka-personalnyh-dannyh/" class="footer__policy" target="_blank">Обработка персональных данных</a>
        <a href="/karta-sajta/" class="footer__policy" target="_blank">Карта сайта</a>
      </div>

      <?php if (($field = get_field('developer_f', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
      <div class="footer__studio">

        <?php if ($field['text']): ?>
          <small><?= $field['text'] ?></small>
        <?php endif ?>
        
        <?php if ($field['logo'] && $field['url']): ?>
          <a href="<?= $field['url'] ?>" target="_blank">
            <?php if (pathinfo($field['logo']['url'])['extension'] == 'svg'): ?>
              <img class="img-svg" src="<?= $field['logo']['url'] ?>" alt="<?= $field['logo']['alt'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($field['logo']['ID'], 'full') ?>
            <?php endif ?>
          </a>
        <?php endif ?>
        
      </div>
    <?php endif ?>

  </div>
</div>
</div>
</footer>
</div>

<!-- Modal window-->
<div id="popup" class="popup popup--modal">
  <div class="popup__body">
    <div class="popup__content popup__content--main">
      <a href="#header" class="popup__close popup__btn-close"></a>
      <div class="popup__row">
        <div class="popup__img"></div>
        <?= do_shortcode('[contact-form-7 id="a08cce9" html_class="popup__form"]') ?>
      </div>
      <div class="gratitude gratitude-1">
        <span>
          <svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 14L9.5 22.5L31 1" stroke="#65BC54" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" />
          </svg>
        </span>
        <strong>Заявка успешно отправлена!</strong>
        <p>Наш менеджер свяжется с вами в ближайшее время!</p>
        <button class="gratitude__btn btn popup__btn-close" type="button">Вернуться на сайт</button>
      </div>
    </div>
  </div>
</div>

<div id="popupAction" class="popup popup--modal">
  <div class="popup__body">
    <div class="popup__content popup__content--main">
      <a href="#header" class="popup__close popup__btn-close"></a>
      <div class="popup__row">
        
      </div>
      <div class="gratitude gratitude-1">
        <span>
          <svg width="32" height="24" viewBox="0 0 32 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 14L9.5 22.5L31 1" stroke="#65BC54" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" />
          </svg>
        </span>
        <strong>Заявка успешно отправлена!</strong>
        <p>Наш менеджер свяжется с вами в ближайшее время!</p>
        <button class="gratitude__btn btn popup__btn-close" type="button">Вернуться на сайт</button>
      </div>
    </div>
  </div>
</div>

<!-- Marquiz script start -->
<script>
  (function(w, d, s, o){
    var j = d.createElement(s); j.async = true; j.src = '//script.marquiz.ru/v2.js';j.onload = function() {
      if (document.readyState !== 'loading') Marquiz.init(o);
      else document.addEventListener("DOMContentLoaded", function() {
        Marquiz.init(o);
      });
    };
    d.head.insertBefore(j, d.head.firstElementChild);
  })(window, document, 'script', {
    host: '//quiz.marquiz.ru',
    region: 'eu',
    id: '66d58867241a3400264e8e5f',
    autoOpen: false,
    autoOpenFreq: 'once',
    openOnExit: false,
    disableOnMobile: false
  }
  );
</script>
<!-- Marquiz script end -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(98380740, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/98380740" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script src="//cdn.callibri.ru/callibri.js" type="text/javascript" charset="utf-8" defer></script>
<?php wp_footer() ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(98403762, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/98403762" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



</body>
</html>