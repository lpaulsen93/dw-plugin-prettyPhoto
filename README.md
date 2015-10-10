PrettyPhoto Plugin for DokuWiki
======================================

This is a fork of [jQuery prettyPhoto Plugin for DokuWiki](https://bitbucket.org/marcusva/dokuwiki-plugin-prettyphoto) originally developed by Marcus von Appen. It enables a lightbox effect for images embedded as direct links in the wiki page. 
The [prettyPhoto](https://github.com/scaron/prettyphoto) is a jQuery based lightbox clone.

Usage & Example
---------------
DokuWiki supports a direct link of image, which brings you directly to the full image in its own page. This plugin will alter the behavior so that the image will be shown instead in a pop-up frame (lightbox-like overlay) when you click the link.

Adding `?direct` option to the image link will cause the plugin to show the image in a pop-up frame. 

    {{:wiki:dokuwiki-128.png?direct&48|}}
    {{:wiki:dokuwiki-128.png?48&direct|}}

The pop-up frame will not shown for image links with other option such as `?linkonly` or `?nolink`. The default behaviour is preserved.

    {{:wiki:dokuwiki-128.png?linkonly|}}
    {{:wiki:dokuwiki-128.png?nolink&48|}}
    {{:wiki:dokuwiki-128.png?48&nolink|}}

    {{:wiki:dokuwiki-128.png?detail&48|}}
    {{:wiki:dokuwiki-128.png?48|}}


Customization
-------------
You may customize the behaviour of the prettyPhoto overlay within the `prettyphoto.conf.js` file. It must be located in the plugin directory. You can create it by copying from `prettyphoto.conf.js.example` that will be found in the plugin directory. 

```
/**
 * prettyphoto.conf.js.example
 */
// disabling social media integration in the pop-up frame
var PRETTYPHOTO_PLUGIN_PARAMS = { social_tools: '' };
```

Please refer to <http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/documentation> for further details on customization.


License
-------
The contents of `js/`, `images/` and `css/` holders belong to the [prettyPhoto](https://github.com/scaron/prettyphoto) and are seperately licensed under Creative Commons 2.5 or GPLV2 license. See <http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/> for further details. 

The other code are given to the Public Domain.

