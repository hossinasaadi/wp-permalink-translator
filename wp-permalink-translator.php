<?php
/*
Plugin Name: WP Permalink Translator
Plugin URI: https://wordpress.org/plugins/wp-permalink-translator/
Description: a plugin to translate Permalink to another languages.
Version: 1.7.6
Author: Hossin Asaadi
Author URI: https://profiles.wordpress.org/hossin277/
License: GPL2
*/
add_action('admin_menu', 'wpt_add_menu');
add_action('plugins_loaded', 'wpt_plugin_load_textdomain');
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function wpt_plugin_load_textdomain()
{
    load_plugin_textdomain('wp-permalink-translator', false, basename(dirname(__FILE__)) . '/langs/');
}

function wpt_add_menu()
{

    add_menu_page(__('WP Permalink Translator', 'wp-permalink-translator'), __('WP Permalink Translator', 'wp-permalink-translator'), 'manage_options', 'wp-permalink-translator.php', 'wp_permalink_translator', "dashicons-translation");


}

//add_action( 'check_admin_referer', 'wp_permalink_translator', 10, 2 );
function wp_permalink_translator()
{
    if (current_user_can('manage_options')) {

        if (is_rtl())
            $float = "right";
        else
            $float = "left";
        if (isset($_POST['translate'])) {
            update_option('trans_from', sanitize_text_field($_POST['trans_from']));
            update_option('trans_to', sanitize_text_field($_POST['trans_to']));


            ?>


            <div class="notice notice-success is-dismissible">
                <p><strong><?php _e('Saved...', 'wp-permalink-translator'); ?></strong></p>
                <button type="button" class="notice-dismiss">
                    <span class="screen-reader-text">Dismiss this notice.</span>
                </button>
            </div>
        <?php }


        if (isset($_POST['translate-all-posts'])) {

            translateAllPosts();
            ?>


            <div class="notice notice-success is-dismissible">
                <p><strong><?php _e('all posts translated...', 'wp-permalink-translator'); ?></strong></p>
                <button type="button" class="notice-dismiss">
                    <span class="screen-reader-text">Dismiss this notice.</span>
                </button>
            </div>
        <?php }


        ?>
        <div class="wrap">
            <h2 class="">
                <?php _e('WP Permalink Translator', 'wp-permalink-translator'); ?>
            </h2>


            <form action="" method="post">
                <?php wp_nonce_field('translate'); ?>

                <h2><?php _e('Translate From :', 'wp-permalink-translator'); ?></h2>

                <input placeholder="ex : fa" name="trans_from" type='text'
                       value="<?php echo get_option('trans_from'); ?>"/>
                <h2><?php _e('TO', 'wp-permalink-translator'); ?></h2>

                <input placeholder="ex : en" name="trans_to" type='text' value="<?php echo get_option('trans_to'); ?>"/>

                <?php submit_button(__("save", 'wp-permalink-translator'), 'button-primary', 'translate'); ?>
            </form>

            <form action="" method="post" style="border: #000 solid 1px;
    text-align: center;
    padding: 2%;">
                <?php wp_nonce_field('translate-all-posts'); ?>

                <h4 style="color: red;"><?php _e('ALERT!!!', 'wp-permalink-translator'); ?></h4>

                <p class="description">
                    <?php _e('its effect all posts in your website! it may break links in search engine such google and etc...'); ?>

                </p>
                <?php submit_button(__("Translate All Posts Permalink", 'wp-permalink-translator-all-posts'), 'delete secondary', 'translate-all-posts', false, array('style' => 'background:red;color:#FFF;')); ?>

            </form>
            <h2><?php _e('Translate Languages :', 'wp-permalink-translator'); ?></h2>

            <table class="table" style="width: 75%;">
                <tbody>
                <tr
                " >
                <td><?php _e('Language Name', 'wp-permalink-translator'); ?></td>
                <td><?php _e('Language Code', 'wp-permalink-translator'); ?></td>
                <td><?php _e('Language Name', 'wp-permalink-translator'); ?></td>
                <td><?php _e('Language Code', 'wp-permalink-translator'); ?></td>
                </tr>
                <tr>
                    <td>Afrikaans</td>
                    <td>af</td>
                    <td>Irish</td>
                    <td>ga</td>
                </tr>
                <tr>
                    <td>Albanian</td>
                    <td>sq</td>
                    <td>Italian</td>
                    <td>it</td>
                </tr>
                <tr>
                    <td>Arabic</td>
                    <td>ar</td>
                    <td>Japanese</td>
                    <td>ja</td>
                </tr>
                <tr>
                    <td>Azerbaijani</td>
                    <td>az</td>
                    <td>Kannada</td>
                    <td>kn</td>
                </tr>
                <tr>
                    <td>Basque</td>
                    <td>eu</td>
                    <td>Korean</td>
                    <td>ko</td>
                </tr>
                <tr>
                    <td>Bengali</td>
                    <td>bn</td>
                    <td>Latin</td>
                    <td>la</td>
                </tr>
                <tr>
                    <td>Belarusian</td>
                    <td>be</td>
                    <td>Latvian</td>
                    <td>lv</td>
                </tr>
                <tr>
                    <td>Bulgarian</td>
                    <td>bg</td>
                    <td>Lithuanian</td>
                    <td>lt</td>
                </tr>
                <tr>
                    <td>Catalan</td>
                    <td>ca</td>
                    <td>Macedonian</td>
                    <td>mk</td>
                </tr>
                <tr>
                    <td>Chinese Simplified</td>
                    <td>zh-CN</td>
                    <td>Malay</td>
                    <td>ms</td>
                </tr>
                <tr>
                    <td>Chinese Traditional</td>
                    <td>zh-TW</td>
                    <td>Maltese</td>
                    <td>mt</td>
                </tr>
                <tr>
                    <td>Croatian</td>
                    <td>hr</td>
                    <td>Norwegian</td>
                    <td>no</td>
                </tr>
                <tr>
                    <td>Czech</td>
                    <td>cs</td>
                    <td>Persian</td>
                    <td>fa</td>
                </tr>
                <tr>
                    <td>Danish</td>
                    <td>da</td>
                    <td>Polish</td>
                    <td>pl</td>
                </tr>
                <tr>
                    <td>Dutch</td>
                    <td>nl</td>
                    <td>Portuguese</td>
                    <td>pt</td>
                </tr>
                <tr>
                    <td>English</td>
                    <td>en</td>
                    <td>Romanian</td>
                    <td>ro</td>
                </tr>
                <tr>
                    <td>Esperanto</td>
                    <td>eo</td>
                    <td>Russian</td>
                    <td>ru</td>
                </tr>
                <tr>
                    <td>Estonian</td>
                    <td>et</td>
                    <td>Serbian</td>
                    <td>sr</td>
                </tr>
                <tr>
                    <td>Filipino</td>
                    <td>tl</td>
                    <td>Slovak</td>
                    <td>sk</td>
                </tr>
                <tr>
                    <td>Finnish</td>
                    <td>fi</td>
                    <td>Slovenian</td>
                    <td>sl</td>
                </tr>
                <tr>
                    <td>French</td>
                    <td>fr</td>
                    <td>Spanish</td>
                    <td>es</td>
                </tr>
                <tr>
                    <td>Galician</td>
                    <td>gl</td>
                    <td>Swahili</td>
                    <td>sw</td>
                </tr>
                <tr>
                    <td>Georgian</td>
                    <td>ka</td>
                    <td>Swedish</td>
                    <td>sv</td>
                </tr>
                <tr>
                    <td>German</td>
                    <td>de</td>
                    <td>Tamil</td>
                    <td>ta</td>
                </tr>
                <tr>
                    <td>Greek</td>
                    <td>el</td>
                    <td>Telugu</td>
                    <td>te</td>
                </tr>
                <tr>
                    <td>Gujarati</td>
                    <td>gu</td>
                    <td>Thai</td>
                    <td>th</td>
                </tr>
                <tr>
                    <td>Haitian Creole</td>
                    <td>ht</td>
                    <td>Turkish</td>
                    <td>tr</td>
                </tr>
                <tr>
                    <td>Hebrew</td>
                    <td>iw</td>
                    <td>Ukrainian</td>
                    <td>uk</td>
                </tr>
                <tr>
                    <td>Hindi</td>
                    <td>hi</td>
                    <td>Urdu</td>
                    <td>ur</td>
                </tr>
                <tr>
                    <td>Hungarian</td>
                    <td>hu</td>
                    <td>Vietnamese</td>
                    <td>vi</td>
                </tr>
                <tr>
                    <td>Icelandic</td>
                    <td>is</td>
                    <td>Welsh</td>
                    <td>cy</td>
                </tr>
                <tr>
                    <td>Indonesian</td>
                    <td>id</td>
                    <td>Yiddish</td>
                    <td>yi</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="wrapp">
            <h3>  <?php _e('If you like this plugin, please Donate to support its future development  :', 'wp-permalink-translator'); ?> </h3>

            <p class="description">
            <h4>
                <a target="_blank" href="https://zarinp.al/@hossin277"><?php _e('Donate link for iranian!', 'wp-permalink-translator'); ?></a>
            </h4> <br>
            <hr>
            <h3>   <?php _e('You Donate With Buy Me a Coffee  :', 'wp-permalink-translator'); ?></h3>

<!--            <img style="width: 200px;height: 200px;" src="--><?php //echo plugins_url('img/donate.jpg', __FILE__) ?><!--">-->
            <a target="_blank" href="https://www.buymeacoffee.com/4epLAXRYo"><?php _e('Donate!', 'wp-permalink-translator'); ?></a>
            <hr>

            <h3 style="color: gold;width: 59%;background: green;border: 2px solid green;border-radius: 2px;padding: 5px;">   <?php _e('Rate to WP Permalink Translator :', 'wp-permalink-translator'); ?></h3>
            <h4><a href="https://wordpress.org/support/plugin/wp-permalink-translator/reviews/#new-post"
                   target="blank"><?php _e('Take a Review', 'wp-permalink-translator'); ?>


                </a>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span>
                <span class="dashicons dashicons-star-filled"></span></h4> <br>

            </p>


        </div>
        <style type="text/css">
            tr {
                font-weight: bold !important;
            }

            td {
                font-weight: bold !important;
                border-bottom: 1px black solid;
                text-align: center;
                border-right: 1px black solid;
                padding: .5%;
            }

            .wrap {
                width: 50%;
                float: <?php echo( $float ); ?>;
            }

            .wrapp {
                width: 40%;
                float: <?php echo( $float ); ?>;
                padding-top: 10%;
            }
        </style>

        <?php


    }
}

