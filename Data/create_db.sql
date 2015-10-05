-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- ����: 127.0.0.1
-- ����� ��������: ��� 06 2015 �., 01:37
-- ������ �������: 5.5.25
-- ������ PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- ���� ������: `my_bd`
--

-- --------------------------------------------------------

--
-- ��������� ������� `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `user_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `tel` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `name` varchar(20) NOT NULL,
  `second_name` varchar(20) NOT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `adress` varchar(50) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `country` varchar(15) DEFAULT NULL,
  `family_status` varchar(10) DEFAULT NULL,
  `specialty` varchar(20) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`,`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;
