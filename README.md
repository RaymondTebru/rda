#Introduction

RadioDjAdmin is a webinterface for the musicdatabase of the free RadioDJ Radio Automation which can be found at www.radiodj.ro. Currently it is still in development and in Alpha status. 

#Important!

This is work in progress. It hasn't been finished yet, and is in early alpha status! Not everything will work as expected, and you use this software completely at your own risk. One important thing to know right now is that the songlist doesn't have pagination yet (it doesn't split up your musicdatabase into multiple pages, but everything comes on one page). If you have 3000 songs in your database, you're probably ok, but if you got 30.000 in it, it'll probably be too much. 

#Installation

Download the files from github, and upload them to your webbrowser. Make sure you protect the directory from being accessed from the internet. There is no authentication required to use the webinterface so therefore anyone who can access RadioDjAdmin, can control your database! Use htaccess or htpassword to protect it with a password, or make sure it can't be reached from the internet. 

#Config

Go to the includes directory, and open up config.php. On the second line of the file you can set your timezone. If you live in The Netherlands it's easy, because then it's already set. Else, you can find a list of supported timezones on: http://php.net/manual/en/timezones.php

On Lines 4 to 7 you'll find the details to enter to access your mysql database. 

When you edited the file, you can open up songlist.php in your browser, and see the songs in your database. 

# Todo list
* Show introtimes on songlist.php
* Build pagination on songlist.php, including search options

