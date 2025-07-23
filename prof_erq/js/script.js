/* скролл с шапкой  и отступ для шапки*/
if (document.documentElement.clientWidth > 992) {
  window.addEventListener("DOMContentLoaded", () => {
    let header = document.querySelector(".header");
    let headerBottom = document.querySelector(".header-bottom");
    // let headerTop = document.querySelector(".header__top").getBoundingClientRect().height;
    if (header && headerBottom) {
      let headerDifference = header.getBoundingClientRect().height - headerBottom.getBoundingClientRect().height;
      window.addEventListener("scroll", function () {
        if (window.scrollY >= headerDifference) {
          headerBottom.classList.add("lock-padding");
          header.classList.add("sticky");
        }
        if (window.scrollY <= headerDifference) {
          header.classList.remove("sticky");
          headerBottom.classList.remove("lock-padding");
        }
      });
    }
  })
}



/* Бургер меню */
let unlock = true;
let burgerMenu = function () {
  let iconMenuOpen = document.querySelector(".icon-menu--open");
  if (iconMenuOpen) {
    let iconMenuClose = document.querySelector(".icon-menu--close");
    let navigationItem = document.querySelector(".nav");
    iconMenuOpen.addEventListener("click", function () {
      if (unlock) {
        document.body.classList.add('lock');
        iconMenuOpen.classList.add("active");
        iconMenuClose.classList.add("active");
        navigationItem.classList.add("active");
      }
    })
    iconMenuClose.addEventListener("click", function () {
      document.body.classList.remove('lock');
      iconMenuOpen.classList.remove("active");
      iconMenuClose.classList.remove("active");
      navigationItem.classList.remove("active");
    })
  }
};
if (document.documentElement.clientWidth < 992) {
  burgerMenu();
}


/** меню второго уровня **/
let addActiveFuction = function (itemName, subName) {
  let items = document.querySelectorAll(itemName);
  if (items.length > 0) {
    items.forEach(item => {
      let itemParent = item.parentElement;
      let itemSub = itemParent.querySelector(subName);
      //console.log(itemSub)
      item.addEventListener("click", function (e) {
        e.stopPropagation();
        item.classList.toggle("active");
        if (itemSub) {
          itemSub.classList.toggle("active");
        }
      });
      document.addEventListener("click", function (e) {
        let target = e.target;
        let its_item = target == item;
        let its_itemSub = target == itemSub;
        if (!its_item && !its_itemSub) {
          item.classList.remove("active");
          itemSub.classList.remove("active");
        }
      });
    });

  }
}
if (document.documentElement.clientWidth < 992) {
  addActiveFuction(".menu-arrow", ".menu__container");
}




/* галочка для input с типом checkbox */
let inputUpdateActiveClass = function (itemName, itemTextName) {
  let inputs = document.querySelectorAll(itemName);
  if (inputs.length > 0) {
    inputs.forEach(input => {
      const label = input.closest('label');
      const filterText = label.querySelector(itemTextName);
      if (label && filterText) {
        if (input.checked) {
          label.classList.add('active');
          filterText.classList.add('active');
        } else {
          label.classList.remove('active');
          filterText.classList.remove('active');
        }
        input.addEventListener('change', function () {
          if (input.checked) {
            label.classList.add('active');
            filterText.classList.add('active');
          } else {
            label.classList.remove('active');
            filterText.classList.remove('active');
          }
        });
      }
    });
  }
}
window.addEventListener("DOMContentLoaded", function () {
  inputUpdateActiveClass('.filter input[type="checkbox"]', '.filter__text');
  inputUpdateActiveClass('.checkbox input[type="checkbox"]', '.checkbox__text');
  inputUpdateActiveClass('.subcategories__item-links label input[type="checkbox"]', '.subcategories__item-links label p');
  inputUpdateActiveClass('.categories__slider-item input[type="checkbox"]', '.categories__slider-item p');
});



/* галочка для input с типом radio */
window.addEventListener("DOMContentLoaded", function () {
  const radioButtons = document.querySelectorAll('.filter input[type="radio"]');
  if (radioButtons.length > 0) {
    function updateActiveClass() {
      radioButtons.forEach(radio => {
        const label = radio.closest('label');
        const filterText = label.querySelector('.filter__text');
        if (radio.checked) {
          filterText.classList.add('active');
        } else {
          filterText.classList.remove('active');
        }
      });
    }
    updateActiveClass();
    radioButtons.forEach(radio => {
      radio.addEventListener('change', updateActiveClass);
    });
  }
});



