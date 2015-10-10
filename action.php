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
        $controller->register_hook('DOKUWIKI_STARTED', 'AFTER', $this, '_exportToJSINFO');
    }

    /**
     * load prettyPhoto.css and jquery.prettyPhoto.js
     */
    function _handleMeta(Doku_Event $event, $param) {

        $event->data['link'][] = array(
            'rel'     => 'stylesheet',
            'type'    => 'text/css',
            'href'    => DOKU_BASE.'lib/plugins/prettyphoto/css/prettyPhoto.css',
        );
        $event->data['script'][] = array(
            'type'    => 'text/javascript',
            'charset' => 'utf-8',
            'src'    => DOKU_BASE.'lib/plugins/prettyphoto/js/jquery.prettyPhoto.js',
            '_data'   => '',
        );

        // local configuration
        if (is_readable(dirname(__FILE__).'/prettyphoto.conf.js')) {
            $event->data['script'][] = array(
                'type'    => 'text/javascript',
                'charset' => 'utf-8',
                'src'    => DOKU_BASE.'lib/plugins/prettyphoto/prettyphoto.conf.js',
                '_data'   => '',
            );
        }
   }

    /**
     * Exports configuration settings to $JSINFO
     */
    function _exportToJSINFO(Doku_Event $event, $param) {

        global $JSINFO, $conf;

        // auto detect PRETTYPHOTO_PLUGIN_MEDIAPATH
        switch ($conf['userewrite']) {
              case 0: // No URL rewriting
                $mediapath = DOKU_BASE.'lib/exe/fetch.php?media=';
                break;
              case 1: // serverside rewiteing eg. .htaccess file
                $mediapath = DOKU_BASE.'_media/';
                break;
              case 2: // DokuWiki rewiteing
                $mediapath = DOKU_BASE.'lib/exe/fetch.php/';
                break;
        }

        $JSINFO['plugin_prettyphoto'] = array(
                'mediapath'   => $mediapath,
            );
    }

}
