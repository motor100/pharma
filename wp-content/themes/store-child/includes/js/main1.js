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


  // AJAX фильтр товаров из подкатегорий на странице категории. На всех категориях кроме term-id=18 (Гомеопатические монопрепараты)
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


  // AJAX обновление количество товара у значка корзины в хэдере и нижнем мобильном меню
  jQuery(document).ready(function($) {
    /**
     * jquery событие 'added_to_cart' в контексте woocommerce
     * Все события в /wp-content/plugins/woocommerce/assets/js/frontend
     * Vanilla javascript нет этого события
     * Если добавить событие click на кнопку добавления в корзину, то оно сработает раньше. В корзине будут прошлые значения
     */ 
    $(document.body).on('added_to_cart', function(){

      fetch(Myscrt.ajaxurl, {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        cache: 'no-cache',
        body: 'action=set_cart_counters',
      })
      .then((response) => response.json())
      .then((json) => {
        const headerCartCounter = document.querySelector('.header-cart__counter .number'); // счетчик товаров для значка корзины в хэдере
        const headerCartTotal = document.querySelector('.header-cart__total .number'); // стоимость товаров для значка корзины в хэдере
        const fixedBottomMenu = document.querySelector('.fixed-bottom-menu .badge-counter'); // счетчик товаров для значка корзины в нижнем меню
        headerCartCounter.innerText = json.count;
        headerCartTotal.innerText = json.total;
        fixedBottomMenu.innerText = json.count
      })
      .catch((error) => {
        console.log(error);
      })

    });
  });


  // AJAX catalog tabs. Переключение вкладок на главной странице, странице каталог и странице магазина
  const catalogTabsButons = document.querySelectorAll('.catalog-tabs-button');

  if (catalogTabsButons) {
    const catalogTabsContent = document.querySelectorAll('.catalog-tabs-content');

    for (let i = 0; i < catalogTabsButons.length; i++) {
      catalogTabsButons[i].onclick = function() {
        for (let j = 0; j < catalogTabsButons.length; j++) {
          catalogTabsButons[j].classList.remove('active');
          catalogTabsContent[j].classList.remove('active');
        }
        catalogTabsButons[i].classList.add('active');
        catalogTabsContent[i].classList.add('active');

        const catWrapper = catalogTabsContent[i].querySelector('.cat-wrapper');

        // Если catWrapper.innerText пустая строка, то вставляю
        console.log(catWrapper.innerText);
        if (catWrapper.innerText == '') {

          // Лоадер. селекторы от плагина load more products
          catWrapper.innerHTML += '<span class="lmp_products_loading"><i class="fa fa-spinner lmp_rotate"></i></span>';

          fetch(Myscrt.ajaxurl, {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            cache: 'no-cache',
            body: 'action=select_catalog_tabs&id=' + catalogTabsButons[i].dataset.id,
          })
          .then((response) => response.text())
          .then((html) => {
            // если пришел html, то вставляю, иначе "Не найдено"
            catWrapper.innerHTML = (html ? html : '<div class="no-found-product-text">Не найдено</div>');
          })
          .catch((error) => {
            console.log(error);
          })
        }
      }
    }
  }


  // AJAX фильтр товаров в категории Гомеопатические монопрепараты term-id=18
  const filteredButtons = document.querySelectorAll('.js-filtered-button');

  filteredButtons.forEach((item) => {
    item.onclick = function() {

      // удаление active у всех кнопок
      for (var i = 0; i < filteredButtons.length; i++) {
        filteredButtons[i].classList.remove('active');
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
        body: 'action=get_products_term18&letter=' + item.value,
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




  // Окна
  const modalWindows = document.querySelectorAll('.modal-window');
  const callbackFormBtns = document.querySelectorAll('.callback-form-btn');
  const callbackModal = document.querySelector('#callback-modal');
  // const callbackBtns = document.querySelectorAll('.js-callback-btn');
  // const callbackModal = document.querySelector('#callback-modal');
  // const testimonialsBtn = document.querySelector('.testimonials-btn');
  // const testimonialsModal = document.querySelector('#testimonials-modal');
  const modalCloseBtns = document.querySelectorAll('.modal-window .modal-close');

  callbackFormBtns.forEach((item) => {
    item.onclick = function () {
      modalWindowOpen(callbackModal);
    }
  });
  
  /*
  callbackBtns.forEach((item) => {
    item.onclick = function () {
      modalWindowOpen(callbackModal);
    }
  });

  if (testimonialsBtn) {
    testimonialsBtn.onclick = function () {
      modalWindowOpen(testimonialsModal);
    }
  }
  */
  
  function modalWindowOpen(win) {
    // Закрытие мобильного меню
    // closeAllMobileMenu();

    // Открытие окна
    body.classList.add('overflow-hidden');
    win.classList.add('active');
    setTimeout(function(){
      win.childNodes[1].classList.add('active');
    }, 200);
  }

  for (let i=0; i < modalCloseBtns.length; i++) {
    modalCloseBtns[i].onclick = function() {
      modalWindowClose(modalWindows[i]);
    }
  }

  for (let i = 0; i < modalWindows.length; i++) {
    modalWindows[i].onclick = function(event) {
      let classList = event.target.classList;
      for (let j = 0; j < classList.length; j++) {
        if (classList[j] == "modal" || classList[j] == "modal-wrapper" || classList[j] == "modal-window") {
          modalWindowClose(modalWindows[i])
        }
      }
    }
  }

  function modalWindowClose(win) {
    body.classList.remove('overflow-hidden');
    win.childNodes[1].classList.remove('active');
    setTimeout(() => {
      win.classList.remove('active');
    }, 300);
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
  const callbackForm = document.getElementById('callback-modal-form');
  const callbackSubmitBtn = document.getElementById('callback-modal-btn');

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

  if (callbackSubmitBtn) {
    callbackSubmitBtn.onclick = function() {
      ajaxCallback(callbackForm);
    }
  }

});