/* Меню услуг в хедере*/
let burgerMenuServices = function () {
  const iconMenuOpen = document.querySelector(".icon-menu--services");
  if (iconMenuOpen) {
    const headerMenu = document.querySelector(".header__services-list");
    if (iconMenuOpen && headerMenu) {
      iconMenuOpen.addEventListener("click", function () {
        if (iconMenuOpen.classList.contains("active")) {
          iconMenuOpen.classList.remove("active");
          headerMenu.classList.remove("active");
        } else {
          iconMenuOpen.classList.add("active");
          headerMenu.classList.add("active");
        }
      })
    }
    if (iconMenuOpen && headerMenu) {
      document.addEventListener('click', function (e) {
        let target = e.target;
        let its_clickZone = target == headerMenu || headerMenu.contains(target);
        let its_clickZoneOpen = target == iconMenuOpen || iconMenuOpen.contains(target);
        let clickZone_is_active = headerMenu.classList.contains('active');
        if (!its_clickZone && !its_clickZoneOpen && clickZone_is_active) {
          iconMenuOpen.classList.remove("active");
          headerMenu.classList.remove("active");
        }
      });
    }
  }
};
burgerMenuServices();




/* Нахождение найбольшего по высоте элемента */
const elementMaxHeight = function (itemsName) {
  const items = document.querySelectorAll(itemsName);
  if (items.length > 0) {
    const maxHeight = Array.from(items).reduce((maxHeight, item) => {
      return Math.max(maxHeight, item.getBoundingClientRect().height);
    }, 0);
    Array.from(items).forEach(item => {
      item.style.height = `${maxHeight}px`;
    });
  }
}
window.addEventListener("load", function () {
  if (document.documentElement.clientWidth > 480) {
    elementMaxHeight(".ideal__slider .ideal__house-info > strong");
    elementMaxHeight(".care__slider .ideal__house-info > strong");
    elementMaxHeight(".relevant__items .stock h6");
    elementMaxHeight(".new__info > strong");
  }
})




/* добавление класс active на картинку при наведении мышки на кнопку */
function handleMouseEvents(parenItemName, parenItemImage, parenItemButton) {
  let parents = document.querySelectorAll(parenItemName);
  if (parents.length > 0) {
    parents.forEach(function (parent) {
      const imageBlock = parent.querySelector(parenItemImage);
      const buttonBlock = parent.querySelector(parenItemButton);
      if (imageBlock && buttonBlock) {
        buttonBlock.addEventListener("mouseenter", function () {
          imageBlock.classList.add("active");
        });
        buttonBlock.addEventListener("mouseleave", function () {
          imageBlock.classList.remove("active");
        });
      }
    });
  }
}
if (document.documentElement.clientWidth > 768) {
  handleMouseEvents(".house", ".house__img img", ".house__btn");
  handleMouseEvents(".propose", ".propose__img img", ".propose__btn");
  handleMouseEvents(".ideal__house", ".ideal__house-img img", ".ideal__house-btn");
  handleMouseEvents(".stock", ".stock img", ".stock__btn");
  handleMouseEvents(".new", ".new__img img", ".new__btn");
  handleMouseEvents(".recommendation", ".recommendation a img", ".recommendation a span");
  handleMouseEvents(".reviewvi", ".reviewvi img", ".reviewvi span");
  handleMouseEvents(".info__images a", ".info__images a img", ".info__images a span");
  handleMouseEvents(".interview__img a", ".interview__img a img", ".interview__img a span");
  handleMouseEvents(".house-card__slider-main a", ".house-card__slider-main a img", ".house-card__slider-main a span");
}




/* Появление заголовков с помощью обсервера */
document.addEventListener("DOMContentLoaded", () => {
  const newObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry) {
        const element = entry.target;
        if (entry.isIntersecting) {
          element.classList.add("active");
          observer.unobserve(element);// после попадания в область видимости oserver больше не отслеживает появление
        }
      }
    })
  },
    {
      rootMargin: "0px 0px -50px 0px"  // определяет за сколько пикселей до попадания в область видимости произойдёт событие в обозревателе
    }
  );
  if (document.documentElement.clientWidth > 660) {
    let addNewObserver = function (itemName) {
      const newElements = document.querySelectorAll(itemName);
      if (newElements.length > 0) {
        for (i = 0; i < newElements.length; i++) {
          let newElement = newElements[i];
          newObserver.observe(newElement)
        }
      }
    }
    addNewObserver(".show");
  }
})



