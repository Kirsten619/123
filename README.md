通讯录管理系统
概述
这是一个简单的通讯录管理系统，使用户能够添加、编辑、删除和查看联系人信息。该系统使用 PHP 和 MySQL 构建，前端使用 HTML 和 JavaScript 来与后端交互。

功能
添加联系人：能够输入姓名、手机号、归属地和备注并保存到数据库。
编辑联系人：选择已有联系人进行信息修改。
删除联系人：删除保存的联系人。
查看联系人：以表格的形式列出所有联系人信息。
技术栈
前端: HTML, CSS, JavaScript
后端: PHP
数据库: MySQL
环境设置
先决条件
确保你的环境中已安装以下软件：

PHP (>= 7.0)
MySQL (>= 5.7)
Web 服务器 (如 Apache 或 Nginx)
数据库设置
创建一个名为 contacts 的数据库。
创建一个名为 contacts 的表，包含以下字段：
sql

Copy code
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    姓名 VARCHAR(255) NOT NULL,
    手机号 VARCHAR(50) NOT NULL,
    归属地 VARCHAR(100),
    备注 TEXT
);
