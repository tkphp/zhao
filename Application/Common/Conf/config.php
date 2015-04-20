<?php
return array(
	//'配置项'=>'配置值'
    // 显示页面Trace信息
    'SHOW_PAGE_TRACE' => true,
    //数据库配置信息
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'zhao', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '123456', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'zh_', // 数据库表前缀
    // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'web_zhaobei@163.com',//你的邮箱名
    'MAIL_FROM' =>'web_zhaobei@163.com',//发件人地址
    'MAIL_FROMNAME'=>'赵贝',//发件人姓名
    'MAIL_PASSWORD' =>'zb18238827991',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件
    
    'URL_MODEL'=>2,

);
