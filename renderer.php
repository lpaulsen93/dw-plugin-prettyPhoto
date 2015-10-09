<?php
/**
 * DokuWiki Plugin prettyphoto (Renderer Component)
 *
 * @license Public Domain
 * @author  Marcus von Appen <marcus@sysfault.org>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

if (!defined('DOKU_LF')) define('DOKU_LF', "\n");
if (!defined('DOKU_TAB')) define('DOKU_TAB', "\t");
require_once DOKU_INC.'inc/parser/xhtml.php';

class renderer_plugin_prettyphoto extends Doku_Renderer_xhtml {

    /**
     * Make available as XHTML replacement renderer
     */
    public function canRender($format){
        if($format == 'xhtml') return true;
        return false;
    }

    public function internalmedia($src, $title=NULL, $align=NULL, $width=NULL,
                                  $height=NULL, $cache=NULL, $linking=NULL) {
        global $ID;
        list($src,$hash) = explode('#',$src,2);
        resolve_mediaid(getNS($ID),$src, $exists);

        $noLink = false;
        $render = ($linking == 'linkonly') ? false : true;
        $link = $this->_getMediaLinkConf($src, $title, $align, $width, $height, $cache, $render);

        list($ext,$mime,$dl) = mimetype($src,false);
        if(substr($mime,0,5) == 'image' && $render){
            if ($linking == NULL || $linking == '' || $linking == 'details') {
                $linking = 'direct';
            }
            $link['url'] = ml($src,array('id'=>$ID,'cache'=>$cache),($linking == 'direct'));
            } elseif($mime == 'application/x-shockwave-flash' && $render) {
            // don't link flash movies
            $noLink = true;
        }else{
            // add file icons
            $class = preg_replace('/[^_\-a-z0-9]+/i','_',$ext);
            $link['class'] .= ' mediafile mf_'.$class;
            $link['url'] = ml($src,array('id'=>$ID,'cache'=>$cache),true);
            if ($exists) $link['title'] .= ' (' . filesize_h(filesize(mediaFN($src))).')';
        }
    if($hash) $link['url'] .= '#'.$hash;
    //markup non existing files
    if (!$exists) {
         $link['class'] .= ' wikilink2';
    }
    
    //output formatted
    if ($linking == 'nolink' || $noLink) $this->doc .= $link['name'];
        else $this->doc .= $this->_formatLink($link);
     }
    // FIXME override any methods of Doku_Renderer_xhtml here
}

