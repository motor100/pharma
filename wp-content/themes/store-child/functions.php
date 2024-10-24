<?php

/**
 * Storefront automatically loads the core CSS even if using a child theme as it is more efficient
 * than @importing it in the child theme style.css file.
 *
 * Uncomment the line below if you'd like to disable the Storefront Core CSS.
 *
 * If you don't plan to dequeue the Storefront Core CSS you can remove the subsequent line and as well
 * as the sf_child_theme_dequeue_style() function declaration.
 */
add_action( 'wp_enqueue_scripts', 'sf_child_theme_dequeue_style', 999 );

/**
 * Dequeue the Storefront Parent theme core CSS
 */
function sf_child_theme_dequeue_style() {
    wp_dequeue_style( 'storefront-style' );
    wp_dequeue_style( 'storefront-woocommerce-style' );
}

/**
 * Note: DO NOT! alter or remove the code above this text and only add your custom PHP functions below this text.
 */

add_action( 'wp_enqueue_scripts', 'my_dequeue_style', 99 );

function my_dequeue_style(){
    wp_dequeue_style( 'storefront-child-style' ); // отключение файла /store-child/style.css
}


// Добавление версии в css и js
/*
* $temp_debug = true добавляется версия на основе даты и времени
* $temp_debug = false добавляется версия wp
*/

$temp_debug = false;
$ver = '';
if ($temp_debug) {
  $ver = date('dis');
}


// Scripts
add_action( 'wp_enqueue_scripts', 'artabr_script' );

function artabr_script() {
    global $ver;
    // wp_enqueue_script( 'jquery-ui', get_stylesheet_directory_uri() . '/includes/js/jquery-ui.min.js' );
	// wp_enqueue_script( 'fancy', get_stylesheet_directory_uri() . '/includes/js/fancy.js' );
    wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/includes/js/app.min.js' );

    $cat = get_queried_object();
    if ( $cat->term_id == 18 ) {
        wp_enqueue_script( 'isotope', get_stylesheet_directory_uri() . '/includes/js/isotope.js' );
    	wp_enqueue_script( 'iso', get_stylesheet_directory_uri() . '/includes/js/iso.js' );
    }

    if ( is_front_page() ) {
        wp_enqueue_script( 'swiper', get_stylesheet_directory_uri() . '/includes/js/swiper-bundle.min.js' );
    }
    wp_enqueue_script( 'imask', get_stylesheet_directory_uri() . '/includes/js/imask.min.js' );
    wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/includes/js/main.js','',$ver);

    // включение файла admin-ajax.php для front
    wp_localize_script('main', 'Myscrt', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

// Styles
add_action('wp_print_styles', 'add_styles');

function add_styles() {
    global $ver;
    wp_enqueue_style( 'bootstrap-grid', get_stylesheet_directory_uri() . '/includes/css/bootstrap-grid.min.css' );
    if ( is_front_page() ) {
        wp_enqueue_style( 'swiper', get_stylesheet_directory_uri() . '/includes/css/swiper-bundle.min.css' );
    }
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/includes/css/style.css','',$ver );
}


//Каталог продукции
function render_parents_catalog() {
  $taxonomy     = 'product_cat';
  $orderby      = 'ID';
  $show_count   = 0;
  $pad_counts   = 0;
  $hierarchical = 1;
  $title        = '';
  $empty        = 0;
  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'exclude'      => '15',
    'hide_empty'   => $empty
  );
  $all_categories = get_categories( $args );
  foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) { ?>
      <div class="tax__item term-<?php echo $cat->term_id; ?>">
        <div class="catalog__item">
          <?php
          $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
          $image = wp_get_attachment_url( $thumbnail_id );
          ?>
			<div class="item__image">
				<a href="<?php echo get_term_link($cat->term_id); ?>">
					<img src="<?php echo $image ?>" alt="catImage">
				</a>
			</div>
			<div class="item__info">
				<div class="item__border">
					<a href="<?php echo get_term_link($cat->term_id); ?>" class="item__title"><?php echo $cat->name; ?></a>
				</div>
			</div>
        </div>
      </div>
    <?php }
  }
}

