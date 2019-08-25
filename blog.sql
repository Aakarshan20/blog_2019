-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 
-- 伺服器版本: 10.1.13-MariaDB
-- PHP 版本： 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `blog`
--

-- --------------------------------------------------------

--
-- 資料表結構 `blog_article`
--

CREATE TABLE `blog_article` (
  `art_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '分類id',
  `art_title` varchar(100) DEFAULT NULL COMMENT '標題',
  `art_tag` varchar(100) DEFAULT NULL COMMENT '關鍵詞',
  `art_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `art_thumb` varchar(255) DEFAULT NULL COMMENT '縮圖',
  `art_content` text COMMENT '文章內容',
  `art_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '發布時間',
  `art_editor` varchar(50) DEFAULT NULL COMMENT '發布人',
  `art_view` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '觀看次數'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `blog_article`
--

INSERT INTO `blog_article` (`art_id`, `cate_id`, `art_title`, `art_tag`, `art_description`, `art_thumb`, `art_content`, `art_time`, `art_editor`, `art_view`) VALUES
(1, 4, '政壇震撼彈！林飛帆下週一出任民進黨副秘書長！', '民進黨', '政壇震撼彈！今（13）日知情人士爆料，太陽花學運領袖林飛帆將接任民進黨副秘書長。 人事案將於15日發佈，林飛帆也預計將於同日上任。民進黨秘書長羅文嘉對此僅表示，任何人事只有經最後確認才能對外發布。', 'uploads/20190714003008908.jpg', '<p>林飛帆現年31歲，畢業於成功大學政治學系、台灣大學政治學研究所系。2014年因太陽花學運名聲大噪；2017年結婚後便赴英倫敦政經學院攻讀碩士，短暫的淡出台灣媒體視線，隨後於2018年底畢業返台。</p><p><br/></p><p>根據中央社引述知情人士，民進黨副秘書長徐佳青1124原想隨時任黨主席蔡英文的辭職而離開黨職，後被挽留處理立委補選。當時就傳出羅文嘉曾探詢林飛帆意願，但林飛帆考量到與時代力量的關係，因此婉拒。經羅文嘉和黨主席卓榮泰幾個月的持續聯繫，林飛帆最終同意加入民進黨。</p><p><br/></p><p>事實上，今年新北市三重立委補選時，林飛帆表態挺余天，民進黨總統初選期間，林飛帆也表態挺蔡，較近期的政治活動還有公開挺「反送中」群眾一事。</p><p><br/></p><p>據悉，總統蔡英文、總統府秘書長陳菊最近已和林飛帆會過面，樂見林飛帆加入民進黨。</p><p><br/></p>', '2019-07-13 16:32:58', '新頭殼newtalk |黃子暘 台北市報導', 0),
(3, 10, '利菁道歉了！孫協志夏宇童交往神逆轉', '孫協志 夏宇童 利菁', '孫協志與夏宇童近日爆出秘戀，雙方接透過經紀人否認，回應僅是朋友，但利菁卻直接揭露兩人交往的證據，還直喊兩人恭喜，「其實我懷疑很久了，只是秘而不宣，因為太明顯了」，怎料，孫協志找到第二春才兩天，戀情卻出現逆轉，利菁出面道歉，坦言一切都是誤會。', 'uploads/20190714102027336.jpg', '<p>利菁今日在臉書表示，經網友提醒才發現，「童孫戀」好像是被爆料，雙方並沒有公開，得知真相的她忐忑了一天，手機遊戲的盟友們也無人提及此事，讓她越感愧疚。利菁透露，爆料當天剛好是第四場錄影，就聽到李懿和大根在分享消息，她一心認為是家有喜事，於是錄完影便迫不及待道賀，「好啦！2位是我誤會了！我認錯」。</p><p><br/></p><p>利菁道歉完後表示，孫協志和夏宇童如果是真交往但不想公開，希望不要因為她而斬斷戀情，喊話「請繼續！別斷」，相反的，如果戀情真的只是烏龍爆料，那她就會去找李懿跟大根算帳，因為一切由他們而起。不過利菁也放話「你們讓我道完歉後去結婚，老娘就一毛不包純祝福」，只希望兩人趕快告訴她真相，不要讓她再愧疚下去，承諾未來有好結局，「結婚我包大紅包」。</p>', '2019-07-14 02:22:59', '三立新聞網', 0),
(4, 7, '世大運／曾俊欣男單逆轉奪金 台灣史上第3人', '世大運', '2019年拿坡里世大運網球男單決賽，我國「夜市球王」曾俊欣面對烏茲別克好手Khumoyun Sultanov，在經過3盤的大戰後，艱辛的逆轉以6:7(4)、6:3、6:1奪冠，成為台灣史上第3位曾在世大運單打項目奪冠的男子網球員。', 'uploads/20190714104702621.jpg', '<p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">曾俊欣此役首盤就陷入苦戰，雖然一度破發取得5:3領先，但之後被對手逼進搶七，並且以4:7讓出；不過他從第2盤開始重整旗鼓，在3:3平手之後連拿3局，將盤數給扳平。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm"><br/></p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">決勝盤，曾俊欣沒有再給對手機會，開局就打出3:0的領先，並且隨後又再度破掉Sultanov的發球局，最終以6:1強勢取勝。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm"><br/></p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">上一屆台北世大運新任「台灣一哥」莊吉生不負眾望，幫地主留下了一面金牌，而在2003年的大邱世大運時，盧彥勳也曾摘金成功，曾俊欣今天追隨兩位前輩之後奪冠，也讓人不禁看好他的未來。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm"><br/></p><p><br/></p>', '2019-07-14 02:47:36', '[今日新聞NOWnews] 今日新聞NOWnews', 0),
(5, 9, '純網銀來了…傳統銀行備戰 推高利數位帳戶搶客', '網銀', '兩張純網銀執照花落誰家即將於本月底出爐，金管會主委顧立雄希望「純網銀」發揮鯰魚效應，傳統銀行面臨全新挑戰。不少銀行推出數位帳戶應戰，以數位化、便利性來吸引年輕人的目光，並陸續結合理財、匯兌、信用卡及電子支付等功能，進行搶客大作戰。', 'uploads/20190714104841945.jpg', '<p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">根據金管會統計，截至去年底，共有廿五家國銀提供民眾透過網路開辦數位存款帳戶，整體開戶數突破一五○萬戶，戶數最多是台新銀行的Richart達到七十七點三萬戶，市占率高達五成，其次是王道銀行O-Bank約卅一點五萬戶。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">數位帳戶基本上分成三類，第一類是新客戶透過自然人憑證在線上開戶，能做的業務最多；第二類是已經開戶的既有客戶在網路加開數位帳戶；第三類是他行存款或信用卡客戶，或是自家銀行的信用卡客戶線上加開數位帳戶。根據銀行局統計，目前第一類帳戶開戶數最多。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">金管會表示，數位存款帳戶的最大優點，在於民眾開戶不用親自到銀行臨櫃，就可以透過網路完成帳戶的開設。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">根據央行統計，今年第一季國銀存款加權平均利率僅百分之○點五六。銀行為推廣數位帳戶，紛紛推出年利率皆在百分之一至一點二的優惠高利活儲方案，如兆豐、一銀、王道銀行等，皆提供年利率百分之一點二的高利活儲。另外，銀行業者還提供數位帳戶專屬的跨行轉帳或理財手續費減免等優惠。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">不過，許多人開了數位帳戶後，只是呆呆存錢，其他貸款、轉帳、匯兌、信託投資、行動支付、理財投資等應用卻很少，若未來經營成本較低的純網銀祭出更優惠的存款利率，傳統銀行的數位帳戶恐怕就會被殺個片甲不留。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">台灣金融研訓院金融研究所分析師賴思如分析，檢視目前國銀所推出的數位帳戶，較能夠有效提高金融消費者黏著度的四個重點應包括：帳戶起息門檻、帳戶每月計息方案、帳戶提供的跨行轉帳及提款免手續費優惠，以及結合記帳的多元功能。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">例如，台新銀行Richart數位銀行APP就有「帳務分析」功能，除了分析消費狀況外，當月花費超過以往平均會特別提醒，幫助用戶妥善管理帳務，也會提供理財小建議。</p><p class="canvas-atom canvas-text Mb(1.0em) Mb(0)--sm Mt(0.8em)--sm">賴思如建議，傳統銀行數位帳戶應擴充手機APP及網路平台功能，結合年輕人經常使用記帳軟體，將生活記帳簿與行動支付、信用卡及現金消費紀錄統計功能與數位帳戶連通，以便利多元的功能提升客群黏著度，並透過資金使用情形進一步分析客戶的資金使用習慣，以規畫專屬理財模式，培養客戶透過數位帳戶投資的習慣。</p><p><br/></p>', '2019-07-14 02:49:03', '記者沈婉玉／台北報導', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_blog_test`
--

CREATE TABLE `blog_blog_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `blog_category`
--

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

--
-- 資料表的匯出資料 `blog_category`
--

INSERT INTO `blog_category` (`cate_id`, `cate_name`, `cate_title`, `cate_keyword`, `cate_description`, `cate_view`, `cate_order`, `cate_pid`) VALUES
(1, '新聞', '蒐集國內外最熱門的新聞資訊', NULL, NULL, 0, 1, 0),
(3, '娛樂', '人人都有自己的娛樂圈', NULL, NULL, 0, 3, 0),
(4, '熱門新聞', '最新新聞資訊', NULL, NULL, 0, 4, 1),
(5, '軍事新聞', '最新軍事新聞', NULL, NULL, 0, 4, 1),
(6, '體育彩票', '體育彩票管理中心', '123', '123', 0, 1, 22),
(7, '奇摩體育', '最專業的體育賽事平台', NULL, NULL, 0, 3, 22),
(8, 'MSN體育', '人氣最旺的體育平台', NULL, NULL, 0, 2, 22),
(9, '財經', '財經大小事', NULL, NULL, 0, 7, 0),
(10, 'MSN娛樂', '最熱門娛樂資訊', NULL, NULL, 0, 4, 3),
(11, '娛樂風向標', '蒐集最熱門的娛樂動向', '娛樂, 娛樂圈', '蒐集最熱門的娛樂動向', 0, 3, 3),
(22, '體育', '提升國民體質', NULL, NULL, 0, 3, 0),
(19, '333', '333', NULL, NULL, 0, 13, 0),
(18, '222', '222', NULL, NULL, 0, 12, 0),
(20, '4444', '444', NULL, NULL, 0, 11, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_config`
--

CREATE TABLE `blog_config` (
  `conf_id` int(10) UNSIGNED NOT NULL,
  `conf_title` varchar(50) DEFAULT NULL COMMENT '???D',
  `conf_name` varchar(50) DEFAULT NULL COMMENT '?ܶq?W',
  `conf_content` text COMMENT '?ܶq???e',
  `conf_order` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '?Ƨ?',
  `conf_tips` varchar(255) DEFAULT NULL COMMENT '?y?z',
  `field_type` varchar(50) DEFAULT NULL COMMENT '?r?q????',
  `field_value` varchar(255) DEFAULT NULL COMMENT '?r?q??????'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `blog_config`
--

INSERT INTO `blog_config` (`conf_id`, `conf_title`, `conf_name`, `conf_content`, `conf_order`, `conf_tips`, `field_type`, `field_value`) VALUES
(1, 'test title', 'test name', 'test content', 3, 'test tips', 'input', 'field value'),
(4, 'test5', 'test6', NULL, 0, NULL, 'radio', 'test8'),
(5, '???????D', 'web_title', NULL, 1, '?????j???Ƽ??D', 'input', NULL),
(6, '?έp?N?X', 'web_count', NULL, 4, '?????X?ݲέp', 'textarea', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_links`
--

CREATE TABLE `blog_links` (
  `link_id` int(10) UNSIGNED NOT NULL,
  `link_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' ,
  `link_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' ,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' ,
  `link_order` int(11) NOT NULL DEFAULT '0' 
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `blog_links`
--

INSERT INTO `blog_links` (`link_id`, `link_name`, `link_title`, `link_url`, `link_order`) VALUES
(1, 'google', '搜尋引擎', 'http://www.google.com.tw', 1),
(2, 'youtube', '影片網站', 'http://www.youtube.com.tw', 2),
(3, 'yahoo', '入口網站', 'http://www.yahoo.com.tw', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_migrations`
--

CREATE TABLE `blog_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `blog_migrations`
--

INSERT INTO `blog_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_15_152944_create_test_table', 1),
(4, '2019_06_15_161536_rename_test_table', 1),
(5, '2019_06_15_162345_modify_test_table', 1),
(6, '2019_06_15_165434_create_blog_test_table', 2),
(7, '2019_06_15_165609_create_test_table', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_navs`
--

CREATE TABLE `blog_navs` (
  `nav_id` int(10) UNSIGNED NOT NULL,
  `nav_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '//?ͱ??ɯ??W??',
  `nav_alias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '?O?W',
  `nav_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '//?ͱ??ɯ????}',
  `nav_order` int(11) NOT NULL DEFAULT '0' COMMENT '//?ͱ??ɯ??Ƨ?'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `blog_navs`
--

INSERT INTO `blog_navs` (`nav_id`, `nav_name`, `nav_alias`, `nav_url`, `nav_order`) VALUES
(1, '??????', 'about me', '123', 3),
(3, '?s?D', 'news', 'new.com', 1),
(5, '?׾?', 'forum', 'http://bbs.test.com.tw', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `blog_password_resets`
--

CREATE TABLE `blog_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `blog_test`
--

CREATE TABLE `blog_test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `blog_test`
--

INSERT INTO `blog_test` (`id`, `name`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'sycO0swW1e', '7KfGYcntKB@gmail.com', '', NULL, NULL),
(2, 'XhJUmj5Xem', 'BQNFM91nUP@gmail.com', '', '2019-06-14 16:00:00', '2019-06-14 16:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `blog_user`
--

CREATE TABLE `blog_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `blog_user`
--

INSERT INTO `blog_user` (`user_id`, `user_name`, `user_pass`) VALUES
(1, 'admin', 'eyJpdiI6IjRTdGdpVGF3Rzk2ZW93V1wvNmltZFJ3PT0iLCJ2YWx1ZSI6IlE1d1l0cmo2bFdJRVd6cmllNncwMmc9PSIsIm1hYyI6ImQ0NzI5YmRhYTMwY2EyNzRjNzE5YTRjNjY3MGM0YzRjYmQ2NGNjODcwOTk1ZjNlMmVlNTlmMzIzYTQ5NGJiOWEifQ==');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2019_06_15_152944_create_test_table', 1),
(8, '2019_06_15_161536_rename_test_table', 2),
(9, '2019_06_15_162345_modify_test_table', 3),
(10, '2019_06_15_163200_modify_test_table', 4),
(11, '2019_06_15_164342_modify_test_table', 5),
(12, '2019_06_15_164547_modify_test_table', 6);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `amount` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `blog_article`
--
ALTER TABLE `blog_article`
  ADD PRIMARY KEY (`art_id`);

--
-- 資料表索引 `blog_blog_test`
--
ALTER TABLE `blog_blog_test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- 資料表索引 `blog_config`
--
ALTER TABLE `blog_config`
  ADD PRIMARY KEY (`conf_id`);

--
-- 資料表索引 `blog_links`
--
ALTER TABLE `blog_links`
  ADD PRIMARY KEY (`link_id`);

--
-- 資料表索引 `blog_migrations`
--
ALTER TABLE `blog_migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `blog_navs`
--
ALTER TABLE `blog_navs`
  ADD PRIMARY KEY (`nav_id`);

--
-- 資料表索引 `blog_password_resets`
--
ALTER TABLE `blog_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `blog_test`
--
ALTER TABLE `blog_test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `blog_user`
--
ALTER TABLE `blog_user`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `blog_article`
--
ALTER TABLE `blog_article`
  MODIFY `art_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `blog_blog_test`
--
ALTER TABLE `blog_blog_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用資料表 AUTO_INCREMENT `blog_config`
--
ALTER TABLE `blog_config`
  MODIFY `conf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `blog_links`
--
ALTER TABLE `blog_links`
  MODIFY `link_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `blog_migrations`
--
ALTER TABLE `blog_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用資料表 AUTO_INCREMENT `blog_navs`
--
ALTER TABLE `blog_navs`
  MODIFY `nav_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用資料表 AUTO_INCREMENT `blog_test`
--
ALTER TABLE `blog_test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用資料表 AUTO_INCREMENT `blog_user`
--
ALTER TABLE `blog_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用資料表 AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
