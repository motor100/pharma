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


  // Sticky top menu
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


  // Mobile menu
  // mobile menu
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

  /*
  burgerMenuWrapper.onclick = function() {
    if (burgerMenuWrapper.classList.contains('menu-is-open')) {
      closeMobileMenu();
    } else {
      openMobileMenu();
    }
  }
  */

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
  const ulProducts = document.querySelector('.single__prod ul.products');

  if (ulProducts) {

    /**
     * Функция замены селекторов
    */
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

});