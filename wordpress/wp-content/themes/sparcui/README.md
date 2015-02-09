== sparcwp ==
=========

Bootstrap-based Wordpress Starter Theme


This is a starter theme called `sparcwp`. It's a theme meant to help with content strategy for our wordpress based sites. It may eventually become a parent theme once it's fully realized, but for now, it's a very bare bones starting point for easy development. 

Most content layout is handled via the wordpress content editor. Hero sections on the front page and hero page template are handled by the Advanced Custom Field plugin.

Plugins that this theme uses
* [Bootstrap shortcodes](http://filipstefansson.com/bootstrap-3-shortcodes/).  This one is not essential but comes in handy if you don't want to use divs in the content editor. If you download via Wordpress, make sure it's the one by filip stefansson.
* [Advanced Custom Fields](http://www.advancedcustomfields.com/). Used in the hero template and the hero in header template. 

== Getting Started ==
---------------------

1. Download the theme from github and zip the sparcwp folder. 

2. Download plugins and install before you install the theme.

   [Bootstrap shortcodes](http://filipstefansson.com/bootstrap-3-shortcodes/).

   [Advanced Custom Fields](http://www.advancedcustomfields.com/). You can install this from the WP plugins area

3. Install sparcwp theme

4. Import 

   sparcwp-dummy.xml file to import content to get you started and 

   advanced-custom-field-export.xml to import advanced custom field plugin fields.

5. In the Menus tab, select Top Nav Menu and check the "main menu" box at the bottom.

6. From the Customize tab - set main menu to be the Top Nav menu. Ignore footer menu for now. Also set Static Front Page to be the "Home" page.

7. From the Header tab - add/change the custom logo if needed. If there is no logo image uploaded, the site name will be the default logo.

8. Add footer blocks using the footer widget.

== Pattern Library ==
---------------------
The pattern library is a resource for html/snippet management within your theme.  
1. Setting the correct path to the snippets folder

   Make sure the $rootpath in /includes/pattern-functions.php is the correct path to the root of the sparcwp theme folder.  By default this is set to [document_root]/wp-content/themes/sparcwp, which assumes your wordpress install is at the server root level.

2. Adding Snippets:
   
   All patterns are separate HTML files that live in /patterns. Ideally, the file name should be the same as the pattern's main class name. Add a file to see it in the library.

   If you'd like to add usage notes to a pattern, add a .txt file with the same name as the .html file and it'll get pulled into the right place.

3. Changing styles

   The styling of the pattern library comes from the project css so it should automatically pull in the correct styling.  

4. Non snippet patterns

   If you want to add any styleguide elements for reference only, use the WP content editor on the Pattern Library page.  The default pattern library page has color swatches for reference.

== Less ==
---------------------
The theme is referencing a project and vendor compiled css stylesheet. To update the styles, you'll update the less files.  The theme has grunt files included if you choose to use grunt for compiling.  You could also compile locally using whichever app you choose, however Less App currently does not support some bootstrap 3 mixins, which is why the grunt files are there.


# Questions?
Have questions, issues, comments? Contact:

* @shivika - Shivika Asthana

