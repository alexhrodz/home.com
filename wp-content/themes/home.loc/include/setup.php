<?php
/**
* Create custom post types.
 * https://wp-kama.ru/function/register_post_type
 * https://wp-kama.ru/function/register_taxonomy
 *
*/

add_action( 'init', 'register_integrations_post_type' );
function register_integrations_post_type() {

    // Раздел вопроса - integrationscat
    register_taxonomy( 'integrationscat', [ 'integrations' ], [
        'label'                 => 'Раздел интеграции', // определяется параметром $labels->name
        'labels'                => array(
            'name'              => 'Разделы интеграций',
            'singular_name'     => 'Раздел интеграции',
            'search_items'      => 'Искать Раздел интеграции',
            'all_items'         => 'Все Разделы интеграций',
            'parent_item'       => 'Родит. раздел интеграции',
            'parent_item_colon' => 'Родит. раздел интеграции:',
            'edit_item'         => 'Ред. Раздел интеграции',
            'update_item'       => 'Обновить Раздел интеграции',
            'add_new_item'      => 'Добавить Раздел интеграции',
            'new_item_name'     => 'Новый Раздел интеграции',
            'menu_name'         => 'Раздел интеграции',
        ),
        'description'           => 'Рубрики для раздела интеграций', // описание таксономии
        'public'                => true,
        'show_in_nav_menus'     => false, // равен аргументу public
        'show_ui'               => true, // равен аргументу public
        'show_tagcloud'         => false, // равен аргументу show_ui
        'hierarchical'          => true,
        'rewrite'               => array('slug'=>'faq', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
        'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
    ] );

    // тип записи - вопросы - integrations
    register_post_type( 'integrations', [
        'label'               => 'Интеграции',
        'labels'              => array(
            'name'          => 'Интеграции',
            'singular_name' => 'Интеграция',
            'menu_name'     => 'Интеграции',
            'all_items'     => 'Все интеграции',
            'add_new'       => 'Добавить интеграции',
            'add_new_item'  => 'Добавить новую интеграцию',
            'edit'          => 'Редактировать',
            'edit_item'     => 'Редактировать интеграцию',
            'new_item'      => 'Новая интеграция',
        ),
        'description'         => '',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_rest'        => false,
        'rest_base'           => '',
        'show_in_menu'        => true,
        'exclude_from_search' => false,
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
        'hierarchical'        => false,
        'rewrite'             => array( 'slug'=>'integrations/%integrationscat%', 'with_front'=>false, 'pages'=>false, 'feeds'=>false, 'feed'=>false ),
        'has_archive'         => 'integration',
        'query_var'           => true,
        'supports'            => [ 'title', 'thumbnail'], //  'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => array( 'integrationscat' ),
        'menu_position'       => 4,
        'menu_icon'           =>'dashicons-admin-plugins',
    ] );

}

## Отфильтруем ЧПУ произвольного типа
// фильтр: apply_filters( 'post_type_link', $post_link, $post, $leavename, $sample );
add_filter( 'post_type_link', 'integrations_permalink', 1, 2 );
function integrations_permalink( $permalink, $post ){

    // выходим если это не наш тип записи: без холдера %faqcat%
    if( strpos( $permalink, '%integrationscat%' ) === false )
        return $permalink;

    // Получаем элементы таксы
    $terms = get_the_terms( $post, 'integrationscat' );
    // если есть элемент заменим холдер
    if( ! is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) )
        $term_slug = array_pop( $terms )->slug;
    // элемента нет, а должен быть...
    else
        $term_slug = 'no-integrationscat';

    return str_replace( '%integrationscat%', $term_slug, $permalink );
}

add_action( 'init', 'register_customers_post_types' );
function register_customers_post_types(){
    register_post_type( 'customers', [
        'label'  => null,
        'labels' => [
            'name'               => 'customers', // основное название для типа записи
            'singular_name'      => 'customer', // название для одной записи этого типа
            'add_new'            => 'Добавить customer', // для добавления новой записи
            'add_new_item'       => 'Добавление customer', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование customer', // для редактирования типа записи
            'new_item'           => 'Новый customer', // текст новой записи
            'view_item'          => 'Смотреть customer', // для просмотра записи этого типа.
            'search_items'       => 'Искать customer', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'customers', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_position'       => 4,
        'menu_icon'           =>'dashicons-money-alt',
    ] );
}


add_action( 'init', 'register_testimonials_post_types' );
function register_testimonials_post_types(){
    register_post_type( 'testimonials', [
        'label'  => null,
        'labels' => [
            'name'               => 'testimonials', // основное название для типа записи
            'singular_name'      => 'testimonial', // название для одной записи этого типа
            'add_new'            => 'Добавить testimonial', // для добавления новой записи
            'add_new_item'       => 'Добавление testimonial', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование testimonial', // для редактирования типа записи
            'new_item'           => 'Новый testimonial', // текст новой записи
            'view_item'          => 'Смотреть testimonial', // для просмотра записи этого типа.
            'search_items'       => 'Искать testimonial', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'testimonials', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => null, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => null,
        'menu_icon'           => null,
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
        'menu_position'       => 4,
        'menu_icon'           =>'dashicons-editor-quote',
    ] );
}