//Каталог подкатегорий
function render_catalog() {
  $taxonomy     = 'product_cat';
  $orderby      = 'ID';
  $show_count   = 0;
  $pad_counts   = 0;
  $hierarchical = 1;
  $title        = '';
  $empty        = 0;
  $args = array(
    'taxonomy'     => $taxonomy,
    'orderby'      => $orderby,
    'show_count'   => $show_count,
    'pad_counts'   => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li'     => $title,
    'exclude'      => '15',
    'hide_empty'   => $empty
  );
  $all_categories = get_categories( $args );
    
  foreach ($all_categories as $cat) {
    if($cat->category_parent == 0) {
      $category_id = $cat->term_id;
      
      $args2 = array(
        'taxonomy'     => $taxonomy,
        'child_of'     => 0,
        'parent'       => $category_id,
        'order'      => 'DESC',
        'orderby'      => 'ID',
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'hide_empty'   => $empty
      );
      $sub_cats = get_categories( $args2 );
      if($sub_cats) {
        foreach($sub_cats as $sub_category) { ?>
          <?php
          $thumbnail_id = get_term_meta($sub_category->term_id, 'thumbnail_id', true);
          $image = wp_get_attachment_url($thumbnail_id);
          ?>
            <div class="children__item">
                <div class="children__image">
                    <a href="<?php echo get_term_link($sub_category); ?>">
                        <img src="<?php echo $image ?>" alt="catImage">
                    </a>
                </div>
                <a class="children__title" href="<?php echo get_term_link($sub_category); ?>"><?php echo $sub_category->name; ?></a>
            </div>

        <?php }
      }
    }
  }
}

//Каталог продукции r.kolobaev
function render__catalog($id_gr) {
    $taxonomy     = 'product_cat';
    $orderby      = 'ID';
    $show_count   = 0;
    $pad_counts   = 0;
    $hierarchical = 1;
    $title        = '';
    $empty        = 0;
    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'parent'       => $id_gr,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        'title_li'     => $title,
        'exclude'      => '15',
        'hide_empty'   => $empty
    );
    $all_categories = get_categories( $args );
    foreach ($all_categories as $cat) {
        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
        if ($id_gr == '96') {
            $css_w = 'w110px';
        } else {
            $css_w = 'img';
        }
        $image = wp_get_attachment_url( $thumbnail_id );
    	echo '<div class="children__item">';
        echo '<div class="children__image">';
        echo '<a href="' . get_term_link($cat->term_id) . '">';
        echo '<img class="' . $css_w . '" src="' . $image . '" alt="' . $cat->name . '">';
        echo '</a>';
        echo '</div>';
        echo '<a class="children__title" href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a>';
        echo '</div>';
    }
}

// обертка для категорий
/*
add_action('woocommerce_before_main_content', 'add_wrapper_to_product', 30);
add_action('woocommerce_after_main_content', 'add_close_wrapper_to_product', 20);

function add_wrapper_to_product() {

}
function add_close_wrapper_to_product() {

}
*/


// откл сортировку
add_action( 'wp', 'bbloomer_remove_default_sorting_storefront' );

function bbloomer_remove_default_sorting_storefront() {
  remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
}

/**
 *
 * Register a shortcode that creates a product categories dropdown list
 *
 * Use: [product_categories_dropdown orderby="title" count="0" hierarchical="0"]
 */
add_shortcode( 'product_categories_dropdown', 'woo_product_categories_dropdown' );
function woo_product_categories_dropdown( $atts ) {
  // Attributes
  $atts = shortcode_atts( array(
    'hierarchical' => '1', // or '1'
    'hide_empty'   => '0', // or '1'
    'show_count'   => '0', // or '1'
    'depth'        => '0', // or Any integer number to define depth
    'orderby'      => 'order', // or 'name'
    'exclude'      => '15',
  ), $atts, 'product_categories_dropdown' );

  ob_start();

  wc_product_dropdown_categories( apply_filters( 'woocommerce_product_categories_shortcode_dropdown_args', array(
    'depth'              => $atts['depth'],
    'hierarchical'       => $atts['hierarchical'],
    'hide_empty'         => $atts['hide_empty'],
    'orderby'            => $atts['orderby'],
    'show_uncategorized' => 0,
    'show_count'         => $atts['show_count'],
    'exclude'         => $atts['exclude'],
  ) ) );

  ?>
    <script>
        jQuery(function($){
            var product_cat_dropdown = $(".dropdown_product_cat");
            function onProductCatChange() {
                if ( product_cat_dropdown.val() !=='' ) {
                    location.href = "<?php echo esc_url( home_url() ); ?>/?product_cat=" +product_cat_dropdown.val();
                }
            }
            product_cat_dropdown.change( onProductCatChange );
        });
    </script>
  <?php

  return ob_get_clean();
}

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['postcode']['placeholder'] = 'Почтовый индекс';
	$address_fields['city']['placeholder'] = 'Город';
	$address_fields['state']['placeholder'] = 'Область/Регион';
    return $address_fields;
}

