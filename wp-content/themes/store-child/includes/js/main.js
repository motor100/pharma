document.addEventListener("DOMContentLoaded", () => {

  // To top кнопка вверх
  const toTop = document.getElementById("to-top");

  if (toTop) {

    const image = toTop.querySelector('.image');
    
    image.onclick = () => {
      scroll(0, 0);
    }

    // Показать to-top при скролле
    window.onscroll = () => {
      
      let scrToTop = window.scrollY || document.documentElement.scrollTop;

      if (scrToTop > 400) {
        toTop.classList.add('active');
      } else {
        toTop.classList.remove('active');
      }

    }

  }


  // AJAX загрузка товаров из подкатегорий (фильтр)
  const filterBtns = document.querySelectorAll('.filter-btn');

  filterBtns.forEach((item) => {
    item.onclick = function() {

      // удаление active у всех кнопок
      for (var i = 0; i < filterBtns.length; i++) {
        filterBtns[i].classList.remove('active');
      }

      // добавление active у текущей кнопки
      item.classList.add('active');

      // Отключение плагина Load more products
      // Со включенным плагином подгружаются другие товары кроме отфильтрованных
      the_lmp_js_data = '';

      const products = document.querySelector('ul.products');
      
      // лоадер. селекторы от плагина load more products
      products.innerHTML = '<span class="lmp_products_loading"><i class="fa fa-spinner lmp_rotate"></i></span>';    

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=get_subcat&subcat_id=' + item.dataset.termId,
      })
      // вставка в ul.products
      .then((response) => response.text())
      .then((html) => {
        // если пришел html, то вставляю, иначе "Товаров не найдено"
        products.innerHTML = (html ? html : '<div class="no-found-product-text">Товаров не найдено</div>');
      })
      .catch((error) => {
        console.log(error);
      })
    }
  });


  // AJAX получение специалистов по городу
  const cityBtns = document.querySelectorAll('.js-city-btn');

  cityBtns.forEach((item) => {
    item.onclick = function() {

      // удаление active у всех кнопок
      const citiesItems = document.querySelectorAll('.cities-item');
      for (var i = 0; i < citiesItems.length; i++) {
        citiesItems[i].classList.remove('active');
      }

      // добавление active у текущей кнопки
      item.classList.add('active');

      // удаление пагинации
      const pagination = document.querySelector('.specialisty-page .pagination');
      pagination.innerHTML = '';

      const specialists = document.querySelector('.specialisty-page .js-insert-specialists');
      
      // лоадер. селекторы от плагина load more products
      specialists.innerHTML = '<span class="lmp_products_loading"><i class="fa fa-spinner lmp_rotate"></i></span>';    

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=get_specialists&cat_id=' + item.dataset.termId,
      })
      // вставка в specialists
      .then((response) => response.text())
      .then((html) => {
        // если пришел html, то вставляю, иначе "Товаров не найдено"
        specialists.innerHTML = (html ? html : '<div class="no-specialists-text">Специалистов не найдено</div>');
      })
      .catch((error) => {
        console.log(error);
      })
    }
  });


  // Sticky top menu
  /*
  if (window.innerWidth >= 991) {

    // Get the header
    var header = document.getElementById("myHeader");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function setStickyMenu() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }

    // When the user scrolls the page, execute setStickyMenu function
    window.onscroll = function() {
      setStickyMenu();
    };

  }
  */

  // Swiper slider
  const mainSlider = document.querySelector('.main-slider')

  if (mainSlider) {
    const slider = new Swiper('.main-slider', {
      slidesPerView: 1,
      loop: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  }


  // Сatalog tabs. Home page and catalog page
  const catalogTabs = document.querySelectorAll('.catalog-tabs-button');

  if (catalogTabs) {
    const catalogTabsContent = document.querySelectorAll('.catalog-tabs-content');

    for (let i = 0; i < catalogTabs.length; i++) {
      catalogTabs[i].onclick = function() {
        for (let j = 0; j < catalogTabs.length; j++) {
          catalogTabs[j].classList.remove('active');
          catalogTabsContent[j].classList.remove('active');
        }
        catalogTabs[i].classList.add('active');
        catalogTabsContent[i].classList.add('active');
      }
    }
  }


  // Mobile menu
  const body = document.querySelector('body');
  const burgerMenuWrapper = document.querySelector('.burger-menu-wrapper');
  const mobileMenu = document.querySelector('.mobile-menu');

  function openMobileMenu() {
    body.classList.add('overflow-hidden');
    mobileMenu.classList.add('active');
    burgerMenuWrapper.classList.add('menu-is-open');
  }

  function closeMobileMenu() {
    body.classList.remove('overflow-hidden');
    burgerMenuWrapper.classList.remove('menu-is-open');
    mobileMenu.classList.remove('active');
  }

  burgerMenuWrapper.onclick = function() {
    if (burgerMenuWrapper.classList.contains('menu-is-open')) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  }

  const listParentClick = document.querySelectorAll('.mobile-menu li.menu-item a');

  for (let i=0; i < listParentClick.length; i++) {
    listParentClick[i].onclick = function (event) {
      event.preventDefault();
      closeMobileMenu();
      let hrefClick = this.href;
      setTimeout(function() {
        location.href = hrefClick
      }, 500);
    }
  }


  // Set cookie
  function setCookie(name, value, days) {
    let expires = "";
    if (days) {
      let date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/" + "; sameSite=Lax;";
  }

  function getCookie(name) {
    let matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
    return matches ? decodeURIComponent(matches[1]) : undefined;
  }

  function checkCookies() {
    let cookieNote = document.querySelector('#cookie_note');
    let cookieBtnAccept = cookieNote.querySelector('#cookie_accept');

    // Если куки we-use-cookie нет или она просрочена, то показываем уведомление
    if (!getCookie('we-use-cookie')) {
      cookieNote.classList.add('active');
    }

    // При клике на кнопку устанавливаем куку we-use-cookie на один год
    cookieBtnAccept.addEventListener('click', function () {
      setCookie('we-use-cookie', 'true', 365);
      cookieNote.classList.remove('active');
    });
  }

  checkCookies();


  // Замена селекторов при ширине более 1400px
  /*
  const ulProducts = document.querySelector('.single__prod ul.products');

  if (ulProducts) {

    /**
     * Функция замены селекторов
    */
  /*
    function replaceColumnClass() {
      const liProducts = ulProducts.querySelectorAll('li.product');

      if (window.innerWidth > 1400) {
        // Замена селектора columns-3 на columns-4
        if (ulProducts.classList.contains('columns-3')) {
          ulProducts.classList.replace('columns-3', 'columns-4');
        }

        // Удаление селектора last
        for (let i = 0; i < liProducts.length; i++) {
          liProducts[i].classList.remove('last');
          if (i % 4 == 3) {
            liProducts[i].classList.add('last');
          }
        }

      } else {
        // Замена селектора columns-4 на columns-3
        if (ulProducts.classList.contains('columns-4')) {
          ulProducts.classList.replace('columns-4', 'columns-3');
        }

        // Добавление селектора last
        for (let i = 0; i < liProducts.length; i++) {
          liProducts[i].classList.remove('last');
          if (i % 3 == 2) {
            liProducts[i].classList.add('last');
          }
        }
      }
    }

    replaceColumnClass();

    window.addEventListener('resize', replaceColumnClass);
  }
  */


  // Фильтр городов на странице Где купить
  const wherebuyPage = document.querySelector('.wherebuy-page');

  if (wherebuyPage) {
    const cityBtns = document.querySelectorAll('.js-city-btn');
    const aItems = document.querySelectorAll('.js-a-item');

    cityBtns.forEach((item) => {
      item.onclick = function() {

        // удаление active у всех кнопок
        const citiesItems = document.querySelectorAll('.cities-item');
        for (var i = 0; i < citiesItems.length; i++) {
          citiesItems[i].classList.remove('active');
        }

        // добавление active у текущей кнопки
        item.classList.add('active');

        item.classList.add('active');

        for (var i = 0; i < aItems.length; i++) {
          aItems[i].classList.remove('hidden');
          if (item.dataset.name !== aItems[i].dataset.name) {
            aItems[i].classList.add('hidden');
          }
        }
      }
    });
  }


  // Input phone mask
  function inputPhoneMask() {
    const elementPhone = document.querySelectorAll('.js-input-phone-mask');

    const maskOptionsPhone = {
      mask: '+{7} (000) 000 00 00'
    };

    elementPhone.forEach((item) => {
      const mask = IMask(item, maskOptionsPhone);
    });
  }

  inputPhoneMask();


  // AJAX отправка формы Записаться на консультацию на странице специалиста
  const lfsForm = document.getElementById('lfs-form');
  const lfsSubmitBtn = document.getElementById('lfs-submit-btn');

  function ajaxCallback(form) {

    let arr = [];

    const inputName = form.querySelector('.js-required-name');
    if (inputName.value.length < 3 || inputName.value.length > 20) {
      inputName.classList.add('required');
      arr.push(false);
    } else {
      inputName.classList.remove('required');
    }

    const inputSurname = form.querySelector('.js-required-surname');
    if (inputSurname.value.length < 3 || inputSurname.value.length > 20) {
      inputSurname.classList.add('required');
      arr.push(false);
    } else {
      inputSurname.classList.remove('required');
    }

    const inputPhone = form.querySelector('.js-required-phone');
    if (inputPhone.value.length != 18) {
      inputPhone.classList.add('required');
      arr.push(false);
    } else {
      inputPhone.classList.remove('required');
    }

    const inputEmail = form.querySelector('.js-required-email');
    if (inputEmail.value.length < 3 || inputEmail.value.length > 30) {
      inputEmail.classList.add('required');
      arr.push(false);
    } else {
      inputEmail.classList.remove('required');
    }

    const inputCheckbox = form.querySelector('.js-required-checkbox');
    if (!inputCheckbox.checked) {
      arr.push(false);
    }

    if (arr.length == 0) {

      fetch('/wp-content/themes/store-child/phpmailer/mailer.php', {
        method: 'POST',
        cache: 'no-cache',
        body: new FormData(form)
      })
      .catch((error) => {
        console.log(error);
      })

      alert("Спасибо. Мы свяжемся с вами.");

      form.reset();

    }

    return false;
  }

  if (lfsSubmitBtn) {
    lfsSubmitBtn.onclick = function() {
      ajaxCallback(lfsForm);
    }
  }

});