// add our custom hook
add_filter('sanitize_title', 'wpt_sanitize_title_with_dashes', 10, 3);
function wpt_sanitize_title_with_dashes($title, $raw_title = '', $context = 'display')
{
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

    if (seems_utf8($title)) {
        if (function_exists('mb_strtolower')) {
            $title = mb_strtolower($title, 'UTF-8');
        }
        $title = utf8_uri_encode($title, 1000); // <--- here is the trick!
    }

    $title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);

    if ('save' == $context) {
        // Convert nbsp, ndash and mdash to hyphens
        $title = str_replace(array('%c2%a0', '%e2%80%93', '%e2%80%94'), '-', $title);

        // Strip these characters entirely
        $title = str_replace(array(
            // iexcl and iquest
            '%c2%a1', '%c2%bf',
            // angle quotes
            '%c2%ab', '%c2%bb', '%e2%80%b9', '%e2%80%ba',
            // curly quotes
            '%e2%80%98', '%e2%80%99', '%e2%80%9c', '%e2%80%9d',
            '%e2%80%9a', '%e2%80%9b', '%e2%80%9e', '%e2%80%9f',
            // copy, reg, deg, hellip and trade
            '%c2%a9', '%c2%ae', '%c2%b0', '%e2%80%a6', '%e2%84%a2',
            // grave accent, acute accent, macron, caron
            '%cc%80', '%cc%81', '%cc%84', '%cc%8c',
        ), '', $title);

        // Convert times to x
        $title = str_replace('%c3%97', 'x', $title);
    }

    $title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');

    return $title;
}