add_filter('category_link', function($a){
	return str_replace( 'category/', '', $a );
}, 99 );

add_filter( 'the_excerpt', 'filter_the_excerpt', 10, 2 );
    function filter_the_excerpt( ) {
    return ' ';
 }
 
add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment');

function header_add_to_cart_fragment( $fragments ) {
    global $woocommerce;
    ob_start();
    ?>
    <span class="basket-btn__counter">(<?php echo sprintf($woocommerce->cart->cart_contents_count); ?>)</span>
    <?php
    $fragments['.basket-btn__counter'] = ob_get_clean();
    return $fragments;
}

add_filter( 'woocommerce_product_tabs', 'rk_remove_product_tabs', 25 );
 
function rk_remove_product_tabs( $tabs ) {
 
	unset( $tabs[ 'reviews' ] ); // вкладка Отзывы
	unset( $tabs[ 'additional_information' ] ); // вкладка Детали
 
	return $tabs;
}

add_filter( 'woocommerce_product_tabs', 'ql_reorder_product_tabs', 98 );

function ql_reorder_product_tabs( $tabs ) {
    $tabs['description']['priority'] = 0; // Description first
    return $tabs;
}


add_filter('woocommerce_product_tabs', 'rk_new_product_tab', 1);
function rk_new_product_tab( $tabs ) {
	if ( get_field('sostavnoj_tovar') ) {
		$tabs['sostav_tab'] = array(
			'title' =>  'Состав комплекса',
			'priority' => 1,
			'callback' => 'rk_new_tab_content',
			'content' => get_field('sostav_kompleksa'),
		);
	} else unset( $tabs['sostav_tab'] );
	return $tabs;
}
function rk_new_tab_content($tab_name, $tab) {
        echo $tab['content'];
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_2', 2);
function rk_new_product_tab_2( $tabs ) {
	if ( get_field('sostavnoj_tovar') ) {
		$tabs['pokazakia_tab'] = array(
			'title' =>  'Показания и противопоказания',
			'priority' => 2,
			'callback' => 'rk_new_tab_content_2',
			'content' => get_field('pokazaniya_i_protivopokazaniya'),
		);
	} else unset( $tabs['pokazakia_tab'] );
	return $tabs;
}
function rk_new_tab_content_2($tab_name, $tab) {
        echo $tab['content'];
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_4', 4);
function rk_new_product_tab_4( $tabs ) {
	if ( get_field('sostavnoj_tovar') ) {
		$tabs['fiz_tab'] = array(
			'title' =>  'Физиология и психосоматика',
			'priority' => 4,
			'callback' => 'rk_new_tab_content_4',
			'content' => get_field('fiziologiya_i_psihosomatika'),
		);
	} else unset( $tabs['fiz_tab'] );
	return $tabs;
}
function rk_new_tab_content_4($tab_name, $tab) {
        echo $tab['content'];
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_5', 5);
function rk_new_product_tab_5( $tabs ) {
	$tabs[ 'doz_tab' ] = array(
		'title' 	=> 'Дозирование',
		'priority' 	=> 5,
		'callback' 	=> 'rk_new_tab_content_5'
	);
	return $tabs;
}
function rk_new_tab_content_5() {
	if(get_field('dozirovanie')) { 
		echo '<div class="">';
		the_field('dozirovanie');
		echo '</div>';
	}
}

add_filter('woocommerce_product_tabs', 'rk_new_product_tab_6', 6);
function rk_new_product_tab_6( $tabs ) {
	if ( !get_field('sostavnoj_tovar') ) {
		$tabs['pok_tab'] = array(
			'title' =>  'Показания',
			'priority' => 4,
			'callback' => 'rk_new_tab_content_6',
			'content' => get_field('pokazaniya'),
		);
	} else unset( $tabs['pok_tab'] );
	return $tabs;
}
function rk_new_tab_content_6($tab_name, $tab) {
        echo $tab['content'];
}

add_action( 'woocommerce_before_quantity_input_field', 'truemisha_quantity_plus', 25 );
add_action( 'woocommerce_after_quantity_input_field', 'truemisha_quantity_minus', 25 );


 
function truemisha_quantity_plus() {
	echo '<button type="button" class="minus">-</button>';
	
}
 
function truemisha_quantity_minus() {
	echo '<button type="button" class="plus">+</button>';
}

add_action( 'wp_footer', 'my_quantity_plus_minus' );


function my_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
   ?>
      <script>
 
      jQuery( function( $ ) {   
 
         $(document).on( 'click', 'button.plus, button.minus', function() {
 
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max ).change();
            } else {
               qty.val( val + step ).change();
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min ).change();
            } else if ( val > 1 ) {
               qty.val( val - step ).change();
            }
         }
       });
 });
       </script>
   <?php
}


