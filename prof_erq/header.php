<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="wrapper" class="wrapper">
    <header class="header<?php if(is_front_page()) echo ' header--main' ?>">
      <div class="header-top">
        <div class="container">
          <div class="header-top__items">

            <?php if ($field = get_field('address_h', 'option')): ?>
              <div class="header-top__item header-top__item--address">
                <span>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                    d="M10.0001 1.66602C6.77508 1.66602 4.16675 4.27435 4.16675 7.49935C4.16675 11.8743 10.0001 18.3327 10.0001 18.3327C10.0001 18.3327 15.8334 11.8743 15.8334 7.49935C15.8334 4.27435 13.2251 1.66602 10.0001 1.66602ZM10.0001 9.58268C9.44755 9.58268 8.91764 9.36319 8.52694 8.97249C8.13624 8.58179 7.91675 8.05188 7.91675 7.49935C7.91675 6.94681 8.13624 6.41691 8.52694 6.02621C8.91764 5.63551 9.44755 5.41602 10.0001 5.41602C10.5526 5.41602 11.0825 5.63551 11.4732 6.02621C11.8639 6.41691 12.0834 6.94681 12.0834 7.49935C12.0834 8.05188 11.8639 8.58179 11.4732 8.97249C11.0825 9.36319 10.5526 9.58268 10.0001 9.58268Z"
                    fill="white" fill-opacity="0.5" />
                  </svg>
                </span>
                <strong><?= $field ?></strong>
              </div>
            <?php endif ?>
            
            <?php if ($field = get_field('email_h', 'option')): ?>
              <a href="mailto:<?= $field ?>" class="header-top__item header-top__item--mail">
                <span>
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                    d="M18.3334 7.17398V13.959C18.3335 14.6508 18.0688 15.3163 17.5937 15.8192C17.1186 16.322 16.4691 16.624 15.7784 16.6632L15.6251 16.6673H4.37508C3.6833 16.6674 3.01772 16.4027 2.51489 15.9276C2.01205 15.4525 1.71008 14.803 1.67091 14.1123L1.66675 13.959V7.17398L9.71008 11.3873C9.79956 11.4342 9.89907 11.4587 10.0001 11.4587C10.1011 11.4587 10.2006 11.4342 10.2901 11.3873L18.3334 7.17398ZM4.37508 3.33398H15.6251C16.2964 3.3339 16.9438 3.58315 17.4418 4.03337C17.9397 4.4836 18.2527 5.10272 18.3201 5.77065L10.0001 10.129L1.68008 5.77065C1.74468 5.12924 2.03596 4.53192 2.50154 4.08604C2.96712 3.64016 3.57648 3.37497 4.22008 3.33815L4.37508 3.33398Z"
                    fill="white" fill-opacity="0.5" />
                  </svg>
                </span>
                <strong><?= $field ?></strong>
              </a>
            <?php endif ?>

            <?php if ($field = get_field('text_h', 'option')): ?>
              <div class="header-top__item header-top__item--info">
                <strong><?= $field ?></strong>
              </div>
            <?php endif ?>

          </div>
        </div>
      </div>
      <div class="header-midle">
        <div class="container">
          <div class="header-midle__items">

            <?php if ($field = get_field('logo_h', 'option')): ?>
              <a href="<?= get_home_url() ?>" class="logo logo--header">
                <?php if (pathinfo($field['url'])['extension'] == 'svg'): ?>
                  <img class="img-svg" src="<?= $field['url'] ?>" alt="<?= $field['alt'] ?>">
                <?php else: ?>
                  <?= wp_get_attachment_image($field['ID'], 'full') ?>
                <?php endif ?>
              </a>
            <?php endif ?>

            <?php if (($field = get_field('price_h', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
            <div class="header-midle__item header-midle__item--calculator">

              <?php if ($field['title']): ?>
                <small><?= $field['title'] ?></small>
              <?php endif ?>
              
              <?php if ($field['link']): ?>
                <a href="<?= $field['link']['url'] ?>" class="header__calculator"<?php if($field['link']['target']) echo ' target="_blank"' ?>>

                  <?php if ($field['image_link']): ?>
                    <?php if (pathinfo($field['image_link']['url'])['extension'] == 'svg'): ?>
                      <img class="img-svg" src="<?= $field['image_link']['url'] ?>" alt="<?= $field['image_link']['alt'] ?>">
                    <?php else: ?>
                      <?= wp_get_attachment_image($field['image_link']['ID'], 'full') ?>
                    <?php endif ?>
                  <?php endif ?>

                  <?= $field['link']['title'] ?>
                </a>
              <?php endif ?>
              
            </div>
          <?php endif ?>

          <?php if (($field = get_field('question_h', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
          <div class="header-midle__item header-midle__item--whatsapp">

            <?php if ($field['title']): ?>
              <small><?= $field['title'] ?></small>
            <?php endif ?>

            <?php if ($field['link']): ?>
              <a href="<?= $field['link']['url'] ?>" class="header__whatsapp"<?php if($field['link']['target']) echo ' target="_blank"' ?>>

                <?php if ($field['image_link']): ?>
                  <?php if (pathinfo($field['image_link']['url'])['extension'] == 'svg'): ?>
                    <img class="img-svg" src="<?= $field['image_link']['url'] ?>" alt="<?= $field['image_link']['alt'] ?>">
                  <?php else: ?>
                    <?= wp_get_attachment_image($field['image_link']['ID'], 'full') ?>
                  <?php endif ?>
                <?php endif ?>

                <?= $field['link']['title'] ?>
              </a>
            <?php endif ?>

          </div>
        <?php endif ?>

        <div class="icon-menu icon-menu--open">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <?php if (($field = get_field('phone_h', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
        <div class="header__phone">

          <?php if ($field['title']): ?>
            <small><?= $field['title'] ?></small>
          <?php endif ?>

          <?php if ($field['text']): ?>
            <a href="tel:+<?= preg_replace('/[^0-9]/', '', $field['text']) ?>"><?= $field['text'] ?></a>
          <?php endif ?>

        </div>
      <?php endif ?>

      <?php if ($field = get_field('button_h', 'option')): ?>
        <a href="#popup" class="header__popup popup-link btn btn--transparent"><?= $field ?></a>
      <?php endif ?>

    </div>
  </div>
</div>
<div class="header-bottom">
  <div class="container">
    <div class="header-bottom__items">
      <nav class="nav">
        <div class="icon-menu icon-menu--close">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <?php $menu = wp_get_nav_menu_items(2) ?>

        <?php if ($menu): ?>
          <ul class="menu">

            <?php foreach ($menu as $item): ?>

              <?php $child_menu = []; ?>
              <?php foreach ($menu as $item_2): ?>
                <?php if ($item_2->menu_item_parent == $item->ID) $child_menu[] = $item_2; ?>
              <?php endforeach ?>

              <?php if ($item->menu_item_parent === '0'): ?>
                <li>
                  <a href="<?= $item->url ?>"<?php if($item->target) echo ' target="_blank"' ?>><?= $item->title ?></a>

                  <?php if ($child_menu): ?>
                    <div class="menu-arrow">
                      <svg width="10" height="5" viewBox="0 0 10 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 0.5L5 4.5L9 0.5" stroke="white" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </div>
                    <div class="menu__container">
                      <ul class="menu__two">

                        <?php foreach ($child_menu as $item_2): ?>
                          <li>
                            <a href="<?= $item_2->url ?>"<?php if($item_2->target) echo ' target="_blank"' ?>><?= $item_2->title ?></a>
                          </li>
                        <?php endforeach ?>

                      </ul>
                    </div>
                  <?php endif ?>

                </li>
              <?php endif ?>

            <?php endforeach ?>

          </ul>
        <?php endif ?>

        <div class="navigation__hidden">

          <?php if (($field = get_field('schedule_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
          <div class="navigation__hidden-item">
            <span>
              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                d="M9 1C7.94943 1 6.90914 1.20693 5.93853 1.60896C4.96793 2.011 4.08601 2.60028 3.34315 3.34315C1.84285 4.84344 1 6.87827 1 9C1 11.1217 1.84285 13.1566 3.34315 14.6569C4.08601 15.3997 4.96793 15.989 5.93853 16.391C6.90914 16.7931 7.94943 17 9 17C11.1217 17 13.1566 16.1571 14.6569 14.6569C16.1571 13.1566 17 11.1217 17 9C17 7.94943 16.7931 6.90914 16.391 5.93853C15.989 4.96793 15.3997 4.08601 14.6569 3.34315C13.914 2.60028 13.0321 2.011 12.0615 1.60896C11.0909 1.20693 10.0506 1 9 1ZM12.36 12.36L8.2 9.8V5H9.4V9.16L13 11.32L12.36 12.36Z"
                fill="#654F1A" />
              </svg>
            </span>

            <?php if ($field['title']): ?>
              <small><?= $field['title'] ?></small>
            <?php endif ?>
            
            <?php if ($field['text']): ?>
              <strong><?= $field['text'] ?></strong>
            <?php endif ?>
            
          </div>
        <?php endif ?>

        <?php if (($field = get_field('phone_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
        <div class="navigation__hidden-item">
          <span>
            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
              d="M12.0006 12.6604L13.2923 11.3682C13.4663 11.1964 13.6864 11.0787 13.9259 11.0295C14.1654 10.9804 14.414 11.0019 14.6416 11.0913L16.2158 11.7201C16.4457 11.8135 16.6429 11.9729 16.7825 12.1782C16.922 12.3835 16.9977 12.6256 17 12.8738V15.7581C16.9987 15.927 16.9632 16.0939 16.8957 16.2487C16.8282 16.4035 16.73 16.5431 16.6072 16.6589C16.4844 16.7748 16.3394 16.8646 16.1809 16.923C16.0225 16.9813 15.8539 17.007 15.6853 16.9984C4.6544 16.3119 2.42862 6.96679 2.00768 3.39026C1.98814 3.21462 2.00599 3.03684 2.06006 2.86861C2.11414 2.70037 2.2032 2.5455 2.3214 2.41417C2.4396 2.28285 2.58426 2.17805 2.74585 2.10666C2.90745 2.03528 3.08232 1.99894 3.25896 2.00002H6.04407C6.29261 2.00076 6.53523 2.07586 6.74075 2.21567C6.94627 2.35548 7.10528 2.5536 7.19733 2.78455L7.82585 4.35938C7.91826 4.58613 7.94183 4.83509 7.89363 5.07516C7.84543 5.31523 7.7276 5.53577 7.55484 5.70923L6.26319 7.0014C6.26319 7.0014 7.00704 12.0374 12.0006 12.6604Z"
              fill="#654F1A" />
            </svg>
          </span>
          
          <?php if ($field['title']): ?>
            <small><?= $field['title'] ?></small>
          <?php endif ?>

          <?php if ($field['text']): ?>
            <a href="tel:+<?= preg_replace('/[^0-9]/', '', $field['text']) ?>"><?= $field['text'] ?></a>
          <?php endif ?>

        </div>
      <?php endif ?>

      <?php if (($field = get_field('email_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
      <div class="navigation__hidden-item">
        <span>
          <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
            d="M17 6.456V12.5625C17 13.1851 16.7618 13.7841 16.3342 14.2367C15.9067 14.6892 15.3221 14.961 14.7005 14.9963L14.5625 15H4.4375C3.8149 15 3.21588 14.7618 2.76333 14.3342C2.31078 13.9067 2.039 13.3221 2.00375 12.7005L2 12.5625V6.456L9.239 10.248C9.31953 10.2902 9.40909 10.3122 9.5 10.3122C9.59091 10.3122 9.68047 10.2902 9.761 10.248L17 6.456ZM4.4375 3H14.5625C15.1667 2.99993 15.7494 3.22425 16.1975 3.62945C16.6457 4.03465 16.9274 4.59186 16.988 5.193L9.5 9.1155L2.012 5.193C2.07014 4.61573 2.33229 4.07814 2.75131 3.67685C3.17034 3.27556 3.71876 3.03689 4.298 3.00375L4.4375 3Z"
            fill="#654F1A" />
          </svg>
        </span>

        <?php if ($field['title']): ?>
          <small><?= $field['title'] ?></small>
        <?php endif ?>

        <?php if ($field['text']): ?>
          <a href="mailto:<?= $field['text'] ?>"><?= $field['text'] ?></a>
        <?php endif ?>

      </div>
    <?php endif ?>

    <?php if (($field = get_field('address_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
    <div class="navigation__hidden-item">
      <span>
        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
          d="M9 1C5.68286 1 3 3.6605 3 6.95C3 11.4125 9 18 9 18C9 18 15 11.4125 15 6.95C15 3.6605 12.3171 1 9 1ZM9 9.075C8.43168 9.075 7.88663 8.85112 7.48477 8.4526C7.08291 8.05409 6.85714 7.51359 6.85714 6.95C6.85714 6.38642 7.08291 5.84591 7.48477 5.4474C7.88663 5.04888 8.43168 4.825 9 4.825C9.56832 4.825 10.1134 5.04888 10.5152 5.4474C10.9171 5.84591 11.1429 6.38642 11.1429 6.95C11.1429 7.51359 10.9171 8.05409 10.5152 8.4526C10.1134 8.85112 9.56832 9.075 9 9.075Z"
          fill="#654F1A" />
        </svg>
      </span>

      <?php if ($field['title']): ?>
        <small><?= $field['title'] ?></small>
      <?php endif ?>

      <?php if ($field['text']): ?>
        <strong><?= $field['text'] ?></strong>
      <?php endif ?>

    </div>
  <?php endif ?>

  <?php if (($field = get_field('socials_hm', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
  <div class="navigation__hidden-item">

    <?php if ($field['title']): ?>
      <small><?= $field['title'] ?></small>
    <?php endif ?>

    <?php if (is_array($field['items']) && checkArrayForValues($field['items'])): ?>
    <div class="navigation__hidden-socials socials">

      <?php foreach ($field['items'] as $item): ?>
        <?php if ($item['link'] && $item['icon']): ?>
          <a href="<?= $item['link']['url'] ?>" class="social social--<?= basename($item['icon']['url'], '.svg') ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
            <?php if (pathinfo($item['icon']['url'])['extension'] == 'svg'): ?>
              <img class="img-svg" src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($item['icon']['ID'], 'full') ?>
            <?php endif ?>
          </a>
        <?php endif ?>
      <?php endforeach ?>

    </div>
  <?php endif ?>

</div>
<?php endif ?>

</div>
</nav>
<div class="header__services">
  <div class="icon-menu icon-menu--services">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <?php wp_nav_menu( array(
    'theme_location'  => 'header-2',
    'container'       => '',
    'items_wrap'      => '<ul class="header__services-list">%3$s</ul>'
  ) ); ?>

</div>
</div>
</div>
</div>
</header>
<main class="main">

  <?php if (!is_front_page() && function_exists('bcn_display')): ?>
  <div class="breadcrumb-wrapper">
    <div class="container">
      <ul class="breadcrumb">
        <?php bcn_display() ?>
      </ul>
    </div>
  </div>
  <?php endif ?>