/* Табы */
class GraphTabs {
  constructor(selector, options) {
    let defaultOptions = {
      isChanged: () => { }
    }
    this.options = Object.assign(defaultOptions, options);
    this.selector = selector;
    this.tabs = document.querySelector(`[data-tabs="${selector}"]`);
    if (this.tabs) {
      this.tabList = this.tabs.querySelector('.tabs__nav');
      this.tabsBtns = this.tabList.querySelectorAll('.tabs__nav-btn');
      this.tabsPanels = this.tabs.querySelectorAll('.tabs__panel');
    } else {
      console.error('Селектор data-tabs не существует!');
      return;
    }
    this.check();
    this.init();
    this.events();
  }
  check() {
    if (document.querySelectorAll(`[data-tabs="${this.selector}"]`).length > 1) {
      console.error('Количество элементов с одинаковым data-tabs больше одного!');
      return;
    }
    if (this.tabsBtns.length !== this.tabsPanels.length) {
      console.error('Количество кнопок и элементов табов не совпадает!');
      return;
    }
  }
  init() {
    this.tabList.setAttribute('role', 'tablist');
    this.tabsBtns.forEach((el, i) => {
      el.setAttribute('role', 'tab');
      el.setAttribute('tabindex', '-1');
      el.setAttribute('id', `${this.selector}${i + 1}`);
      el.classList.remove('tabs__nav-btn--active');
    });
    this.tabsPanels.forEach((el, i) => {
      el.setAttribute('role', 'tabpanel');
      el.setAttribute('tabindex', '-1');
      el.setAttribute('aria-labelledby', this.tabsBtns[i].id);
      el.classList.remove('tabs__panel--active');
    });
    this.tabsBtns[0].classList.add('tabs__nav-btn--active');
    this.tabsBtns[0].removeAttribute('tabindex');
    this.tabsBtns[0].setAttribute('aria-selected', 'true');
    this.tabsPanels[0].classList.add('tabs__panel--active');
  }
  events() {
    this.tabsBtns.forEach((el, i) => {
      el.addEventListener('click', (e) => {
        let currentTab = this.tabList.querySelector('[aria-selected]');
        if (e.currentTarget !== currentTab) {
          this.switchTabs(e.currentTarget, currentTab);
        }
      });
      el.addEventListener('keydown', (e) => {
        let index = Array.prototype.indexOf.call(this.tabsBtns, e.currentTarget);
        let dir = null;
        if (e.which === 37) {
          dir = index - 1;
        } else if (e.which === 39) {
          dir = index + 1;
        } else if (e.which === 40) {
          dir = 'down';
        } else {
          dir = null;
        }
        if (dir !== null) {
          if (dir === 'down') {
            this.tabsPanels[i].focus();
          } else if (this.tabsBtns[dir]) {
            this.switchTabs(this.tabsBtns[dir], e.currentTarget);
          }
        }
      });
    });
  }
  switchTabs(newTab, oldTab = this.tabs.querySelector('[aria-selected]')) {
    newTab.focus();
    newTab.removeAttribute('tabindex');
    newTab.setAttribute('aria-selected', 'true');
    oldTab.removeAttribute('aria-selected');
    oldTab.setAttribute('tabindex', '-1');
    let index = Array.prototype.indexOf.call(this.tabsBtns, newTab);
    let oldIndex = Array.prototype.indexOf.call(this.tabsBtns, oldTab);
    this.tabsPanels[oldIndex].classList.remove('tabs__panel--active');
    this.tabsPanels[index].classList.add('tabs__panel--active');
    this.tabsBtns[oldIndex].classList.remove('tabs__nav-btn--active');
    this.tabsBtns[index].classList.add('tabs__nav-btn--active');
    this.options.isChanged(this);
  }
}

let tabsItem1 = document.querySelector('.hits__tabs');
if (tabsItem1) {
  const tabs1 = new GraphTabs('hits-tabs');
}

