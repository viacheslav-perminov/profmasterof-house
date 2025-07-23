let modalFunction = function () {
  let unlock = true;
  const popupLinks = document.querySelectorAll('.popup-link');
  const body = document.querySelector('body');
  const timeout = 600;

  if (popupLinks.length > 0) {
    for (let index = 0; index < popupLinks.length; index++) {
      const popupLink = popupLinks[index];
      popupLink.addEventListener('click', function (e) {
        const popupName = popupLink.getAttribute('href').replace('#', '');
        const curentPopup = document.getElementById(popupName);
        popupOpen(curentPopup);
        e.preventDefault();
      });
    }
  }

  const popupCloseIcons = document.querySelectorAll('.popup__btn-close');
  if (popupCloseIcons.length > 0) {
    for (let index = 0; index < popupCloseIcons.length; index++) {
      const popupCloseIcon = popupCloseIcons[index];
      popupCloseIcon.addEventListener('click', function (e) {
        popupClose(popupCloseIcon.closest('.popup'));
        e.preventDefault();
      });
    }
  }

  function popupOpen(curentPopup) {
    if (curentPopup && unlock) {
      const popupActive = document.querySelector('.popup.open');
      if (popupActive) {
        popupClose(popupActive, false);
      } else {
        bodyLock();
      }
      curentPopup.classList.add('open');
      curentPopup.addEventListener('click', function (e) {
        if (!e.target.closest('.popup__content')) {
          popupClose(e.target.closest('.popup'));
        }
      });
    }
  }

  function popupClose(popupActive, doUnlock = true) {
    if (unlock) {
      popupActive.classList.remove('open');
      if (doUnlock) {
        bodyUnLock();
      }
    }
  }

  function bodyLock() {
    const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';
    const lockPadding = document.querySelectorAll('.lock-padding');
    if (lockPadding.length > 0) {
      for (let index = 0; index < lockPadding.length; index++) {
        const el = lockPadding[index];
        el.style.paddingRight = lockPaddingValue;
      }
    }
    body.style.paddingRight = lockPaddingValue;
    body.classList.add('lock');

    unlock = false;
    setTimeout(function () {
      unlock = true;
    }, timeout);
  }

  function bodyUnLock() {
    setTimeout(function () {
      const lockPadding = document.querySelectorAll('.lock-padding');
      if (lockPadding.length > 0) {
        for (let index = 0; index < lockPadding.length; index++) {
          const el = lockPadding[index];
          el.style.paddingRight = '0px';
        }
      }
      body.style.paddingRight = '0px';
      body.classList.remove('lock');
    }, timeout);
    unlock = false;
    setTimeout(function () {
      unlock = true;
    }, timeout);
  }

  document.addEventListener('keydown', function (e) {
    if (e.which === 27) {
      const popupActive = document.querySelector('.popup.open');
      popupClose(popupActive);
    }
  });

  (function () {
    if (!Element.prototype.closest) {
      Element.prototype.closest = function (css) {
        var node = this;
        while (node) {
          if (node.matches(css)) return node;
          else node = node.parentElement;
        }
        return null;
      };
    }
  })();

  (function () {
    if (!Element.prototype.matches) {
      Element.prototype.matches = Element.prototype.matchesSelector ||
        Element.prototype.webkitMatchesSelector ||
        Element.prototype.mozMatchesSelector ||
        Element.prototype.msMatchesSelector;
    }
  })();

  // Делаем функцию popupOpen глобальной
  //window.popupOpen = popupOpen;
  //window.popupClose = popupClose;
};

modalFunction();

// Открытие модального окна через 20 секунд после загрузки сайта
//window.addEventListener('load', function () {
  //setTimeout(function () {
    //const popup = document.getElementById('popupAction');
    //if (popup) {
      //window.popupOpen(popup); // Используем глобальную функцию
    //}
  //}, 10000); // 20 секунд = 20000 миллисекунд
//});
