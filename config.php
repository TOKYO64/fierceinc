<?php


#CMS Made Simple Configuration File
#Please clear the cache (Site Admin->Global Settings in the admin panel)
#after making any changes to path or url related options

#-----------------
#Behaviour Settings
#-----------------

# These settings will effect the overall behaviour of the CMS application, please
# use extreme caution when editing these.  Additionally, some settings may have
# no effect on servers with significantly restricted configurability.

# Warning: This option is deprecated and will be removed in later versions oF CMSMS.
# If you are experiencing problems with php memory limit errors, then you may
# want to try enabling and/or adjusting this setting.
# Note: Your server may not allow the application to override memory limits.
$config['php_memory_limit'] = '';

# In versions of CMS Made Simple prior to version 1.4, the page template was processed
# in it's entirety.  This behaviour was later changed to process the head portion of the
# page template after the body.  If you are working with a highly configured site that
# relies significantly on the old order of smarty processing, you may want to try
# setting this parameter to true.
$config['process_whole_template'] = false;

# CMSMS Debug Mode?  Turn it on to get a better error when you
# see {nocache} errors, or to allow seeing php notices, warnings, and errors in the html output.
# This setting will also disable browser css caching.
$config['debug'] = false;

# Output compression?
# Turn this on to allow CMS to do output compression
# this is not needed for apache servers that have mod_deflate enabled
# and possibly other servers.  But may provide significant performance
# increases on some sites.  Use caution when using this as there have
# been reports of incompatibilities with some browsers.
$config['output_compression'] = false;

# Timezone setting
# PHP 5.3 requires that timezones be set at the server level.
# This variable can be used to set your sites timezone.
# Valid values for this variable can be found at:
# http://www.php.net/manual/en/timezones.php
# If this field is empty, no timezone will be set
$config['timezone'] = '';

#-----------------
#Database Settings
#-----------------

#This is your database connection information.  Name of the server,
#username, password and a database with proper permissions should
#all be setup before CMS Made Simple is installed.
$config['dbms'] = 'mysql';
$config['db_hostname'] = 'db.luxmedia.com';
$config['db_username'] = 'fierceadmin_db';
$config['db_password'] = 'TrainMeNow';
$config['db_name'] = 'fierce_cms';
#Change this param only if you know what you are doing
$config["db_port"] = '';


#If app needs to coexist with other tables in the same db,
#put a prefix here.  e.g. "cms_"
$config['db_prefix'] = 'cms_';

#Use persistent connections?  They're generally faster, but not all hosts
#allow them.
$config['persistent_db_conn'] = true;

#Use ADODB Lite?  This should be true in almost all cases.  Note, slight
#tweaks might have to be made to date handling in a "regular" adodb
#install before it can be used.
$config['use_adodb_lite'] = true;

#-------------
#Path Settings
#-------------

#Document root as seen from the webserver.  No slash at the end
#If page is requested with https use https as root url
#e.g. http://blah.com
$config['root_url'] = 'http://www.fierceinc.com';

#SSL URL.  This is used for pages that are marked as secure.
$config['ssl_url'] = 'https://www.fierceinc.com';

#Path to document root. This should be the directory this file is in.
#e.g. /var/www/localhost
$config['root_path'] = '/home/fierceadmin/fierceinc.com';

#Name of the admin directory
$config['admin_dir'] = 'admin';

#Where do previews get stored temporarily?  It defaults to tmp/cache.
$config['previews_path'] = '/home/fierceadmin/fierceinc.com/tmp/cache';

#Where are uploaded files put?  This defaults to uploads.
$config['uploads_path'] = '/home/fierceadmin/fierceinc.com/uploads';

#Where is the url to this uploads directory?
$config['uploads_url'] = $config['root_url'] . '/uploads';


#---------------
#Upload Settings
#---------------

#Maxium upload size (in bytes)?
$config['max_upload_size'] = 1000000000;

#Permissions for uploaded files.  This only really needs changing if your
#host has a weird permissions scheme.
$config['default_upload_permission'] = '664';

#------------------
#Usability Settings
#------------------

#Allow smarty {php} tags?  These could be dangerous if you don't trust your users.
$config['use_smarty_php_tags'] = false;

#Automatically assign alias based on page title?
$config['auto_alias_content'] = true;

#------------
#URL Settings
#------------

#What type of URL rewriting should we be using for pretty URLs?  Valid options are:
#'none', 'internal', and 'mod_rewrite'.  'internal' will not work with IIS some CGI
#configurations. 'mod_rewrite' requires proper apache configuration, a valid
#.htaccess file and most likely {metadata} in your page templates.  For more
#information, see:
#http://wiki.cmsmadesimple.org/index.php/FAQ/Installation/Pretty_URLs#Pretty_URL.27s
$config['url_rewriting'] = 'mod_rewrite';

#Extension to use if you're using mod_rewrite for pretty URLs.
$config['page_extension'] = '';

#If using none of the above options, what should we be using for the query string
#variable?  (ex. http://www.mysite.com/index.php?page=somecontent)
$config['query_var'] = 'page';

#--------------
#Image Settings
#--------------

#Which program should be used for handling thumbnails in the image manager.
#See http://wiki.cmsmadesimple.org/index.php/User_Handbook/Admin_Panel/Content/Image_Manager for more
#info on what this all means
$config['image_manipulation_prog'] = 'GD';
$config['image_transform_lib_path'] = '/usr/bin/ImageMagick/';

#Default path and URL for uploaded images in the image manager
$config['image_uploads_path'] = '/home/fierceadmin/fierceinc.com/uploads/images';
$config['image_uploads_url'] = $config['root_url'] . '/uploads/images'; 

#SSL URL.  This is used for pages that are marked as secure.
$config['ssl_uploads_url'] = 'https://www.fierceinc.com/uploads';

#------------------------
#Locale/Encoding Settings
#------------------------

#Locale to use for various default date handling functions, etc.  Leaving
#this blank will use the server's default.  This might not be good if the
#site is hosted in a different country than it's intended audience.
$config['locale'] = '';

#In almost all cases, default_encoding should be empty (which defaults to utf-8)
#and admin_encoding should be utf-8.  If you'd like this to be different, change
#both.  Keep in mind, however, that the admin interface translations are all in
#utf-8, and will be converted on the fly to match the admin_encoding.  This
#could seriously slow down the admin interfaces for users.
$config['default_encoding'] = '';
$config['admin_encoding'] = 'utf-8';

#This is a mysql specific option that is generally defaulted to true.  Only
#disable this for backwards compatibility or the use of non utf-8 databases.
$config['set_names'] = false;

# URL of the Admin Panel section of the User Handbook
# Set none if you want hide the link from Error
$config['wiki_url'] = 'http://wiki.cmsmadesimple.org/index.php/User_Handbook/Admin_Panel';

#------------------------
#Miscelaneous Settings
#------------------------

#Add performance information (in the form of an HTML comment) to the
#bottom of all generated pages.  Note, this may cause problems with validation
#or with advanced AJAX requests where only portions of a page are requested.
#This variable just needs to exist, value is irrelevant.
#$config['show_performance_info'] = 'anything';

?>
