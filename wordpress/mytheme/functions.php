<?php
/**
 * CSS及びJavaScriptファイル読み込み
 */
function add_files() {
  wp_enqueue_style('normalize_css_cdn', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css');
  wp_enqueue_style('original_style_css', get_stylesheet_uri(), ['normalize_css_cdn']);
  wp_enqueue_script('original_index_js', get_template_directory_uri().'/js/index.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'add_files');

/**
 * メニューの登録
 */
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'ヘッダーメニュー' ),
      'extra-menu' => __( '追加メニュー' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

/**
 * APIからデータを取得
 */
function getApiDataCurl($url)
{
    $option = [
        CURLOPT_RETURNTRANSFER => true, //文字列として返す
        CURLOPT_TIMEOUT => 3, // タイムアウト時間
    ];
    $ch = curl_init($url);
    curl_setopt_array($ch, $option);
    $json = curl_exec($ch);
    $info = curl_getinfo($ch);
    $errorNo = curl_errno($ch);
    // OK以外はエラーなので空白配列を返す
    if ($errorNo !== CURLE_OK) {
        // 詳しくエラーハンドリングしたい場合はerrorNoで確認
        // タイムアウトの場合はCURLE_OPERATION_TIMEDOUT
        return [];
    }
    // 200以外のステータスコードは失敗とみなし空配列を返す
    if ($info['http_code'] !== 200) {
        return [];
    }
    // 文字列から変換
    $jsonArray = json_decode($json, true);
    return $jsonArray;
}
$zipcodeApiUrl = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=';
$prefectureApiUrl = 'http://geoapi.heartrails.com/api/json?method=getPrefectures';
$prefectures = getApiDataCurl($prefectureApiUrl);
$prefectures_json = array_to_json($prefectures['response']['prefecture']);
$post_json = array_to_json($_POST);

/**
 * jsonエンコード
 */
function array_to_json ($array) {
  return json_encode($array , JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}