-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: fdb24.awardspace.net
-- Thời gian đã tạo: Th9 02, 2020 lúc 01:23 PM
-- Phiên bản máy phục vụ: 5.7.20-log
-- Phiên bản PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `3266594_tranlight`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attr`
--

CREATE TABLE `attr` (
  `id` int(11) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isslide` smallint(2) DEFAULT NULL,
  `alias` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `isslide`, `alias`) VALUES
(1, '20 KHUYẾN MÃI HOT NHẤT', 1, NULL),
(2, 'Điện thoại nổi bật nhất', 0, NULL),
(3, 'Laptop nổi bật nhất', 0, NULL),
(4, 'Tablet nổi bật nhất', 0, NULL),
(5, 'Phụ kiện giá rẻ', 1, NULL),
(6, 'PHỤ KIỆN CHÍNH HÃNG APPLE', 1, NULL),
(7, 'Đồng hồ nổi bật', 1, NULL),
(8, 'Điện thoại', 0, 'dien-thoai'),
(9, 'Đồng hồ thông minh', 0, 'dong-ho-thong-minh'),
(10, 'Máy tính bảng', 0, 'may-tinh-bang'),
(12, 'Phụ kiện', 0, 'phu-kien'),
(14, 'Laptop', 0, 'laptop'),
(15, 'Loa - Tai nghe', 0, 'loa-tai-nghe'),
(16, 'Nokia đời thấp', 0, 'nokia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_content` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_publish` datetime DEFAULT NULL,
  `post_update` datetime DEFAULT NULL,
  `post_` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_original` float DEFAULT NULL,
  `price_sale` float DEFAULT NULL,
  `alias` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_images` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price_original`, `price_sale`, `alias`, `url_images`, `post_id`) VALUES
(1, 'iPhone 11 Pro Max 256GB', 0, 37990000, '/iphone-11-pro-max-256gb', '/image/iphone-11-pro-max-256gb-green-400x400.jpg', NULL),
(2, 'Samsung Galaxy S10+ (512GB)', 28990000, 22990000, '/samsung-galaxy-s10-512gb', '/image/sieu-pham-galaxy-s-moi-2-512gb-black-400x400.jpg', NULL),
(3, 'OPPO F11 Pro 128GB', 8490000, 7490000, '/oppo-f11-pro-128gb', '/image/oppo-f11-pro-128gb-400x400.jpg', NULL),
(4, 'Samsung Galaxy A50s', 6990000, 6690000, '/samsung-galaxy-a50s', '/image/samsung-galaxy-a50s-green-400x400.jpg', NULL),
(5, 'Xiaomi Redmi Note 8 Pro (6GB/64GB)', 0, 5990000, '/xiaomi-redmi-note-8-pro-6gb64gb', '/image/xiaomi-redmi-note-8-pro-white-18thangbh-400x400.jpg', NULL),
(6, 'OPPO A5 (2020) 128GB', 0, 5290000, '/oppo-a5-2020-128gb', '/image/oppo-a5-2020-128gb-black-400x400.jpg', NULL),
(7, 'Vivo S1', 6990000, 6690000, '/vivo-s1', '/image/vivo-s1-blue-400x400.jpg', NULL),
(8, 'Realme 5 (3GB/64GB)', 0, 3990000, '/realme-5-3gb64gb', '/image/realme-5-blue-400x400.jpg', NULL),
(9, 'iPad 10.2 inch Wifi (2019) 128GB', 0, 11990000, '/ipad-102-inch-wifi-2019-128gb', '/image/ipad-10-2-inch-wifi-128gb-2019-silver-400x400.jpg', NULL),
(10, 'Samsung Galaxy Tab A 10.5 inch', 9490000, 8290000, '/samsung-galaxy-tab-a-105-inch', '/image/samsung-galaxy-tab-a-105-inch-black-400x400.jpg', NULL),
(11, 'Macbook Air 2019 128GB', 28990000, 27990000, '/macbook-air-2019-128gb', '/image/apple-macbook-air-2019-i5-16ghz-8gb-128gb-mvfm2sa-13-32-400x400.jpg', NULL),
(12, 'Asus VivoBook A412FA i5 8265U (EK343T)', 0, 16990000, '/asus-vivobook-a412fa-i5-8265u-ek343t', '/image/asus-a412fa-i5-8265u-8gb-512gb-win10-ek343t-16-1-400x400.jpg', NULL),
(13, 'Lenovo ideapad C340 14IWL i3 8145U (81N4003SVN)', 15490000, 15190000, '/lenovo-ideapad-c340-14iwl-i3-8145u-81n4003svn', '/image/lenovo-ideapad-c340-14iwl-i3-8145u-8gb-256gb-touch-22-400x400.jpg', NULL),
(14, 'Apple Watch S5 44mm viền nh&#244;m d&#226;y cao su', 12990000, 12340000, '/apple-watch-s5-44mm-vien-nh244m-d226y-cao-su', '/image/apple-watch-s5-44mm-vien-nhom-day-cao-su-ava-1-400x400.jpg', NULL),
(15, 'Đồng hồ Nữ Kenneth Cole KC50256003', 2880000, 1468000, '/dong-ho-nu-kenneth-cole-kc50256003', '/image/kenneth-cole-kc50256003-nu-10-400x400.jpg', NULL),
(16, 'Pin sạc dự ph&#242;ng Polymer 10.000 mAh Type C eS', 650000, 422000, '/pin-sac-du-ph242ng-polymer-10000-mah-type-c-esave', '/image/polymer-10000-mah-type-c-esaver-pj-jp106s-avatar-1-400x400.jpg', NULL),
(17, 'Adapter sạc 2 cổng 3.4A Xmobile DS476 Trắng', 250000, 175000, '/adapter-sac-2-cong-34a-xmobile-ds476-trang', '/image/adapter-sac-2-cong-34a-xmobile-ds476-trang-avata-400x400.jpg', NULL),
(18, 'Loa Bluetooth Mozard H8030D Đen', 850000, 680000, '/loa-bluetooth-mozard-h8030d-den', '/image/loa-bluetooth-mozard-h8030d-den-add-1-600x600-1-400x400.jpg', NULL),
(19, 'Tai nghe Bluetooth Pisen LE002+ Đen', 400000, 320000, '/tai-nghe-bluetooth-pisen-le002-den', '/image/tai-nghe-bluetooth-pisen-le002-den-400x400.jpg', NULL),
(20, 'C&#225;p Lightning 1 m e.VALU Spanker B Đỏ Đen', 120000, 61000, '/c225p-lightning-1-m-evalu-spanker-b-do-den', '/image/cap-lightning-1m-evalu-spanker-b-do-den-1-fixx1-400x400.jpg', NULL),
(21, 'Samsung Galaxy Note 10+', 26990000, 23990000, '/samsung-galaxy-note-10', '/image/samsung-galaxy-note-10-plus-ft-2-6.jpg', NULL),
(22, 'Vivo Y19', 0, 4990000, '/vivo-y19', '/image/vivo-y19-white-400x400.jpg', NULL),
(23, 'Samsung Galaxy A70', 9290000, 8790000, '/samsung-galaxy-a70', '/image/samsung-galaxy-a70-white-400x400.jpg', NULL),
(24, 'iPhone 11 64GB', 0, 21990000, '/iphone-11-64gb', '/image/iphone-11-red-400x400.jpg', NULL),
(25, 'OPPO Reno2 F Xanh Tinh V&#226;n', 0, 8990000, '/oppo-reno2-f-xanh-tinh-v226n', '/image/oppo-reno2-f-xanh-tinh-van-ft-2.jpg', NULL),
(26, 'Samsung Galaxy A30s', 0, 6290000, '/samsung-galaxy-a30s', '/image/samsung-galaxy-a30s-green-400x400.jpg', NULL),
(27, 'Xiaomi Redmi 8 (4GB/64GB)', 0, 3590000, '/xiaomi-redmi-8-4gb64gb', '/image/xiaomi-redmi-8-64gb-red-docquyen-400x400.jpg', NULL),
(28, 'OPPO A9 (2020)', 0, 6990000, '/oppo-a9-2020', '/image/oppo-a9-2020-green-1-400x400.jpg', NULL),
(29, 'Acer Swift 3 SF315 52 38YQ i3 8130U (NX.GZBSV.003)', 13490000, 11490000, '/acer-swift-3-sf315-52-38yq-i3-8130u-nxgzbsv003', '/image/acer-swift-sf315-52-38yq-i3-8130u-4gb-1tb-156f-win-20-1.jpg', NULL),
(30, 'Asus VivoBook X509FJ i5 8265U (EJ132T)', 16990000, 16490000, '/asus-vivobook-x509fj-i5-8265u-ej132t', '/image/asus-vivobook-x509fj-i5-8265u-8gb-16gb-1tb-2gb-mx2-17-400x400.jpg', NULL),
(31, 'Acer Aspire A315 54 558R i5 8265U (NX.HEFSV.005)', 0, 12990000, '/acer-aspire-a315-54-558r-i5-8265u-nxhefsv005', '/image/acer-aspire-a315-54-558r-i5-8265u-4gb-1tb-win10-n-18-400x400.jpg', NULL),
(32, 'Asus VivoBook X407UA i3 7020U (BV351T)', 0, 9990000, '/asus-vivobook-x407ua-i3-7020u-bv351t', '/image/asus-x407ua-bv351t-400x400.jpg', NULL),
(33, 'Samsung Galaxy Tab S6', 0, 18490000, '/samsung-galaxy-tab-s6', '/image/samsung-galaxy-tab-s6-ft-2-480x222.jpg', NULL),
(34, 'iPad Wifi 2018 32GB', 0, 8990000, '/ipad-wifi-2018-32gb', '/image/ipad-wifi-32gb-2018-thumb-33397-123-123321-600x600-400x400.jpg', NULL),
(35, 'Samsung Galaxy Tab A8 8" T295 (2019)', 0, 3690000, '/samsung-galaxy-tab-a8-8quot-t295-2019', '/image/samsung-galaxy-tab-a8-t295-2019-silver-400x400.jpg', NULL),
(36, 'Huawei Mediapad T5 10.1"', 0, 5690000, '/huawei-mediapad-t5-101quot', '/image/huawei-mediapad-t5-33397-thumb123-400x400.jpg', NULL),
(37, 'Pin sạc dự ph&#242;ng 19.000 mAh Xmobile Gram 6S T', 980000, 784000, '/pin-sac-du-ph242ng-19000-mah-xmobile-gram-6s-tran', '/image/sac-dtdd-pin-sac-du-phong-19000mah-xmobile-gram-6s-trang-400x400.jpg', NULL),
(38, 'Loa Bluetooth eSaver S12B-2 Đen', 950000, 712000, '/loa-bluetooth-esaver-s12b-2-den', '/image/loa-bluetooth-esaver-s12b-2-den-avatar-2-400x400.jpg', NULL),
(39, 'C&#225;p Lightning MFI 1 m Mbest DS286-WB X&#225;m', 250000, 175000, '/c225p-lightning-mfi-1-m-mbest-ds286-wb-x225m', '/image/cap-lightning-mfi-1m-mbest-ds286-wb-xam-fix1-400x400.jpg', NULL),
(40, 'Thẻ nhớ MicroSD 32 GB Lexar class 10 UHS-I', 0, 300000, '/the-nho-microsd-32-gb-lexar-class-10-uhs-i', '/image/the-nho-microsd-32gb-lexar-class-10-uhs-i-1-400x400.jpg', NULL),
(41, 'Tai nghe Bluetooth Mozard Flex4 Đen Xanh', 350000, 262000, '/tai-nghe-bluetooth-mozard-flex4-den-xanh', '/image/tai-nghe-bluetooth-mozard-flex4-den-xanh-1-600x600-1-400x400.jpg', NULL),
(42, 'USB 3.0 16 GB Sandisk CZ600', 200000, 140000, '/usb-30-16-gb-sandisk-cz600', '/image/usb-30-16gb-sandisk-cz600-1-2-400x400.jpg', NULL),
(43, 'Chuột kh&#244;ng d&#226;y Zadez M325', 200000, 160000, '/chuot-kh244ng-d226y-zadez-m325', '/image/chuot-khong-day-zadez-m325-ava-400x400.jpg', NULL),
(44, 'Ốp lưng Galaxy M20 Nhựa dẻo TPU PRINTING OSMIA CK1', 0, 70000, '/op-lung-galaxy-m20-nhua-deo-tpu-printing-osmia-ck', '/image/op-lung-galaxy-m20-deo-tpu-osmia-ck190301-gau-vang-1-400x400.jpg', NULL),
(45, 'Gậy chụp ảnh Mini Cosano CW1', 0, 50000, '/gay-chup-anh-mini-cosano-cw1', '/image/gay-chup-anh-mini-cosano-cw1-ava-400x400.jpg', NULL),
(46, 'K&#237;nh thực tế ảo Samsung Gear VR3', 0, 2490000, '/k237nh-thuc-te-ao-samsung-gear-vr3', '/image/kinh-thuc-te-ao-samsung-gear-vr-sm-r325-2-400x400.jpg', NULL),
(47, 'Miếng d&#225;n m&#224;n h&#236;nh Oppo Reno 2F', 0, 50000, '/mieng-d225n-m224n-h236nh-oppo-reno-2f', '/image/mieng-dan-man-hinh-oppo-reno-2f-ava-2-400x400.jpg', NULL),
(48, 'Đ&#232;n Led chụp ảnh Osmia MS-001', 200000, 120000, '/d232n-led-chup-anh-osmia-ms-001', '/image/den-led-chup-anh-osmia-ms-001-ava-400x400.jpg', NULL),
(49, 'Ốp lưng MTB Tab A6 7 inch T285 Nắp gập Stand Flip ', 0, 250000, '/op-lung-mtb-tab-a6-7-inch-t285-nap-gap-stand-flip', '/image/op-lung-tab-a6-7-inch-t285-gap-stand-flip-meeker-avatar-1-400x400.jpg', NULL),
(50, 'USB Wifi 150Mbps Totolink N150USM Trắng', 0, 140000, '/usb-wifi-150mbps-totolink-n150usm-trang', '/image/usb-wifi-150-mbps-totolink-n150usm-trang-1-1-400x400.jpg', NULL),
(51, 'HP 19KA 18.5 inch HD (T3U82AA)', 0, 1690000, '/hp-19ka-185-inch-hd-t3u82aa', '/image/hp-19ka-185-inch-hd-t3u82aa-400x400.jpg', NULL),
(52, 'Tai nghe Bluetooth sạc kh&#244;ng d&#226;y AirPods', 0, 6490000, '/tai-nghe-bluetooth-sac-kh244ng-d226y-airpods-2-ap', '/image/tai-nghe-bluetooth-airpods-2-wireless-charge-mrxj2-avatar-1-400x400.jpg', NULL),
(53, 'Tai nghe Bluetooth AirPods 2 Apple MV7N2 Trắng', 0, 5490000, '/tai-nghe-bluetooth-airpods-2-apple-mv7n2-trang', '/image/tai-nghe-bluetooth-airpods-2-apple-mv7n2-trang-avatar-1-400x400.jpg', NULL),
(54, 'Tai nghe nh&#233;t trong EarPods Lightning Apple M', 0, 790000, '/tai-nghe-nh233t-trong-earpods-lightning-apple-mmt', '/image/tai-nghe-earpods-cong-lightning-apple-mmtn2-1-1-400x400.jpg', NULL),
(55, 'Adapter sạc kh&#244;ng d&#226;y Apple Watch MU9K2 ', 0, 790000, '/adapter-sac-kh244ng-d226y-apple-watch-mu9k2-trang', '/image/adapter-sac-apple-watch-magnetic-type-c-30cm-apple-avatar-400x400.jpg', NULL),
(56, 'Adapter Sạc 85W Apple Macbook Pro MC556 Trắng', 0, 2790000, '/adapter-sac-85w-apple-macbook-pro-mc556-trang', '/image/adapter-sac-macbook-pro-15-inch-17-inch-magsafe-85-3-400x400.jpg', NULL),
(57, 'C&#225;p Lightning 1 m Apple MQUE2 Trắng', 0, 490000, '/c225p-lightning-1-m-apple-mque2-trang', '/image/cap-lightning-1m-apple-mque2-trang-1-1-400x400.jpg', NULL),
(58, 'C&#225;p chuyển đổi Type-C sang 3.5mm Apple MU7E2 ', 0, 300000, '/c225p-chuyen-doi-type-c-sang-35mm-apple-mu7e2-tra', '/image/cap-chuyen-doi-type-c-sang-35mm-apple-mu7e2-trang-5-400x400.jpg', NULL),
(59, 'Chuột Bluetooth Apple MLA02 Trắng', 0, 2490000, '/chuot-bluetooth-apple-mla02-trang', '/image/chuot-bluetooth-apple-mla02-trang-avatar-400x400.jpg', NULL),
(60, 'B&#250;t cảm ứng Apple Pencil', 0, 2990000, '/b250t-cam-ung-apple-pencil', '/image/apple-pencil-2-1-400x400.jpg', NULL),
(61, 'Đồng hồ th&#244;ng minh Samsung Galaxy Watch Activ', 7990000, 7590000, '/dong-ho-th244ng-minh-samsung-galaxy-watch-active-', '/image/samsung-galaxy-watch-active-2-44-mm-sillicon-ava-400x400.jpg', NULL),
(62, 'Đồng hồ Nam Orient RA-AG0027Y10B - Cơ tự động', 8440000, 6752000, '/dong-ho-nam-orient-ra-ag0027y10b-co-tu-dong', '/image/dong-ho-nam-orient-ra-ag0027y10b-0-400x400.jpg', NULL),
(63, 'Đồng hồ Nam ICE 015773', 3000000, 2400000, '/dong-ho-nam-ice-015773', '/image/ice-015773-nam-0-400x400.jpg', NULL),
(64, 'Fossil ES3843', 0, 3110000, '/fossil-es3843', '/image/fossil-es3843-xanh-den-400x400.jpg', NULL),
(65, 'Đồng hồ Nữ Michael Kors MK2747', 4050000, 3240000, '/dong-ho-nu-michael-kors-mk2747', '/image/michael-kors-mk2747-den-1-400x400.jpg', NULL),
(66, 'Casio LRW-200H-1EVDF', 0, 776000, '/casio-lrw-200h-1evdf', '/image/casio-lrw-200h-1evdf-trang-400x400.jpg', NULL),
(67, 'Fossil ES4377', 3380000, 2061000, '/fossil-es4377', '/image/fossil-es4377-xam-0-400x400.jpg', NULL),
(68, 'Casio LTP-1215A-1ADF', 0, 987000, '/casio-ltp-1215a-1adf', '/image/casio-ltp-1215a-1adf-bac-4-400x400.jpg', NULL),
(69, 'Michael Kors MK2734', 4050000, 3240000, '/michael-kors-mk2734', '/image/michael-kors-mk2734-nau-400x400.jpg', NULL),
(70, 'Đồng hồ Nữ Citizen EU6010-53E trắng', 3000000, 2400000, '/dong-ho-nu-citizen-eu6010-53e-trang', '/image/citizen-eu6010-53e-trang-2-400x400.jpg', NULL),
(71, 'Casio LTP-1191A-7ADF', 0, 1034000, '/casio-ltp-1191a-7adf', '/image/casio-ltp-1191a-7adf-bac-4-400x400.jpg', NULL),
(72, 'Michael Kors MK3298', 6080000, 4864000, '/michael-kors-mk3298', '/image/michael-kors-mk3298-vang-hong-0-400x400.jpg', NULL),
(73, 'Michael Kors MK3900', 6760000, 5408000, '/michael-kors-mk3900', '/image/michael-kors-mk3900-bac-400x400.jpg', NULL),
(74, 'Đồng hồ Nữ Kenneth Cole KC50198001', 2880000, 2304000, '/dong-ho-nu-kenneth-cole-kc50198001', '/image/kenneth-cole-kc50198001-nu-400x400.jpg', NULL),
(75, 'Đồng hồ Nữ MVMT D-MB01-RGBL', 3300000, 2640000, '/dong-ho-nu-mvmt-d-mb01-rgbl', '/image/mvmt-d-mb01-rgbl-den-400x400.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attr`
--

CREATE TABLE `product_attr` (
  `product_id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_alias` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`, `is_alias`) VALUES
(1, 1, '0'),
(2, 1, '0'),
(3, 1, '0'),
(4, 1, '0'),
(5, 1, '0'),
(6, 1, '0'),
(7, 1, '0'),
(8, 1, '0'),
(9, 1, '0'),
(10, 1, '0'),
(11, 1, '0'),
(12, 1, '0'),
(13, 1, '0'),
(14, 1, '0'),
(15, 1, '0'),
(16, 1, '0'),
(17, 1, '0'),
(18, 1, '0'),
(19, 1, '0'),
(20, 1, '0'),
(21, 2, '0'),
(22, 2, '0'),
(23, 2, '0'),
(24, 2, '0'),
(25, 2, '0'),
(26, 2, '0'),
(27, 2, '0'),
(28, 2, '0'),
(29, 3, '0'),
(30, 3, '0'),
(31, 3, '0'),
(32, 3, '0'),
(33, 4, '0'),
(34, 4, '0'),
(35, 4, '0'),
(36, 4, '0'),
(37, 5, '0'),
(38, 5, '0'),
(39, 5, '0'),
(40, 5, '0'),
(41, 5, '0'),
(42, 5, '0'),
(43, 5, '0'),
(44, 5, '0'),
(45, 5, '0'),
(46, 5, '0'),
(47, 5, '0'),
(48, 5, '0'),
(49, 5, '0'),
(50, 5, '0'),
(51, 5, '0'),
(52, 6, '0'),
(53, 6, '0'),
(54, 6, '0'),
(55, 6, '0'),
(56, 6, '0'),
(57, 6, '0'),
(58, 6, '0'),
(59, 6, '0'),
(60, 6, '0'),
(61, 7, '0'),
(62, 7, '0'),
(63, 7, '0'),
(64, 7, '0'),
(65, 7, '0'),
(66, 7, '0'),
(67, 7, '0'),
(68, 7, '0'),
(69, 7, '0'),
(70, 7, '0'),
(71, 7, '0'),
(72, 7, '0'),
(73, 7, '0'),
(74, 7, '0'),
(75, 7, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` bit(1) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attr`
--
ALTER TABLE `attr`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_product` (`product_id`),
  ADD KEY `FK_comment_user` (`user_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_product_post` (`post_id`);

--
-- Chỉ mục cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  ADD PRIMARY KEY (`attr_id`,`product_id`),
  ADD KEY `FK_product_attr_product` (`product_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `FK_product_category_category` (`category_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attr`
--
ALTER TABLE `attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_post` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_attr`
--
ALTER TABLE `product_attr`
  ADD CONSTRAINT `FK_product_attr_attr` FOREIGN KEY (`attr_id`) REFERENCES `attr` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_product_attr_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `FK_product_category_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_product_category_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