function wpt_nth_position_nth($str, $letter, $n, $offset = 0)
{
    $str_arr = str_split($str);
    $letter_size = array_count_values(str_split(substr($str, $offset)));
    if (!isset($letter_size[$letter])) {
        trigger_error('letter "' . $letter . '" does not exist in ' . $str . ' after ' . $offset . '. position', E_USER_WARNING);
        return false;
    } else if ($letter_size[$letter] < $n) {
        trigger_error('letter "' . $letter . '" does not exist ' . $n . ' times in ' . $str . ' after ' . $offset . '. position', E_USER_WARNING);
        return false;
    }
    for ($i = $offset, $x = 0, $count = (count($str_arr) - $offset); $i < $count, $x != $n; $i++) {
        if ($str_arr[$i] == $letter) {
            $x++;
        }
    }
    return $i - 1;
}

function wpt_new_post($new_status, $old_status, $post)
{
    if ('publish' !== $new_status or 'publish' === $old_status)
        return;

    if ('post' !== $post->post_type)
        return; // restrict the filter to a specific post type


    $post_name = $post->post_title;
    $new_post_name = (wpt_translate_post_url($post_name));

    $new_post = array(
        'ID' => $post->ID,
        'post_name' => $new_post_name,
    );

    // Update the post into the database
    wp_update_post($new_post);


}

add_action('transition_post_status', 'wpt_new_post', 10, 3);

function wpt_translate_post_url($string)
{

    $word = str_replace("،", " ", $string);
    $word = str_replace(array("!", "?", "؟"), "", $word);
    $word = wpt_sanitize_title_with_dashes($word);

    $word_replace = str_replace(array("-"), array(" "), $word);
    $word = str_replace(array("-"), array("+"), $word);
    $from = get_option('trans_from', 'en');
    $to = get_option('trans_to', 'en');
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $from . "&tl=" . $to . "&dt=t&q=" . ($word) . "&tbb=1&ie=UTF-8&oe=UTF-8";
    $fileEndEnd = (file_get_contents($url));
    $fileEndEnd = str_replace(array("[", "]", "\"", urldecode($word_replace)), array("", "", "", ""), $fileEndEnd);
    $list = array();

    $char_positon = wpt_nth_position_nth($fileEndEnd, ',', 1);

    $str1 = substr($fileEndEnd, 0, $char_positon);
    $str2 = substr($fileEndEnd, $char_positon + 1, strlen($fileEndEnd) - 1);

    for ($i = 0; $i < 3; $i++) {
        $list = explode(',', $str1 . $str2);
    }
    $output = urldecode($list[0]);
    return $output;
}



function translateAllPosts(){

    $my_posts = get_posts( array('post_type' => 'post'  ) );

    foreach ( $my_posts as $post ):
        $post_name = $post->post_title;
        $output = (wpt_translate_post_url($post_name));

        $post->post_name  = $output;

        wp_update_post( $post );

    endforeach;
}
?>