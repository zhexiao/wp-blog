# Overview

Wordpress Blog

# Table of Contents  

* [Requirements](#markdown-header-requirements)
* [Dependency Install](#markdown-header-dependency-install)
* [Nginx Server Configuration](#markdown-header-nginx-server-configuration)
* [Wordpress Plugins](#markdown-header-wordpress-plugins)


# Requirements
* Wordpress
* Mysql
* Nginx
* PHP5
* Compass



# Dependency Install

#### Compass install
```shell

# install ruby system
$ sudo apt-get install ruby-full

# install latest rubygem
$ sudo apt-get remove rubygems
$ wget https://rubygems.org/rubygems/rubygems-2.6.8.tgz
$ tar zxf rubygems-2.6.8.tgz 
$ cd rubygems-2.6.8/
$ sudo ruby setup.rb 

# install compass
$ sudo gem install compass

# running compass
$ cd wpb/wp-content/themes/blog
$ compass watch --poll
```

# Nginx Server Configuration

```shell
server
{
    listen 80;
    listen [::]:80;

    root /var/www/html/wpb;
    autoindex on;
    
    # if the css encode has problem, set this config
    sendfile off;

    # Add index.php to the list if you are using PHP
    index index.php index.html index.htm index.nginx-debian.html;

    server_name blog.zhexiao.me;
    location / {
        try_files $uri $uri/ /index.php?q=$uri&$args;
    }

    # Don't log robots.txt or favicon.ico files
    location = /favicon.ico { log_not_found off; access_log off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    if (!-e $request_filename){
        rewrite ^(.+)$ /index.php?q=$1 last;
    }

    # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
    location ~ \.php$ {
       include snippets/fastcgi-php.conf;
       # With php5-fpm:
       fastcgi_pass unix:/var/run/php5-fpm.sock;
       fastcgi_split_path_info ^(.+\.php)(/.+)$;
    }
}

```

```shell
ln -s /etc/nginx/sites-available/wpb wpb
```

# Wordpress Plugins
- [Google XML Sitemaps](https://wordpress.org/plugins/google-sitemap-generator/)
- [Meta Slider](https://wordpress.org/plugins/ml-slider/)
- [TinyMCE Advanced](https://wordpress.org/plugins/tinymce-advanced/)
- [WPFront Scroll Top](https://wordpress.org/plugins/wpfront-scroll-top/)
- [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)
- [Crayon Syntax Highlighter](https://wordpress.org/plugins-wp/crayon-syntax-highlighter/)