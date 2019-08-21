CREATE TABLE `blog_category` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(50) NOT NULL DEFAULT 'empty',
  `cate_title` varchar(100) NOT NULL DEFAULT 'empty' COMMENT '分類說明',
  `cate_keyword` varchar(50) DEFAULT NULL,
  `cate_description` varchar(100) DEFAULT NULL,
  `cate_view` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cate_order` tinyint(4) NOT NULL DEFAULT '0',
  `cate_pid` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '父級id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

truncate table blog_category;

insert into blog_category(cate_name, cate_title, cate_order)values
('新聞', '蒐集國內外最熱門的新聞資訊',1),
('體育', '發展體育事業, 增強國民體質', 2),
('娛樂', '人人都有自己的娛樂圈',3);

delete from blog_category where cate_id > 3;

insert into blog_category(cate_name, cate_title, cate_order, cate_pid)values
('熱門新聞', '最新新聞資訊',1,1),
('軍事新聞', '最新軍事新聞', 2, 1),
('體育彩票', '體育彩票管理中心', 1, 2),
('奇摩體育', '最專業的體育賽事平台', 2, 2),
('MSN體育', '人氣最旺的體育平台', 3, 2);

create table blog_article(
	art_id int UNSIGNED not null auto_increment primary key,
	cate_id int unsigned not null default '0',
	art_title varchar(100) default null,
	art_tag 
)engine myisam charset utf8;