let tabsItem2 = document.querySelector('.customers__tabs');
if (tabsItem2) {
  const tabs2 = new GraphTabs('customers-tabs');
}
let tabsItem3 = document.querySelector('.house-card__tabs');
if (tabsItem3) {
  const tabs3 = new GraphTabs('house-card-tab');
}




/* увеличение картинок*/
Fancybox.bind("[data-fancybox]", {
  Thumbs: false,
  hideScrollbar: false,
  Carousel: {
    infinite: false,
  },
  hideScrollbar: false,
  animation: false,
});




/* for tel */
window.addEventListener("DOMContentLoaded", function () {
  [].forEach.call(document.querySelectorAll('.tel'), function (input) {
    var keyCode;
    function mask(event) {
      event.keyCode && (keyCode = event.keyCode);
      var pos = this.selectionStart;
      if (pos < 3) event.preventDefault();
      var matrix = "+7 (___)-___-__-__",
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = this.value.replace(/\D/g, ""),
        new_value = matrix.replace(/[_\d]/g, function (a) {
          return i < val.length ? val.charAt(i++) || def.charAt(i) : a
        });
      i = new_value.indexOf("_");
      if (i != -1) {
        i < 5 && (i = 3);
        new_value = new_value.slice(0, i)
      }
      var reg = matrix.substr(0, this.value.length).replace(/_+/g,
        function (a) {
          return "\\d{1," + a.length + "}"
        }).replace(/[+()]/g, "\\$&");
      reg = new RegExp("^" + reg + "$");
      if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
      if (event.type == "blur" && this.value.length < 5) this.value = ""
    }
    input.addEventListener("input", mask, false);
    input.addEventListener("focus", mask, false);
    input.addEventListener("blur", mask, false);
    input.addEventListener("keydown", mask, false)
  });
});





/* for accordion */
let accordionFunction = function (itemName) {
  document.querySelectorAll(itemName).forEach(clickZone => {
    if (clickZone) {
      let accInfo = clickZone.nextElementSibling;
      let accPHeigth = clickZone.nextElementSibling.firstElementChild.getBoundingClientRect().height;
      let toggleAcc = function () {
        clickZone.classList.toggle('active');
        accInfo.classList.toggle('active');
        if (accInfo.classList.contains('active')) {
          accInfo.classList.add("active");
          accInfo.style.height = accPHeigth + "px";
        } else {
          accInfo.classList.remove("active");
          accInfo.style.height = 0 + "px";
        }
      }
      clickZone.addEventListener('click', function (e) {
        toggleAcc();
      });
      document.addEventListener('click', function (e) {
        let target = e.target;
        let its_clickZone = target == clickZone || clickZone.contains(target);
        let its_subMenu = target == accInfo || accInfo.contains(target);
        let clickZone_is_active = clickZone.classList.contains('active');
        if (!its_clickZone && !its_subMenu && clickZone_is_active) {
          toggleAcc();
        }
      });
    }
  })

};
window.addEventListener("load", function () {
  accordionFunction(".accordion__label");
  accordionFunction(".categories__more");
  if (document.documentElement.clientWidth < 992) {
    accordionFunction(".catalog__filters-title");
  }
})




/* Селекты */
let selectFunction = function (selectItem) {
  let selects = document.querySelectorAll(selectItem);
  if (selects.length > 0) {
    for (i = 0; i < selects.length; i++) {
      let select = selects[i]
      let selectHead = select.querySelector(".select__head");
      let selectInput = select.querySelector(".select__input");
      let selectHeadImg = select.querySelector(".select__img");
      let selectField = select.querySelector(".select__head-field");
      let selectList = select.querySelector(".select__list");

      selectField.innerHTML = selectList.firstElementChild.innerHTML;
      selectInput.value = selectList.firstElementChild.dataset.value;

      let setInputValueAndTriggerChangeEvent = function (newValue) {
        selectInput.value = newValue;
        const event = new Event('change', { bubbles: true });
        selectInput.dispatchEvent(event);
        //console.log('Значение изменилось на:', newValue);
      }
      if (selectHeadImg) {
        selectHeadImg.style.backgroundImage = selectList.firstElementChild.dataset.path;
      }
      selectHead.addEventListener("click", function () {
        selectHead.classList.toggle("active");
        selectList.classList.toggle("active");
      });
      selectList.childNodes.forEach(selectListItem => {
        selectListItem.addEventListener("click", function () {
          selectField.innerHTML = "";
          selectField.innerHTML = selectListItem.innerHTML;
          selectInput.value = "";
          setInputValueAndTriggerChangeEvent(selectListItem.dataset.value);
          if (selectHeadImg) {
            selectHeadImg.style.backgroundImage = selectListItem.dataset.path;
          }
          selectHead.classList.remove("active");
          selectList.classList.remove("active");
        })
      })
      document.addEventListener("click", function (e) {
        let target = e.target;
        let selectTarget = target == select || select.contains(target);
        if (!selectTarget) {
          selectHead.classList.remove("active");
          selectList.classList.remove("active");
        };
      });
      document.addEventListener("keydown", function (e) {
        if (e.key === "Tab" || e.key === "Escape") {
          selectField.blur();
          selectHead.classList.remove("active");
          selectList.classList.remove("active");
        }
      });
    };
  }
};
selectFunction(".select");




