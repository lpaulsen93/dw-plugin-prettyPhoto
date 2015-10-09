jQuery prettyPhoto Plugin for DokuWiki
======================================
All documentation for this plugin can be found within this README or at
<https://bitbucket.org/marcusva/dokuwiki-plugin-prettyphoto>.

If you install this plugin manually, make sure it is installed in
`lib/plugins/prettyphoto/` - if the folder is called different it will not
work!

Please refer to <http://www.dokuwiki.org/plugins> for additional info on
how to install plugins in DokuWiki.

Usage & Example
---------------
The default configuration of the plugin will provide a overlay box for
images that are linked directly into the page:

    {{fancyimage.jpg?direct&100|}}

The plugin is comes with an own renderer that automatically replaces
internal image media links, which refer to the details page of the
images, with direct links to the images. This is a convenience mechanism
to save you typing "?direct" for each and every image link. See
<https://www.dokuwiki.org/images> for further details about image links.

You can find a simple example at
<http://sysfault.org/dokuwiki/projects:dwpretty>

Customization
-------------
The main magic happens within `script.js`, which will pull in a
configuration file `prettyphoto.conf.js`, located in DokuWiki's
`conf/` folder. Two javascript variables will be tested within the
configuration file,

    var PRETTYPHOTO_PLUGIN_MEDIAPATH

which defines the media item link for the DokuWiki installation. By
default, DokuWiki uses "lib/exe/fetch.php?media=", your installation
however might use different links, changed by rewrite rules. If this is
the case, you should set

    var PRETTYPHOTO_PLUGIN_MEDIAPATH = "<your media path>";

within `prettyphoto.conf.js`. To customize the behaviour of the
prettyPhoto overlay, you can use

    var PRETTYPHOTO_PLUGIN_PARAMS

which contains the prettyPhoto configuration to be used (see
<http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/documentation>
for further details on customizing), e.g.

    var PRETTYPHOTO_PLUGIN_PARAMS = { social_tools: '' };

for disabling social media integration.

Download
--------
You can download the plugin by fetching a snapshot of the most current
source version via

<https://bitbucket.org/marcusva/dokuwiki-plugin-prettyphoto/downloads#tag-downloads>

Separate downloads are not provided to make the plugin update from within
DokuWiki as easy as possible.

License
-------
The code is given to the Public Domain.

Please note that the code of `jquery.prettyPhoto.js` as well as the contents
of the `images/` folder and `style.css` are not covered by this. They are
seperately licensed under the GNU General Public License as published by
the Free Software Foundation; version 2 of the License. See
<http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/>
for further details.

