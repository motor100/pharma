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
        // если пришел html, то вставляю
        if (html) {
          products.innerHTML = html;
        }
      })
      .catch((error) => {
        console.log(error);
      })
    }
  });

});