/* слайдер ideal */
let idealSlider = new Swiper(".ideal__slider", {
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  loop: true,
  navigation: {
    prevEl: ".ideal__slider-prev",
    nextEl: ".ideal__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    480: {
      spaceBetween: 20,
      slidesPerView: 1,
    },
    576: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    660: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    992: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    1120: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
    1290: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
  },
});




/* слайдер tabs btn */
const tabsBtnSlider = document.querySelectorAll('.tabs-nav__slider');
if (tabsBtnSlider.length > 0) {
  for (i = 0; i < tabsBtnSlider.length; i++) {
    tabsBtnSlider[i].classList.add('tabs-nav__slider-' + i);

    let tabsBtnSliderPrev = document.querySelectorAll(".tabs-nav__slider-prev");
    let tabsBtnSliderNext = document.querySelectorAll(".tabs-nav__slider-next");

    tabsBtnSliderPrev[i].classList.add('tabs-nav__slider-prev-' + i);
    tabsBtnSliderNext[i].classList.add('tabs-nav__slider-next-' + i);

    let tabsBtnMainSlider = new Swiper('.tabs-nav__slider-' + i, {
      navigation: {
        prevEl: tabsBtnSliderPrev[i],
        nextEl: tabsBtnSliderNext[i],
      },
      speed: 500,
      loop: true,
      breakpoints: {
        320: {
          spaceBetween: 16,
          slidesPerView: 1,
        },
        360: {
          spaceBetween: 15,
          slidesPerView: 1,
        },
        480: {
          spaceBetween: 16,
          slidesPerView: 2,
        },
        576: {
          spaceBetween: 16,
          slidesPerView: 2,
        },
        660: {
          spaceBetween: 16,
          slidesPerView: 3,
        },
        768: {
          spaceBetween: 16,
          slidesPerView: 3,
        },
        1120: {
          spaceBetween: 16,
          slidesPerView: 3,
        },
        1290: {
          spaceBetween: 16,
          slidesPerView: 3,
        },
      },
    });
  }
}




/* слайдер tabs */
const tabsSlider = document.querySelectorAll('.tabs__slider');
if (tabsSlider.length > 0) {
  for (i = 0; i < tabsSlider.length; i++) {
    tabsSlider[i].classList.add('tabs__slider-' + i);

    let tabsSliderPrev = document.querySelectorAll(".tabs__slider-prev");
    let tabsSliderNext = document.querySelectorAll(".tabs__slider-next");

    tabsSliderPrev[i].classList.add('tabs__slider-prev-' + i);
    tabsSliderNext[i].classList.add('tabs__slider-next-' + i);

    let tabsMainSlider = new Swiper('.tabs__slider-' + i, {
      navigation: {
        prevEl: tabsSliderPrev[i],
        nextEl: tabsSliderNext[i],
      },
      speed: 1000,
      loop: true,
      breakpoints: {
        320: {
          spaceBetween: 10,
          slidesPerView: 1,
        },
        4360: {
          spaceBetween: 20,
          slidesPerView: 1,
        },
        480: {
          spaceBetween: 20,
          slidesPerView: 1,
        },
        576: {
          spaceBetween: 20,
          slidesPerView: 2,
        },
        660: {
          spaceBetween: 20,
          slidesPerView: 2,
        },
        768: {
          spaceBetween: 20,
          slidesPerView: 2,
        },
        992: {
          spaceBetween: 20,
          slidesPerView: 3,
        },
        1120: {
          spaceBetween: 30,
          slidesPerView: 3,
        },
        1290: {
          spaceBetween: 30,
          slidesPerView: 3,
        },
      },
    });
  }
}