/*
// Функция для удаления пустых табов в карточке товара WooCommerce
function remove_empty_product_tabs( $tabs ) {
    foreach ( $tabs as $key => $tab ) {
        ob_start();
        if ( isset( $tab['callback'] ) ) {
            call_user_func( $tab['callback'], $key, $tab );
        }
        $content = ob_get_clean();
        if ( empty( trim( $content ) ) ) {
            unset( $tabs[ $key ] );
        }
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'remove_empty_product_tabs', 98 );
*/


add_shortcode( 'products_dropdown', 'wc_products_from_cat_dropdown' );
function wc_products_from_cat_dropdown( $atts ) {
        // Shortcode Attributes
        $atts = shortcode_atts( array(
            'product_id' => '', 
        ), $atts, 'products_dropdown' );
        
    $product_id = is_product() ? get_the_id() : $atts['product_id'];
    
    if ( empty($product_id) )
        return;

    ob_start();

    $query = new WP_Query( array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
        'post__not_in'     => array( $product_id ),
        'tax_query' => array( array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => wp_get_post_terms( $product_id, 'product_cat', array( 'fields' => 'ids' ) ) ,
        ) ),
    ) );

    if ( $query->have_posts() ) :

        echo '<div class="products-dropdown"><select name="products-select" id="products-select">
        <option value="">'.__('Choose a related product').'</option>';

        while ( $query->have_posts() ) : $query->the_post();

            echo '<option value="'.get_permalink().'">'.get_the_title().'</option>';

        endwhile;

        echo '</select> <button type="button" style="padding:2px 10px; margin-left:10px;">'._("Go").'</button></div>';

        wp_reset_postdata();

    endif;

    ?>
    <script>
        jQuery(function($){
            var a = '.products-dropdown', b = a+' button', c = a+' select', s = '';
            $(c).change(function(){
                s = $(this).val();
            });
             $(b).click(function(){
                if( s != '' ) location.href = s;
            });

        });
    </script>
    <?php

    return ob_get_clean();
}

add_filter('gettext', 'change_relatedproducts_text', 10, 3);

function change_relatedproducts_text($new_text, $related_text, $source)
{
     if ($related_text === 'Related products' && $source === 'woocommerce') {
         $new_text = esc_html__('Дополнительные препараты', $source);
     }
     return $new_text;
}


// AJAX получить товары из подкатегории на странице Соли Щюсслера
add_action( 'wp_ajax_get_subcat', 'get_subcat_products' ); // хук wp_ajax
add_action( 'wp_ajax_nopriv_get_subcat', 'get_subcat_products' ); // хук wp_ajax для незалогиненных пользователей

function get_subcat_products() {

    // Получение id подкатегории из запроса
    $subcat_id = ! empty( $_POST['subcat_id'] ) ? esc_attr( $_POST['subcat_id'] ) : false;

    // Получение подкатегории
    $subcat = get_term_by( 'id', $subcat_id, 'product_cat' );

    // Если нет подкатегории, то return false
    if ( ! $subcat ) {
        return false;
    }

    // Запрос
    $query = new WP_Query( array (
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
        'tax_query' => array( array (
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $subcat_id,
        ) ),
    ) );

    // Вывод записей
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            // Подключение шаблона product loop
            require ( get_stylesheet_directory() . '/woocommerce/content-product.php' );
        }

        wp_reset_postdata();

    }
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


