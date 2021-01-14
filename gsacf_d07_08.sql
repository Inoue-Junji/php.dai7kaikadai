-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 1 月 14 日 14:16
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d07_08`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `result_table`
--

CREATE TABLE `result_table` (
  `id` int(12) NOT NULL,
  `date` date NOT NULL,
  `result` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `starter` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `memo` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `result_table`
--

INSERT INTO `result_table` (`id`, `date`, `result`, `score`, `starter`, `memo`) VALUES
(2, '2020-12-25', '引き分け', '0-0', '則本', 'チャンスで１本出ず'),
(3, '2020-12-25', '負け', '0-2', '田嶋', '失投で２失点'),
(4, '2020-12-25', '勝ち', '4-0', '千賀', '１安打完封'),
(5, '2020-12-25', '勝ち', '2-1', '山岡', 'ピンチ招くも切り抜ける'),
(6, '2020-12-26', '勝ち', '5-3', '山本', '松田のサヨナラ２ランで勝利');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(2, 'マリーンズ', '2020-12-21', '2020-12-19 16:06:04', '2020-12-19 16:06:04'),
(3, 'ライオンズ', '2020-12-22', '2020-12-19 16:06:51', '2020-12-19 16:06:51'),
(4, 'イーグルス', '2020-12-23', '2020-12-19 16:07:18', '2020-12-19 16:07:18'),
(5, 'ファイターズ', '2020-12-24', '2020-12-19 16:08:24', '2020-12-19 16:08:24'),
(6, 'ジャイアンツ', '2020-12-25', '2020-12-19 16:09:28', '2020-12-19 16:09:28'),
(7, 'タイガース', '2020-12-26', '2020-12-19 16:10:08', '2020-12-19 16:10:08'),
(8, 'ドラゴンズ', '2020-12-27', '2020-12-19 16:11:04', '2020-12-19 16:11:04'),
(9, 'カープ', '2020-12-28', '2020-12-19 16:12:05', '2020-12-19 16:12:05'),
(10, 'スワローズ', '2020-12-29', '2020-12-19 16:12:47', '2020-12-19 16:12:47'),
(11, 'ベイスターズ', '2020-12-30', '2020-12-19 16:13:34', '2020-12-19 16:13:34'),
(12, 'abcd', '2020-12-18', '2020-12-19 16:52:16', '2020-12-19 16:52:16'),
(13, 'abcd', '2020-12-18', '2020-12-19 16:52:22', '2020-12-19 16:52:22'),
(14, 'arararar', '2020-12-08', '2020-12-19 17:24:14', '2020-12-19 17:24:14'),
(16, 'あららら', '2021-01-08', '2021-01-09 17:48:51', '2021-01-09 17:48:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'aiueo', 'kakikukeko', 0, 0, '2021-01-09 15:44:55', '2021-01-09 15:44:55'),
(2, 'harehare', 'ameame', 0, 0, '2021-01-14 22:04:32', '2021-01-14 22:04:32');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `result_table`
--
ALTER TABLE `result_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `result_table`
--
ALTER TABLE `result_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