/* слайдер care */
let careSlider = new Swiper(".care__slider", {
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  loop: true,
  navigation: {
    prevEl: ".care__slider-prev",
    nextEl: ".care__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    480: {
      spaceBetween: 20,
      slidesPerView: 1,
    },
    576: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    660: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    992: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    1120: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
    1290: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
  },
});



/* слайдер materials */
let materialsSlider = new Swiper(".materials__slider", {
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  loop: true,
  navigation: {
    prevEl: ".materials__slider-prev",
    nextEl: ".materials__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 2,
    },
    480: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    576: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    660: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 4,
    },
    992: {
      spaceBetween: 20,
      slidesPerView: 5,
    },
    1120: {
      spaceBetween: 30,
      slidesPerView: 5,
    },
    1290: {
      spaceBetween: 30,
      slidesPerView: 5,
    },
  },
});



/* слайдер certificates */
let certificatesSlider = new Swiper(".certificates__slider", {
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  loop: true,
  navigation: {
    prevEl: ".certificates__slider-prev",
    nextEl: ".certificates__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 2,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 2,
    },
    480: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    576: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    660: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    992: {
      spaceBetween: 20,
      slidesPerView: 4,
    },
    1120: {
      spaceBetween: 30,
      slidesPerView: 4,
    },
    1290: {
      spaceBetween: 30,
      slidesPerView: 4,
    },
  },
});



/* слайдер customersvi */
let customersviSlider = new Swiper(".customersvi__slider", {
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  loop: true,
  navigation: {
    prevEl: ".customersvi__slider-prev",
    nextEl: ".customersvi__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    480: {
      spaceBetween: 20,
      slidesPerView: 1,
    },
    576: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    660: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    992: {
      spaceBetween: 20,
      slidesPerView: 3,
    },
    1120: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
    1290: {
      spaceBetween: 30,
      slidesPerView: 3,
    },
  },
});


/* слайдер customerste */
let customersteSlider = new Swiper(".customerste__slider", {
  speed: 1000,
  slidesPerView: 1,
  grabCursor: true,
  allowTouchMove: true,
  loop: true,
  autoHeight: true,
  navigation: {
    prevEl: ".customerste__slider-prev",
    nextEl: ".customerste__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
    },
    360: {
      spaceBetween: 10,
    },
    480: {
      spaceBetween: 20,
    },
    576: {
      spaceBetween: 20,
    },
    660: {
      spaceBetween: 20,
    },
    768: {
      spaceBetween: 20,
    },
    992: {
      spaceBetween: 20,
    },
    1120: {
      spaceBetween: 30,
    },
    1290: {
      spaceBetween: 30,
    },
  },
});




/* for map */
function init() {
  let myMap = new ymaps.Map('map', {
    center: [php_vars_add.lat, php_vars_add.lng],
    zoom: php_vars_add.zoom,
    controls: []
  }, {
    searchControlProvider: 'yandex#search'
  });
  myplacemark = new ymaps.GeoObject({
    geometry: {
      type: "Point",
      coordinates: [php_vars_add.lat, php_vars_add.lng]
    },
    properties: {
      hintContent: php_vars_add.marker
    }
  });
  myMap.behaviors.disable('scrollZoom');
  myMap.controls.add('zoomControl');
  myMap.controls.add('rulerControl', {
    scaleLine: false
  });
  // Добавим метку на карту.
  myMap.geoObjects.add(myplacemark);
}
let maps = document.querySelectorAll("#map");
if (maps.length > 0) {
  ymaps.ready(init);
}




/* слайдер stages */
const stagesSlider = new Swiper('.stages__slider', {
  speed: 10,
  allowTouchMove: false,
  loop: false,
  slidesPerView: 1,
  autoHeight: true,
  navigation: {
    prevEl: ".stages__slider-prev",
    nextEl: ".stages__slider-next",
  },
  on: {
    init: function () {
      createCustomPagination(this);
    },
    slideChange: function () {
      updatePagination(this);
    }
  }
});


