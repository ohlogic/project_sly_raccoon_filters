# project_sly_raccoon_filters
Just a creative project name for a few ways to code in PHP.

The intent is to gain a few of Apache's modules functionality features within a project.

The initial purpose is to create code to simulate what mod_sed can do in PHP
as well as PHP interpreting the page.

This then became the idea of a global script that can be a filter to the output 
of any file within a domain name on a web server, and as a bonus, in such a way that 
an individual page dynamically determines where the global script is.
So any page can have the same one line include statement anywhere in a directory structure 
without editing its path to it.

This then eventually grew and derived from the ideas and features of Apache's filters.

The result is filters that modify a page's data that runs at the top of a page 
(this filter runs when the page initially begins), 

and after the page runs though the PHP interpreter, 

a second filter at the bottom of a page (right before the page is sent to the client),
both modify the content of a web page,
that I refer to as pre and post filters.

Another module selected to simulate its functionality is the ext_filter_module to run
a binary as a filter.
Therefore, Python is demonstrated to modify the data of a web page as well.

Note: that index.php is not required and does not need to even be named that.  
It is not a MVC route or anything of the sort, Apache still does routes,routing to subdirectories to an eventual file.
It is simply the basic code to start a page in any subdirectory of a domain name's document root on a web server.