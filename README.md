# tpapi_wordpress
Wordpress API based on ThinkPHP 5

## 使用方法
1. 安装好 Wordpress  
2. 下载安装 ThinkPHP 5  
3. 把这个整个文件夹都放入到与 WP 独立的位置，如下:

        ├─wordpress
        ├─thinkphp_5.0.0_beta
        │  └─thinkphp
        │      ├─start.php
        │      ├─...
        └─tpapi_wordpress
            ├─app
            ├─public
            └─index.php

4. 根据本地部署的修改 /tpapi_wordpress/app/database.php 