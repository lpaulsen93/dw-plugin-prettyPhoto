<?php
/**
 * DokuWiki PrettyPhoto Plugin
 *
 * @license Public Domain
 * @author  Marcus von Appen <marcus@sysfault.org>
 *
 * @see also https://bitbucket.org/marcusva/dokuwiki-plugin-prettyphoto
 */
// must be run within Dokuwiki
if(!defined('DOKU_INC')) die();

/**
 * Action component of PrettyPhoto plugin
 *
 * @author  Satoshi Sahara <sahara.satoshi@gmail.com>
 */
class action_plugin_prettyphoto extends DokuWiki_Action_Plugin {

    // register hook
    function register(Doku_Event_Handler $controller) {
        $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, '_handleMeta');
    }

    /**
     * load prettyPhoto.css
     */
    function _handleMeta(Doku_Event $event, $param) {
        $url = DOKU_BASE.'lib/plugins/prettyphoto/css/prettyPhoto.css';
        $event->data['link'][] = array(
            'rel'     => 'stylesheet',
            'type'    => 'text/css',
            'href'    => $url,
        );
    }

}
