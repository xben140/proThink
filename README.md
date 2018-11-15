# iThink


使用之前
==============


> iThink 基于ThinkPHP 5.0开发，前端框架使用hplus
> 
> 如果你是开发者，在使用iThink之前请先阅读ThinkPHP 5.0完全开发手册,确保有一定的ThinkPHP开发经验
> 
> 如果你是仅仅是使用其他开发者开发好的应用搭建web应用(即网站)，那么只需要有运营网站的经验即可
> 
> 设置web站点根目录为public目录，开启web服务器和数据库服务器后访问站点
> 
安装方法
==============

> 将源码上传至web目录
>
> 设置web站点根目录为public目录，开启web服务器和数据库服务器后访问站点
> 

## 目录结构

初始的目录结构如下：

````
www  WEB部署目录（或者子目录）
├─application           应用目录
│  ├─common             公共模块目录（可以更改）
│  ├─module_name        模块目录
│  │  ├─config.php      模块配置文件
│  │  ├─common.php      模块函数文件
│  │  ├─controller      控制器目录
│  │  ├─model           模型目录
│  │  ├─view            视图目录
│  │  └─ ...            更多类库目录
│  │
│  ├─command.php        命令行工具配置文件
│  ├─common.php         公共函数文件
│  ├─config.php         公共配置文件
│  ├─route.php          路由配置文件
│  ├─tags.php           应用行为扩展定义文件
│  └─database.php       数据库配置文件
│
├─public                WEB目录（对外访问目录）
│  ├─index.php          入口文件
│  ├─router.php         快速测试文件
│  └─.htaccess          用于apache的重写
│
├─thinkphp              框架系统目录
│  ├─lang               语言文件目录
│  ├─library            框架类库目录
│  │  ├─think           Think类库包目录
│  │  └─traits          系统Trait目录
│  │
│  ├─tpl                系统模板目录
│  ├─base.php           基础定义文件
│  ├─console.php        控制台入口文件
│  ├─convention.php     框架惯例配置文件
│  ├─helper.php         助手函数文件
│  ├─phpunit.xml        phpunit配置文件
│  └─start.php          框架入口文件
│
├─extend                扩展类库目录
├─runtime               应用的运行时目录（可写，可定制）
├─vendor                第三方类库目录（Composer依赖库）
├─build.php             自动生成定义文件（参考）
├─composer.json         composer 定义文件
├─LICENSE.txt           授权说明文件
├─README.md             README 文件
├─think                 命令行入口文件

````

## 命名规范

ThinkPHP5的命名规范遵循`PSR-2`规范以及`PSR-4`自动加载规范。