// AJAX получить специалистов по городу на странице Специалисты
add_action( 'wp_ajax_get_specialists', 'get_specialists_from_city' ); // хук wp_ajax
add_action( 'wp_ajax_nopriv_get_specialists', 'get_specialists_from_city' ); // хук wp_ajax для незалогиненных пользователей

function get_specialists_from_city() {
    
    // Получение id подкатегории из запроса
    $cat_id = ! empty( $_POST['cat_id'] ) ? esc_attr( $_POST['cat_id'] ) : false;
    
    // Получение подкатегории
    $cat = get_term_by( 'id', $cat_id, 'category' );

    // Если нет категории, то return false
    if ( ! $cat ) {
        return false;
    }

    // Запрос
    $query = new WP_Query( array (
        'cat' => $cat_id,
        'post_status'    => 'publish',
        'nopaging' => true,
        'posts_per_page' => '-1',
    ) );

    // Вывод записей
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            // Подключение шаблона content-specialists
            require ( get_stylesheet_directory() . '/templates/content-specialists.php' );
        }

        wp_reset_postdata();

    }
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


// AJAX обновление количество товара у значка корзины в хэдере и нижнем мобильном меню
add_action( 'wp_ajax_set_cart_counters', 'set_counters' ); // хук wp_ajax
add_action( 'wp_ajax_nopriv_set_cart_counters', 'set_counters' ); // хук wp_ajax для незалогиненных пользователей

function set_counters() {

    echo json_encode([
        'count' => WC()->cart->get_cart_contents_count(),
        'total' => WC()->cart->get_cart_contents_total()
    ]);
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


// AJAX Переключение вкладок на главной странице, странице каталог и странице магазина
add_action( 'wp_ajax_select_catalog_tabs', 'catalog_tabs' );
add_action( 'wp_ajax_nopriv_select_catalog_tabs', 'catalog_tabs' );

function catalog_tabs() {
    // Получение id вкладки (табов)
    $id = ! empty( $_POST['id'] ) ? esc_attr( $_POST['id'] ) : false;

    switch ($id) {
        case 2:
            echo render__catalog('96');
            break;
        case 3:
            require ( get_stylesheet_directory() . '/templates/content-selection.php' );
            break;
        case 4:
            require ( get_stylesheet_directory() . '/templates/content-vebinary.php' );
            break;
    }

    wp_die();
}


// AJAX фильтр товаров в категории Гомеопатические монопрепараты term-id=18
add_action( 'wp_ajax_get_products_term18', 'get_term18_products' );
add_action( 'wp_ajax_nopriv_get_products_term18', 'get_term18_products' );

function get_term18_products() {

    // Получение letter из запроса
    $letter = ! empty( $_POST['letter'] ) ? esc_attr( $_POST['letter'] ) : false;

    // Если нет letter, то return false
    if ( ! $letter ) {
        return false;
    }

    // Запрос
    $query = new WP_Query( array (
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => '-1',
        'tax_query' => array( array (
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => 18,
        ) ),
    ) );

    // Вывод записей
    if ( $query->have_posts() ) {

        while ( $query->have_posts() ) {
            $query->the_post();

            // Получение первой буквы названия товара
            $title = get_the_title();
            $first_letter = mb_strtolower(mb_substr($title, 0, 1));

            // Вывод товаров у которых первая буква названия как буква из запроса
            if ($first_letter == $letter) {
                // Подключение шаблона product loop
                require ( get_stylesheet_directory() . '/woocommerce/content-product.php' );
            }
        }

        wp_reset_postdata();

    }
    
    wp_die(); // выход нужен для того, чтобы в ответе не было ничего лишнего (0), только то что возвращает функция
}


// Вывод кастомного нижнего меню. Разделение на части
function custom_nav_menu($start = 0, $end = NULL) {

  $menu_name = 'secondary'; // поставить галочку Дополнительное меню для footer_menu
  $locations = get_nav_menu_locations();

  if( $locations && isset( $locations[ $menu_name ] ) ) {

    // получаю элементы меню
    $menu_items = wp_get_nav_menu_items( $locations[ $menu_name ] );

    // создаю список
    $menu_list = '<ul class="menu">';

    if (!$end) {
      $end = count($menu_items);
    }

    foreach ( $menu_items as $key => $menu_item ){
      
      if ($key >= $start && $key <= $end) {
        $menu_list .= '<li class="menu-item"><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
      }
    }

    $menu_list .= '</ul>';
    
  } else {
    $menu_list = '<p>Меню "' . $menu_name . '" не определено.</p>';
  }
  
  return $menu_list;
}


// Удалить атрибут type у scripts
add_filter('script_loader_tag', 'clean_script_tag');
function clean_script_tag($src) {
  return str_replace("type='text/javascript'", '', $src);
}

// Удалить атрибут type у style
add_filter('style_loader_tag', 'clean_css_tag', 10, 2);
function clean_css_tag($tag, $handle) {
  return preg_replace( "/type=['\"]text\/(css)['\"]/", '', $tag );
}

// Disable the emoji's
function disable_emojis() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );

