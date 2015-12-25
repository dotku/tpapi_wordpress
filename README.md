# tpapi_wordpress
Wordpress API based on ThinkPHP 5

## 部署说明
1. 安装好 Wordpress  
2. 下载安装 ThinkPHP 5  
3. 把这个整个文件夹都放入到与 WP 独立的位置，如下:

        ├─wordpress
        ├─thinkphp_5.0.0_beta
        │  └─thinkphp
        │      ├─start.php
        │      └─...
        └─tpapi_wordpress
            ├─app
            ├─public
            └─index.php

4. 根据本地部署的修改 /tpapi_wordpress/app/database.php 

## API 文档 (草稿)
- getTable  
URL: `index.php/getTable/$tableName`  
返回某个 Table 的内容，比如 index.php/getTable/post 就获得文章内容，用户则是 index.php/getTable/users

- getDetail  
URL: `index.php/getDetail/?tableName=$tableName&id=$id` 
返回某个 row 的具体信息，比如 index.php/getDetail/?tableName=post&id=1 则返回文章 1 的内容 

- getPostByCate  
URL: `index.php/getPostByCate/cateName` 
返回某个文章分类的内容