function createCustomPagination(swiper) {
  const paginationContainer = document.querySelector('.swiper-pagination--stages');
  swiper.slides.forEach((slide, index) => {
    if (!slide.classList.contains('swiper-slide-duplicate')) { // Проверка на дубликаты
      const paginationItem = document.createElement('div');
      paginationItem.className = 'pagination-item';
      paginationItem.innerHTML = `
      <picture>${slide.querySelector('.pagination-image').innerHTML}</picture>
      <p><strong>${slide.querySelector('.pagination-name').textContent}</strong>${slide.querySelector('.pagination-subname').textContent}</p>  
      `;
      paginationItem.addEventListener('click', () => {
        swiper.slideTo(index);
      });
      paginationContainer.appendChild(paginationItem);
    }
  });
  updatePagination(swiper); // Обновляем пагинацию сразу же после создания
}

function updatePagination(swiper) {
  const paginationItems = document.querySelectorAll('.pagination-item');
  paginationItems.forEach((item, index) => {
    if (index === swiper.realIndex) {
      item.classList.add('active'); // Устанавливаем класс активного элемента
    } else {
      item.classList.remove('active'); // Убираем класс для неактивных
    }
  });
}



/* сдвоенные слайдера для карточки */

let thumbsSlider = new Swiper(".house-card__slider-thumbs", {
  speed: 1000,
  loop: false,
  grabCursor: true,
  allowTouchMove: true,
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 3,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 3,
    },
    480: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
    576: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
    660: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
    768: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
    992: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
    1120: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
    1290: {
      spaceBetween: 16,
      slidesPerView: 3,
    },
  },
});


let mainSlider = new Swiper(".house-card__slider-main", {
  thumbs: {
    swiper: thumbsSlider
  },
  allowTouchMove: false,
  speed: 1000,
  loop: false,
  slidesPerView: 1,
  navigation: {
    prevEl: ".house-card__slider-prev",
    nextEl: ".house-card__slider-next",
  },
  breakpoints: {
    320: {
      spaceBetween: 10,
    },
    360: {
      spaceBetween: 10,
    },
    480: {
      spaceBetween: 20,
    },
    576: {
      spaceBetween: 20,
    },
    660: {
      spaceBetween: 20,
    },
    768: {
      spaceBetween: 20,
    },
    992: {
      spaceBetween: 20,
    },
    1120: {
      spaceBetween: 20,
    },
    1290: {
      spaceBetween: 30,
    },
  },
});



/* многоточие */
let ellipsisFunction = function (item) {
  document.querySelectorAll(item).forEach(ellipsis => {
    ellipsis.innerHTML = "...........................................................................................................................................................................................................................................................................................................................................";
  })
}
window.addEventListener("load", function () {
  ellipsisFunction(".card-list li span")
})



/* слайдер customersvi */
let categoriesSlider = new Swiper(".categories__slider", {
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  //slideToClickedSlide: true,
  loop: true,
  navigation: {
    prevEl: ".categories__slider-prev",
    nextEl: ".categories__slider-next",
  },
  // on: {
  //   click: function () {
  //     categoriesSlider.slideToClickedSlide();
  //   }
  // },
  breakpoints: {
    320: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    360: {
      spaceBetween: 10,
      slidesPerView: 1,
    },
    480: {
      spaceBetween: 16,
      slidesPerView: 2,
    },
    576: {
      spaceBetween: 16,
      slidesPerView: 2,
    },
    660: {
      spaceBetween: 16,
      slidesPerView: 2,
    },
    768: {
      spaceBetween: 16,
      slidesPerView: 2,
    },
    992: {
      spaceBetween: 16,
      slidesPerView: 2.5,
    },
    1120: {
      spaceBetween: 16,
      slidesPerView: 2.5,
    },
    1290: {
      spaceBetween: 16,
      slidesPerView: 2.5,
    },
  },
});


/* перенос блока в другое место 
let transferFunction = function (itemName, itemPlace) {
  let sourceBlock = document.querySelector(itemName);
  if (sourceBlock) {
    let targetBlock = document.querySelector(itemPlace);
    if (targetBlock) {
      targetBlock.appendChild(sourceBlock);
    }
  }
}
window.addEventListener("DOMContentLoaded", function () {
  if (document.documentElement.clientWidth < 992) {
    transferFunction(".header__services", ".header-top__items");
  }
})
*/