function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
  if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
    $urls = array_diff( $urls, array( $emoji_svg_url ) );
  }
  return $urls;
}


// Замена символа рубля на букву Р
function woocommerce_change_rub_symbol( $valyuta_symbol, $valyuta_code ) {
    if( $valyuta_code === 'RUB' ) {
        return 'Р';
    }
    return $valyuta_symbol;
}
add_filter('woocommerce_currency_symbol', 'woocommerce_change_rub_symbol', 9999, 2);


// Ограничение количества выводимых символов в тексте на странице специалисты
function the_excerpt_max_charlength( $charlength ){
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        } else {
            echo $subex;
        }
        echo '...';
    } else {
        echo $excerpt;
    }
}


// Override theme default specification for product # per row
// function loop_columns() {
//    return 4; // 5 products per row
//  }
// add_filter('loop_shop_columns', 'loop_columns', 999);

// add_action( 'woocommerce_before_single_product_summary', 'wpbl_favourite_hook', 15);
// function wpbl_favourite_hook(){
//     echo '<span class="wpbl_favourite">555</span>';
// } 


// Второе событие отвечает за отображение товара
// add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );


/*
* Disable pagination
* Priority=11 to go after the Storefront's hook.
*/
// add_filter( 'theme_mod_storefront_product_pagination', '__return_false', 11 );


// Регистрация нового типа поста home_page_slider для слайдера на главной странице
add_action( 'init', 'slider_register_cpt' );

function slider_register_cpt() {
    $args = array(
        'labels' => array(
            'menu_name' => 'Слайдер'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-airplane',
        'publicly_queryable' => false,
        'supports' => ['title', 'thumbnail', 'custom-fields'],
    );
    register_post_type( 'home_page_slider', $args );
}


// Добавление метабокса product_link на кастомный тип постов home_page_slider
add_action( 'add_meta_boxes', 'home_page_slider_add_metabox' );
 
function home_page_slider_add_metabox() {
    add_meta_box(
        'product_link', // ID нашего метабокса
        'Ссылка на препараты', // заголовок
        'home_page_slider_metabox_callback', // функция, которая будет выводить поля в мета боксе
        'home_page_slider', // типы постов, для которых его подключим
        'normal', // расположение (normal, side, advanced)
        'default' // приоритет (default, low, high, core)
    );
}
 
function home_page_slider_metabox_callback( $post ) {
    // сначала получаем значения этих полей
    // ссылка на товар
    $product_link = get_post_meta( $post->ID, 'product_link', true );
 
    // одноразовые числа, кстати тут нет супер-большой необходимости их использовать
    wp_nonce_field( 'seopostsettingsupdate-' . $post->ID, '_truenonce' );
 
    echo '<table class="form-table">
        <tbody>
            <tr>
                <th><label for="seo_title">Ссылка</label></th>
                <td><input type="text" id="product_link" name="product_link" value="' . esc_attr( $product_link ) . '" class="regular-text"></td>
            </tr>
        </tbody>
    </table>';
}

add_action( 'save_post', 'home_page_slider_save_metabox', 10, 2 );
 
function home_page_slider_save_metabox( $post_id, $post ) {
 
    // проверка одноразовых полей
    if ( ! isset( $_POST[ '_truenonce' ] ) || ! wp_verify_nonce( $_POST[ '_truenonce' ], 'seopostsettingsupdate-' . $post->ID ) ) {
        return $post_id;
    }
 
    // проверяем, может ли текущий юзер редактировать пост
    $post_type = get_post_type_object( $post->post_type );
 
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }
 
    // ничего не делаем для автосохранений
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return $post_id;
    }
 
    // проверяем тип записи
    if( 'home_page_slider' !== $post->post_type ) {
        return $post_id;
    }
 
    if( isset( $_POST[ 'product_link' ] ) ) {

        // Создание относительной ссылки
        $link = $_POST[ 'product_link' ];
        if( strpos($link,'//') === false ) {
            $link='//'.$link;
        }
        $n_link = parse_url($link, PHP_URL_PATH);

        update_post_meta( $post_id, 'product_link', sanitize_text_field( $n_link ) );
    } else {
        delete_post_meta( $post_id, 'product_link' );
    }
 
    return $post_id;
}


