<?php

class MarkItUp extends Modules {
    function __init() {
        $this->setPriority("admin_head", 8);
    }

    static function admin_head() {

        global $admin;

        // Is a post or page being edited? If not, end function now.
        $action = isset(Route::current()->action) ? Route::current()->action : 'write_post';
        $wysiwyg_actions = array('write_post', 'edit_post', 'write_page', 'edit_page');
        if (!in_array($action, $wysiwyg_actions)) {
          return;
        }

        $config = Config::current();
        $path = $config->chyrp_url.'/modules/markitup/';

        ?>

        <script type="text/javascript" src="<?php echo $path; ?>markitup/jquery.markitup.pack.js" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $path; ?>markitup/sets/markdown/set.js" charset="utf-8"></script>
        <script type="text/javascript" src="<?php echo $path; ?>markitup.js" charset="utf-8"></script>

        <link href="<?php echo $path; ?>markitup/skins/simple/style.css" rel="stylesheet" type="text/css">
        <link href="<?php echo $path; ?>markitup/sets/markdown/style.css" rel="stylesheet" type="text/css">

        <?php
    }
}

