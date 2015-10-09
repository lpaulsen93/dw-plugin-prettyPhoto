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

    /**
     * Exports configuration settings to $JSINFO
     */
    function _exportToJSINFO(Doku_Event $event, $param) {

        global $JSINFO, $conf;

        // PRETTYPHOTO_PLUGIN_MEDIAPATH
        $mediapath = $this->getConf('mediapath');
        if (empty($mediapath)) {
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
        }
        //msg('PRETTYPHOTO_PLUGIN_MEDIAPATH='.$mediapath ,0);

        $JSINFO['plugin_prettyphoto'] = array(
                'mediapath'   => $mediapath,
            );
    }

}