// Добавление метабокса expert_email на тип поля post
add_action( 'add_meta_boxes', 'post_add_metabox' );
 
function post_add_metabox() {
    add_meta_box(
        'expert_email', // ID нашего метабокса
        'Email специалиста', // заголовок
        'expert_email_metabox_callback', // функция, которая будет выводить поля в мета боксе
        'post', // типы постов, для которых его подключим
        'normal', // расположение (normal, side, advanced)
        'default' // приоритет (default, low, high, core)
    );
}
 
function expert_email_metabox_callback( $post ) {
    // сначала получаем значения этих полей
    // Email специалиста
    $expert_email = get_post_meta( $post->ID, 'expert_email', true );
 
    // одноразовые числа, кстати тут нет супер-большой необходимости их использовать
    wp_nonce_field( 'seopostsettingsupdate-' . $post->ID, '_truenonce' );
 
    echo '<table class="form-table">
        <tbody>
            <tr>
                <th><label for="seo_title">Email</label></th>
                <td><input type="text" id="expert_email" name="expert_email" value="' . esc_attr( $expert_email ) . '" class="regular-text"></td>
            </tr>
        </tbody>
    </table>';
}

add_action( 'save_post', 'expert_email_save_metabox', 10, 2 );
 
function expert_email_save_metabox( $post_id, $post ) {
 
    // проверка одноразовых полей
    if ( ! isset( $_POST[ '_truenonce' ] ) || ! wp_verify_nonce( $_POST[ '_truenonce' ], 'seopostsettingsupdate-' . $post->ID ) ) {
        return $post_id;
    }
 
    // проверяем, может ли текущий юзер редактировать пост
    $post_type = get_post_type_object( $post->post_type );
 
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }
 
    // ничего не делаем для автосохранений
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return $post_id;
    }
 
    // проверяем тип записи
    if( 'post' !== $post->post_type ) {
        return $post_id;
    }
 
    if( isset( $_POST[ 'expert_email' ] ) ) {
        $email = $_POST[ 'expert_email' ];
        update_post_meta( $post_id, 'expert_email', sanitize_text_field( $email ) );
    } else {
        delete_post_meta( $post_id, 'expert_email' );
    }
 
    return $post_id;
}


// Добавление post_type post в результаты поска 
add_filter( 'dgwt/wcas/search_query/args', function ( $args ) {
    if ( current_user_can( 'manage_options' ) ) {
        $args['post_status'] = [ 'publish' ];
        $args['post_type'] = [ 'product', 'post' ];
    }
   
   return $args;
} );



/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function tg_include_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'products' ) );
    }
}
add_action( 'pre_get_posts', 'tg_include_custom_post_types_in_search_results' );


// Ссылка входа в личный кабинет
function my_account_loginout_link() {    

    if (is_user_logged_in() ) {
        global $wp;
        $current_user = get_user_by( 'id', get_current_user_id() ); 
        echo '<a class="nav-link" href="'. wp_logout_url( get_permalink( wc_get_page_id( 'shop' ) ) ) .'">выйти</a>'; echo '<strong><a class="nav-link" href="'. get_permalink( wc_get_page_id( 'myaccount' ) ) .'">'.$current_user->display_name.'</a></strong>';
    } elseif (!is_user_logged_in() ) {
        echo '<a class="nav-link" href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">Авторизация/Регистрация</a>';
    }

}