# PHP_DDD
基于laravel框架的PHP DDD架构插件
# 安装
```
composer require jamespi/php-laravel-ddd dev-master
```
在config/app.php中providers数组中增加ServiceProvider配置
```
Jamespi\LaravelDdd\LaravelDddServiceProvider::class,
```
访问首页后自动触发注册服务进行目录生成更新
# 使用

> 创建代码类文件命令  
````
# 接口层
/**
 * laravel-ddd:接口层command命令名称(由插件系统定义)
 * TestLogic创建类文件名称(自定义)
 * Facade：文件生成在接口层Interface的Facade目录下(根据系统生成目录名称填写)
 */
php artisan laravel-ddd TestLogic --project=Facade
php artisan laravel-ddd TestDto --project=Dto
php artisan laravel-ddd TestAssembler --project=Assembler

# 应用层
php artisan laravel-app-ddd AppServicesLogic --project=Services

# 领域层

# 基础层

````


ddd领域驱动模型思想架构图：  
![image](https://github.com/jamespjz/php-laravel-ddd/blob/main/ddd.jpg)

最终生成领域目录和文件如下图所示：
````
├── app                     // 代码目录
│ ├── Interface             // 接口层目录
│ │ ├── Assembler           // 实现前端传输数据到后端的载体DTO和DO领域对象的转换
│ │ ├── Dto                 // 前端传输数据到后端的载体，不实现任何业务逻辑
│ │ ├── Facade              // 封装应用服务，提供粗粒度的调用接口
│ ├── Application           // 应用层目录
│ │ ├── Assembler           // 实现前端传输数据到后端的载体DTO和DO领域对象的转换
│ │ ├── Dto                 // 前端传输数据到后端的载体，不实现任何业务逻辑
│ │ ├── Event               // 前端传输数据到后端的载体，不实现任何业务逻辑
│ │ ├── Service             // 应用服务，对多个领域服务和外部微服务调用的封装，编排和组合，对用户接口层提供流程上的核心业务逻辑
│ ├── Domain                // 领域层目录
│ │ ├── Entity              // 存放聚合根，实体和值对象
│ │ ├── Repository          // 个聚合只能有一个仓储，仓储一般包含仓储接口和仓储实现。同事仓储还会有DAO代码的具体实现
│ │ │ ├── ArticleRepository.php
│ │ ├── Service             // 存放跨聚合编排的领域服务，以及PO和DO转换和初始化用的工厂
│ ├── Infrastructure          // 基础层目录
````