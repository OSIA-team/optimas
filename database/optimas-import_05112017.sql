-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 05. lis 2017, 11:25
-- Verze serveru: 10.1.22-MariaDB
-- Verze PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `optimas`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `dopravce`
--

CREATE TABLE IF NOT EXISTS `dopravce` (
  `id` int(11) NOT NULL,
  `nazev` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `dopravce`
--

INSERT INTO `dopravce` (`id`, `nazev`) VALUES
(1, 'Optimas'),
(2, 'Multimex'),
(3, 'Toptrans'),
(4, 'UPS'),
(5, 'UPS DE'),
(6, 'PPL'),
(7, 'Vlastní'),
(8, 'Pošta'),
(9, 'Osobně');

-- --------------------------------------------------------

--
-- Struktura tabulky `jednani`
--

CREATE TABLE IF NOT EXISTS `jednani` (
  `id` int(11) NOT NULL,
  `datumjednani` date DEFAULT NULL,
  `datumvyrizeni` date DEFAULT NULL,
  `kdojednal` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `kdovyridil` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `predmet_jednani` text COLLATE utf8_czech_ci,
  `klient_id` int(11) NOT NULL,
  `skym` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `jednani`
--

INSERT INTO `jednani` (`id`, `datumjednani`, `datumvyrizeni`, `kdojednal`, `kdovyridil`, `predmet_jednani`, `klient_id`, `skym`) VALUES
(1, '2017-07-17', '0000-00-00', 'Martin', '', 'Zájem o ojetý stroj', 208, 'Jílek'),
(2, '2017-08-21', '0000-00-00', 'Martin', '', 'MULTI 6 Bagr', 244, 'Jednatel'),
(3, '2017-08-22', '0000-00-00', 'Martin', '', 'PFG Mini', 245, 'Hájek'),
(4, '2017-09-25', '0000-00-00', 'Martin', '', 'Vacu-lift', 247, 'Kamidra'),
(5, '2017-10-25', '0000-00-00', 'Martin', '', 'zájem o ojetý stroj', 191, 'Ing. Drápalík'),
(6, '2017-10-25', '0000-00-00', 'Martin', '', 'HH', 208, 'Jílek');

-- --------------------------------------------------------

--
-- Struktura tabulky `jednatel`
--

CREATE TABLE IF NOT EXISTS `jednatel` (
  `id` int(11) NOT NULL,
  `titul` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `jmeno` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `prijmeni` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `mobil` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `funkce` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `klient_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `jednatel`
--

INSERT INTO `jednatel` (`id`, `titul`, `jmeno`, `prijmeni`, `mobil`, `email`, `funkce`, `klient_id`) VALUES
(1, '', 'Lukáš', 'Hájek', '602645910', 'hajek@chladek-tintera.cz', 'Vedoucí střediska silnice', 245),
(2, '', 'Josef', 'Smutný', '727858845', '', '', 246);

-- --------------------------------------------------------

--
-- Struktura tabulky `klient`
--

CREATE TABLE IF NOT EXISTS `klient` (
  `id` int(11) NOT NULL,
  `kod_zakaznika` int(11) DEFAULT NULL,
  `nazev_firmy` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `zeme` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `ulice` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `mesto` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `psc` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `telefon` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `fax` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `www` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `wimag` tinyint(4) DEFAULT NULL,
  `optimas` tinyint(4) DEFAULT NULL,
  `ziva` tinyint(4) DEFAULT NULL,
  `stavebni` tinyint(4) DEFAULT NULL,
  `obchodnik` tinyint(4) DEFAULT NULL,
  `pouzitestroje` tinyint(4) DEFAULT NULL,
  `poznamka` text COLLATE utf8_czech_ci
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `klient`
--

INSERT INTO `klient` (`id`, `kod_zakaznika`, `nazev_firmy`, `zeme`, `ulice`, `mesto`, `psc`, `telefon`, `fax`, `email`, `www`, `wimag`, `optimas`, `ziva`, `stavebni`, `obchodnik`, `pouzitestroje`, `poznamka`) VALUES
(1, 203, 'ZEMAKO, s.r.o.', 'ČR', 'Bohunická cesta 9', 'Moravany u Brna', '664 48', '+420 544601076', '+420 544501077', 'nejedlý@zemako.cz', 'www.zemako.cz', 1, 0, 1, 1, 0, 0, 'zemako@tiscali.cz'),
(2, 204, 'Kalandra Miloš', 'ČR', 'Josefská 15', 'Moravská Třebová', '571 01', NULL, NULL, 'kalandramil@tiscali.cz', NULL, 0, 1, 1, 1, 0, 0, 'IČ: 86981641, není plátcem DPH, má i mail kalandramil@seznam.cz'),
(3, 205, 'Blažek Roman', 'ČR', NULL, 'Blato', '530 02', NULL, '+420 608135352', 'rb.blazek@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(4, 206, 'Mach Jaroslav', 'ČR', 'Dlouhá 1649', 'Kladno', '272 01', NULL, NULL, 'jaroslav.mach.kladno@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(5, 207, 'SKANSKA DS a.s. závod 76', 'ČR', 'Bohunická 50', 'Brno', '601 06', NULL, NULL, 'karel.kafunek@skanska.cz', 'www.skanska.cz', 1, 1, 1, 1, 0, 0, 'Ing. Josef Hájek, řed. SKANSKA DS +420 547138111, Ing. Wolf, řed záv. 76 +420 547138157, Ing. Petr Maurer nám. řed. záv. 76 +420 737257157'),
(6, 208, 'Cooptel, stavební a.s.', 'ČR', 'Černovické nábř. 7', 'Brno', '618 00', '+420 548422128', '+420 548422113', 'phala@cooptel.cz', 'www.cooptel.cz', 0, 1, 1, 1, 0, 0, NULL),
(7, 209, 'Krupka Josef', 'ČR', NULL, 'Dolní Podluží', '407 55', NULL, NULL, 'josefkrupka01@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(8, 210, 'CETINA a KENAUR s.r.o.', 'ČR', 'Vřesová 494', 'Zruč - Senec', '330 08', '+420 377241238', NULL, 'cetina@kenaur.cz', 'www.cetinaakenaur.cz', 0, 1, 1, 1, 0, 0, 'Provozovna Božkovské náměstí 17, 326 00 Plzeň, IČ: 26315114, DIČ: CZ26315114\r\nMichal Hamhalter 724118001'),
(9, 211, 'BELLE - Ing. František Malát', 'ČR', 'Velehradská 1301/17', 'Praha 3', '130 00', NULL, '+420 230310891', 'malatbelle@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'pobočka: 262 22 Hluboš 4, IČO: 12503568, DIČ: CZ5511080146'),
(10, 258, 'Motyčka Milan', 'ČR', 'Bělohorská 36', 'Praha 6', '169 00', NULL, NULL, 'motycka2000@hotmail.com', NULL, 0, 1, 1, 1, 0, 0, 'nevím přesně firmu - REVA? REVAI? - upravit databázi, až to zjistíme; certifikovaný pokladač firmy BEST'),
(11, 259, 'Kamenstav Morava s.r.o.', 'ČR', 'Frýdecká 1978', 'Frýdek-Míster', '737 01', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(12, 260, 'Stoklásek Pavel', 'ČR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, 'dříve byl u Čábelky, dělá dlažbu pro PSVS'),
(13, 261, 'Ekostavby Brno, a.s.', 'ČR', 'U Svitavy 1077/2', 'Brno', '618 00', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(14, 262, 'Roudnický Luboš', 'ČR', ' 219', 'Předměřice nad Jizerou', '294 74', NULL, NULL, 'jroudnicky@roudnickystavitel.c', NULL, 0, 1, 1, 1, 0, 0, 'jroudnicky@roudnickystavitel.cz'),
(15, 263, 'Kudlička Marek', 'ČR', 'Nesovice 144', 'Nesovice', '683 33', NULL, NULL, 'kudlickamarek@seznam.cz', NULL, 0, 1, 0, 1, 0, 0, NULL),
(16, 264, 'BARX CONSTRUCTIONS s.r.o.', 'ČR', 'Miletínská 376/19', 'Lišov', '373 72', NULL, NULL, 'jaroslav.zifcak@barx.cz', 'www.barx.cz', 0, 1, 0, 1, 0, 0, 'IČ: 28089987, DIČ: CZ28089987 Provozovna: 1. máje 185, 385 01 Vimperk'),
(17, 265, 'Kordík Petr', 'ČR', 'Karlovská 31', 'Liberec', '460 10', NULL, NULL, 'transporttaxi@seznam.cz', NULL, 0, 1, 1, 0, 0, 0, 'zasílání: Karlovská 56'),
(18, 266, 'DuoTop, s.r.o.', 'ČR', 'Parmská 354', 'Praha 10', '109 00', NULL, NULL, 'petlan@duotop.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(19, 267, 'Pvel Brandýs', 'ČR', 'Tučapy 186', 'Tučapy', '683 01', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, 'není plátce DPH!'),
(20, 268, 'SKANSKA a.s. Půjčovna ZS - Morava', 'ČR', 'Vinohradská 88', 'Brno', '618 00', NULL, NULL, 'milos.prosty@skanska.cz', NULL, 0, 1, 0, 0, 1, 0, NULL),
(21, 269, 'ARBE - půjčovna s.r.o.', 'ČR', 'Knejzlíkova 2685/6', 'Ostrava - Zábřeh', '700 30', '+420 548210770', '+420 548210770', 'obchod@arbe.cz', 'www.arbe.cz', 0, 1, 1, 0, 1, 0, 'IČ: 28657811, DIČ: CZ28657811, provozovna 638 00 Brno, Brožíkova 1, Ňorek Tomáš'),
(22, 244, 'Graca Petr', 'ČR', 'Masarykova 39', 'Opava', '746 01', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(23, 245, 'RILINE, s.r.o.', 'SR', 'Štiavnická 5140', 'Ružomberok', '034 01', NULL, NULL, 'vladimir.richtarik@riline.sk', 'riline.sk', 0, 0, 1, 1, 0, 0, NULL),
(24, 246, 'SKANSKA a.s. závod Morava sever', 'ČR', 'Pavelkova 6', 'Olomouc', '772 11', '+420585106236', NULL, 'jiri.skubna@skanska.cz', 'www.skanska.cz', 1, 1, 1, 1, 0, 0, 'závod Morava sever'),
(25, 247, 'Inženýrské a dopravní stavby Olomouc a.s.', 'ČR', 'Albertova 229/21', 'Olomouc', '779 00', '+420585757041', NULL, 'nezhyba@ids-olomouc.cz', 'www.ids-olomouc.cz', 1, 1, 0, 1, 0, 0, 'Ing. Oldřich Frydrych, vedoucí střediska liniových staveb, mob: +042 724 97 26 45tel: +420 58 57 57 056, frydrych@ids-olomouc.cz'),
(26, 248, 'PROSTAS s.r.o.', 'ČR', 'Ječmínkova 11', 'Prostějov', '796 01', NULL, NULL, 'prostas@volny.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(27, 249, 'Všeobecná stavební s.r.o.', 'ČR', 'Pod Lapačem 229/29', 'Přerov XII - Žeravice', '750 02', '+420581705891', NULL, 'p.zdrahal@vsprerov.cz', 'www.vsprerov.cz', 0, 1, 1, 1, 0, 0, 'kanceláře: Motorest Kokory, 3. patro, Kokory 381 751 05 Kokory'),
(28, 250, 'Skanska a.s., Divize Silniční stavitelství', 'ČR', 'Bohunická 133/50', 'Brno', '619 00', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 'Závod Morava Jih: areál firmy Fako, Na Sádkách, Kroměříž'),
(29, 251, 'SKANSKA DS a.s.', 'ČR', 'Bohunická 133/50', 'Brno', '619 00', '+420547138412', NULL, 'michal.reiter@skanska.cz', 'www.skanska.cz', 1, 1, 1, 1, 0, 0, NULL),
(30, 252, 'BEST, a.s.', 'ČR', 'Rybnice 148', 'Kaznějov', '331 51', '+420373720112', NULL, 'sajner@best.info', 'www.best.info', 0, 0, 1, 0, 1, 0, NULL),
(31, 253, 'SKANSKA Čechy a.s', 'ČR', 'Průmyslová 493', 'Pardubice', '530 03', '+420 466009700', '+420 466009712', 'petr.homolka@skanska.cz', 'www.skanska.cz', 1, 1, 1, 1, 0, 0, NULL),
(32, 62, 'AKVAMONT spol. s r.o.', 'ČR', 'Lačnov 33', 'Svitavy', '56802', '+420 461530636', NULL, 'info@akvamont.cz', 'www.akvamont.cz', 0, 0, 1, 1, 0, 0, 'Hlavní 426/4, 568 02 Svitavy Lačnov, jednatel pan Jaroslav Jerie, IČO: 15035221, DIČ: CZ15035221'),
(33, 63, 'AUTOTRAK spol. s r.o.', 'ČR', 'Pod Petřinami 15', 'Praha 6', '16200', NULL, NULL, 'autotrak.vojir@volny.cz', 'www.autotrak.cz', 0, 0, 1, 1, 0, 0, 'jednatelé: Václav Vojíř, Martin Tůma, IČO: 45306028'),
(34, 64, 'B.K.T. spol. s r.o.', 'ČR', 'Roháčova 639', 'Tábor', '39002', '+420 381253797', '+420 381254483', 'bkt@bkt.cz', 'www.bkt.cz', 0, 0, 1, 1, 0, 0, 'IČ: 16847431, DIČ: CZ16847431, jednatelé: Gustav Krch, Ing. Pavla Němcová'),
(35, 65, 'Balatka Oldřich', 'ČR', 'Ostružná 127', 'Branná', '78825', NULL, NULL, 'o.balatka@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(36, 66, 'BENE spol. s r.o.', 'ČR', 'Tělovýchovná 1076', 'Praha 5', '15500', '+420 235511147', NULL, 'info@benepraha.cz', 'www.benepraha.cz', 0, 1, 0, 1, 0, 0, 'IČO: 45310173, DIČ: CZ45310173; kontakt pro běžné věci p. Čapek +420602421027'),
(37, 67, 'BERAN 2, s.r.o.', 'ČR', 'Brandýská 1045', 'Kostelec nad Labem', '27713', NULL, NULL, 'info@beran2.cz', NULL, 0, 1, 1, 1, 0, 0, 'Klopčeková +420606335813; stará adresa Brandýnská 651'),
(38, 68, 'BEZAN s.r.o.', 'ČR', 'Skalice 40', 'Frýdek-Místek', '73908', '+420 558432235', NULL, 'bezan@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, 'IČO: 619 45 552, DIČ: CZ61945552'),
(39, 69, 'MBM TRADE CZ, s.r.o.', 'ČR', 'Chudenická 1057/34', 'Praha 2', '102 00', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, 'kor. adresa: Štěpánov 1, 675 51  Jaroměřice nad Rokytnou'),
(40, 70, 'Bohemia Constructiva Graf, s.r', 'ČR', 'Vodárenská ulice č.p.1091/II', 'Třeboň', '37901', '+420 384721357', '+420 384721357', 'hsv@bcgraf.cz', 'www.bcgraf.cz', 0, 0, 1, 1, 0, 0, 'IČO: 15769453, DIČ: CZ15769453,\r\nBC Beton (betonárna), Rybářská 671/II, Třeboň 379 01, tel. +420 384724453, e-mail:bcbeton@bcgraf.cz'),
(41, 71, 'Brabec & Brabec stavební s.r.o', 'ČR', 'Kateřinská 83', 'Liberec 17', '46001', '+420 485164758', NULL, 'info@brabec-brabec.cz', 'www.brabec-brabec.cz', 0, 0, 1, 1, 0, 0, 'Pavel Brabec, +420 602189024'),
(42, 72, 'Buberník Daniel', 'ČR', 'Zubří 1053', 'Zubří', '75654', NULL, NULL, 'daniel.bubernik@centrum.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(43, 73, 'BUILDSTEEL s.r.o.', 'ČR', 'Mírová 1098/4', 'Hustopeče', '69301', NULL, NULL, 'antonin.krcmar@buildsteel.cz', NULL, 0, 0, 1, 1, 0, 0, 'IČO: 27694321, DIČ: CZ27694321, jednatel: Přemysl Grůza, +420 777246033, premysl.gruza@buildsteel.cz'),
(44, 74, 'COLAS CZ, a.s., provoz Tábor', 'ČR', 'Měšická 2697', 'Tábor', '39002', '+420 567574811', '+420 567574801', 'birner@colas.cz', 'www.colas.cz', 0, 0, 1, 1, 0, 0, 'IČO: 26177005, DIČ: CZ26177005, Ke Klíčovu 9, 19000 Praha 9, v Táboře je stavební provoz, Ing. Pavel Hudler, ved. Provozu, tel.: +420 381609562\r\nfax: +420 381609561'),
(45, 75, 'Čábelka Břetislav', 'ČR', 'Čeňka Růžičky 392/24a', 'Brno', '62500', NULL, NULL, 'bretislavcabelka@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'IČ: 46904387, STAP, spol. s r.o. " v likvidaci "'),
(46, 76, 'Čábelka Miloš', 'ČR', 'Konrádova 5', 'Brno-Líšeň', '62800', NULL, NULL, NULL, NULL, 0, 0, 1, 1, 0, 0, 'IČ: 46904387, STAP, spol. s r.o. " v likvidaci "'),
(47, 77, 'Červenka Bohumil - BČ, s.r.o.', 'ČR', 'U Luk 666', 'Neratovice', '27711', '315 664 286', NULL, 'cervenka@bcervenka.cz', 'www.bcervenka.cz', 0, 1, 1, 1, 0, 0, 'p. Blecha, 777 715 167, blecha@bcervenka.cz'),
(48, 78, 'ČNES dopravní stavby, a.s.', 'ČR', 'Milady Horákové 2764', 'Kladno', '27201', NULL, '+420 312663211', 'kochlicek@cnes.cz', 'www.cnes.cz', 0, 0, 1, 1, 0, 0, 'IČO: 47781734, DIČ: CZ47781734, tel: +420 314009111, 312663210,'),
(49, 79, 'DAP. a.s.', 'ČR', 'Sarajevská 17', 'Praha 2', '12000', '+420 222560202', '+420 222560404', 'info@dap.cz', 'www.dap.cz', 0, 0, 1, 1, 0, 0, 'IČ: 26508583, DIČ: CZ26508583, Petr Louda, Mgr. Petr Ondrášek, členové předst.'),
(50, 80, 'DELTA POLKOVICE s.r.o.', 'ČR', 'Polkovice 198', 'Polkovice', '75144', NULL, NULL, 'sigut@deltapolkovice.cz', NULL, 0, 0, 1, 1, 0, 0, 'sklad: Špitálka 12, 602 00 Brno, IČO: 26854929, DIČ: CZ26854929, jednatel Ing. Josef Hlavinka'),
(51, 82, 'Deltablok s.r.o.', 'ČR', 'Novoveská 535/7', 'Ostrava-Mariánské Hory', '70900', NULL, NULL, 'deltablok@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, 'IČ: 26863464, DIČ: CZ26863464, Kamil Vrubl, společník'),
(52, 83, 'Dlouhý Robert provádění staveb', 'ČR', 'areál ZD Zápská 1862', 'Brandýs nad labem', '25001', NULL, NULL, 'firma@stavby-dlouhy.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(53, 84, 'DOHNÁLEK, zemní práce a zpraco', 'ČR', 'Ludvíkov 64', 'Vrbno pod Pradědem', '79326', NULL, NULL, 't.dohnalek@atlas.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(54, 85, 'DUMA, spol. s r.o.', 'ČR', 'závod pokládek: Dolany 155', 'Unhošť', '27351', NULL, NULL, 'matduma@volny.cz', NULL, 0, 0, 1, 1, 0, 0, 'výrobní závod: Nádražní 35, 691 06 Velké Pavlovice'),
(55, 87, 'EICO NÁŘADÍ s.r.o.', 'ČR', 'Královopolské Vážany 157', 'Rousínov', '68301', NULL, NULL, 'janmiklas@centrum.cz', NULL, 0, 0, 1, 0, 1, 0, NULL),
(56, 88, 'Ekologická stavební společnost', 'ČR', 'Bezručova 223', 'Jaroměř', '55101', NULL, NULL, 'ess_rysavka@centrum.cz', NULL, 0, 0, 1, 1, 0, 0, 'Ing. Zbyněk Nejedlý, jednatel, ess_nejedly@centrum.cz'),
(57, 90, 'Frkáň Ján, zemní a výkopové pr', 'ČR', NULL, 'Přáslavice 95', '78354', NULL, NULL, 'frkanjan@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(58, 91, 'GOOD HOME, s.r.o.', 'ČR', NULL, 'Nebovidy 151', '66448', NULL, NULL, 'grossman@goog-home.e', NULL, 0, 0, 1, 0, 1, 0, NULL),
(59, 92, 'H.K.U., spol. s r.o.', 'ČR', 'Poděbradova 113', 'Brno', '61200', NULL, NULL, 'hku@quick.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(60, 93, 'Heš Karel - stavební firma', 'ČR', 'Blížkovice 392', NULL, '67155', NULL, NULL, 'karel.hes@centrum.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(61, 94, 'Hurník Zdeněk', 'ČR', 'P. Bezruče 389/15', 'Ledvice', '41772', NULL, NULL, 'naradihurnik@seznam.cz', NULL, 0, 1, 1, 0, 1, 0, 'IČ: 69918996 DIČ: CZ6008100175'),
(62, 95, 'INOS RICHTER s.r.o.', 'ČR', 'Holušická 2253/1', 'Praha 4', '14800', NULL, NULL, 'pavel@inoscd.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(63, 96, 'INVICO s.r.o.', 'ČR', 'Drážďanská 514/58', 'Krásné Březno', '40007', NULL, NULL, 'vitverajan@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(64, 97, 'KANOV spol. s r.o.', 'ČR', 'Závodní 196', 'Karlovy Vary', '36001', NULL, NULL, 'kanovkv@mbox.vol.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(65, 98, 'KARO', 'ČR', 'Lesní 1282', 'Frýdlant', '46401', NULL, NULL, NULL, NULL, 0, 0, 1, 1, 0, 0, NULL),
(66, 99, 'Kobera Miroslav', 'ČR', 'U Trativodu 593', 'Praha 9', '19000', NULL, NULL, 'mkobera@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(67, 100, 'Komosný Milan', 'ČR', 'Hlavní 215', 'Perštejn', '43163', NULL, NULL, 'milankomosny@seznam.cz', NULL, 0, 0, 1, 1, 0, 0, NULL),
(68, 101, 'Kratina Roman', 'ČR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(69, 102, 'Antonín Krňa s.r.o.', 'ČR', 'Benátky 674', 'Kardašova Řečice', '37821', NULL, NULL, 'krna@krna.cz', NULL, 0, 1, 1, 1, 1, 0, NULL),
(70, 103, 'KSENA s.r.o.', 'ČR', 'Dářská 14', 'Praha 9', '198 00', NULL, NULL, 'info@ksena.cz', 'www.ksena.cz', 0, 1, 1, 1, 0, 0, 'obchod@ksena.cz'),
(71, 104, 'Kubeš Radim', 'ČR', 'A. Dvořáka 752', 'Votice', '25901', NULL, NULL, 'radimrk@seznam.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(72, 105, 'LASIUS', 'ČR', NULL, 'Olomouc', NULL, NULL, NULL, 'h.majkova@seznam.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(73, 106, 'LESNÍ STAVBY, s.r.o.', 'ČR', 'Palackého 764', 'Nýrsko', '34022', NULL, NULL, 'lesnistavby@lesnista', NULL, 0, 0, 0, 0, 0, 0, NULL),
(74, 107, 'MAPET stavební společnost', 'ČR', 'Sáňkařská 135', 'Liberec 19', '46008', NULL, NULL, 'martin.petrus@mapet.', NULL, 0, 0, 0, 0, 0, 0, NULL),
(75, 108, 'Matex HK s.r.o.', 'ČR', 'Kladská 181', 'Hradec Králové', '50002', NULL, NULL, 'info@matex.org', NULL, 0, 0, 0, 0, 0, 0, NULL),
(76, 109, 'Matoušek CZ a.s.', 'ČR', 'Olomoucká 226', 'Jevíčko', '56943', NULL, NULL, 'matousek.j@matousek.', 'dvorak@matousek.cz', 0, 0, 0, 0, 0, 0, 'dvorak@matousek.cz'),
(77, 110, 'Matyska Jan', 'ČR', 'Bosna 205', 'Hronov', '54931', NULL, NULL, 'matyska.j@centrum.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(78, 111, 'Mejzlík Radim', 'ČR', 'Hostákov 20', 'Třebíč', '67501', NULL, NULL, 'mejzlik.r@tiscali.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(79, 112, 'MIKO KENNEL s.r.o.', 'ČR', 'Vodičkova 67', 'Počátky', '39464', NULL, NULL, 'mikolasekmiloslav@se', NULL, 0, 0, 0, 0, 0, 0, NULL),
(80, 113, 'NOVOSTAV HRADEC kRÁLOVÉ s.r.o', 'ČR', 'Střelecká 672', 'Hradec Králové', '50002', NULL, NULL, 'novostav@novostavhk.', NULL, 0, 0, 0, 0, 0, 0, NULL),
(81, 114, 'Oblazný Tomáš', 'ČR', 'Lidická 267', 'Kladno', '27203', NULL, NULL, 'oblazny@c-box.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(82, 115, 'OPEN RE-ECO. s.r.o.', 'ČR', 'Jiráskova 701', 'Vsetín', '75501', NULL, NULL, 'trusina@openreeco.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(83, 116, 'PERPET spol. s r.o.', 'ČR', 'Dvorská 108', 'Hradec Králové', '50311', NULL, NULL, 'peroutka@perpet.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(84, 117, 'PKS IMPOS a.s.', 'ČR', 'Brněnská 126/38', 'Žďár nad Sázavou 1 -', '59101', NULL, NULL, 'impos@pks.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(85, 118, 'PRADAST, spol. s r.o.', 'ČR', 'Přemysla Otakara II. 10/6', 'České Budějovice', '37001', NULL, NULL, 'pradast@pradast.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(86, 119, 'PSD', 'ČR', 'Březová 187', 'Děčín III', '40501', NULL, NULL, 'psd@psd.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(87, 120, 'Ptáček Zdeněk', 'ČR', NULL, 'Olomouc', NULL, NULL, NULL, 'ptacek.zd@seznam.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(88, 121, 'Ptáčník - Dopravní stavby s.r.o.', 'ČR', 'Cihlářská 552', 'Domažlice', '34401', '379 776 017', NULL, 'ptacnik@tiscali.cz', NULL, 0, 1, 1, 1, 0, 0, 'ptacnik@dopravnistavby.cz'),
(89, 122, 'Rada', 'ČR', NULL, 'Střítež/Rudinou', '75301', NULL, NULL, 'raza@centrum.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(90, 123, 'RISL s.r.o.', 'ČR', 'U Vodárny 461', 'Hostivice', '25301', NULL, NULL, 'jansedivy@risl.cz', NULL, 1, 1, 1, 1, 0, 0, NULL),
(91, 124, 'RM - CZ s.r.o.', 'ČR', 'nám. Čsl. armády 421', 'Vyškov', '68201', NULL, NULL, 'firma@rm-cz.com', NULL, 0, 0, 0, 0, 0, 0, NULL),
(92, 125, 'S&K&K', 'ČR', 'Zd.Fibicha 685', 'Ledeč nad Sázavou', '58401', NULL, NULL, 'miloslav.kavka@sezna', NULL, 0, 0, 0, 0, 0, 0, NULL),
(93, 126, 'SEMMELROCK Colorbeton, a.s.', 'ČR', 'Fr. Diviše 944', 'Praha 10', '10400', NULL, NULL, 'ivan@semmelrock.com', NULL, 0, 0, 0, 0, 0, 0, NULL),
(94, 127, 'SILKOM, spol. s r.o.', 'ČR', 'Větrov 3037', 'Frýdlant', '46401', NULL, NULL, 'mail@silkom.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(95, 128, 'Singolo Dean', 'ČR', 'Dvořákova 1332/16', 'Děčín', '40501', NULL, NULL, 'singolo@singolo.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(96, 129, 'Sklenář Jan - zámkové dlažby', 'ČR', 'Ludslavice 134', NULL, '76852', NULL, NULL, 'sklenar@dlazby-sklen', NULL, 0, 0, 0, 0, 0, 0, NULL),
(97, 130, 'SLUMEKO s.r.o.', 'ČR', 'Štefánikova 58', 'Kopřivnice', '74221', NULL, NULL, 'vladimir.pustka@slum', NULL, 0, 0, 0, 0, 0, 0, NULL),
(98, 131, 'SPRÁVA A ÚDRŽBA SILNIC SLOVÁCK', 'ČR', 'Jarošov 514', 'Uherské Hradiště', '68601', NULL, NULL, 'sus@sus.uh.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(99, 132, 'STAKOM - Ivo Doležal', 'ČR', 'Pražská 2216', 'Mělník', '27601', NULL, NULL, 'dolezal-stakom@sezna', NULL, 0, 0, 0, 0, 0, 0, NULL),
(100, 133, 'Stavba a údržba silnic s.r.o.', 'ČR', 'Sovadinova 8', 'Břeclav', '69002', NULL, NULL, 'balcar@udrzbasilnic.', NULL, 0, 0, 0, 0, 0, 0, NULL),
(101, 134, 'Stavební centrum - Pavel Šťast', 'ČR', 'Kaštanová 141', 'Brno-Horní Heršpice', '61700', NULL, NULL, 'stastny@kachlickarna', NULL, 0, 0, 0, 0, 0, 0, NULL),
(102, 135, 'Stavební společnost ELEMENTA s', 'ČR', 'Ortenovo náměstí 1457/23', 'Praha 7', '17000', NULL, NULL, 'jiri.marsa@seznam.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(103, 136, 'STAVES s.r.o.', 'ČR', 'Přerovská 765/5', 'Olomouc', '78371', NULL, NULL, 'veprek@staves.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(104, 137, 'Stavkomplet', 'ČR', 'Třebovská 164/34', 'Mohelnice', '78985', NULL, NULL, 'tylsar@stavkomplet.c', NULL, 0, 0, 0, 0, 0, 0, NULL),
(105, 138, 'Stavmater International s.r.o.', 'ČR', 'Rošických 604/6', 'Praha 5', '15000', NULL, NULL, 'r.tuma@stavmater.cz', NULL, 0, 1, 1, 1, 0, 0, 'kor. adresa: Hrnčířská 17, Zdiměřice u Jesenice, 252 42'),
(106, 139, 'STAVOKOMPLET spol.s r.o.', 'ČR', 'Zápy, Královická 251', 'Brandýs nad Labem', '25001', NULL, NULL, 'hrdlicka@stavokomplet.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(107, 140, 'STRABAG a.s., odštěpný závod Brno', 'ČR', 'Rantířovská 284', 'Jihlava', '58605', NULL, NULL, 'strabag.brno@strabag', NULL, 0, 0, 0, 0, 0, 0, NULL),
(108, 141, 'SUPTEL', 'ČR', NULL, NULL, NULL, NULL, NULL, 'cihak@suptel.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(109, 142, 'SWIETELSKY stavební s.r.o.', 'ČR', 'Pražská 495', 'České Budějovice', '37004', NULL, NULL, 'stred@swietelsky.cz', NULL, 0, 0, 0, 0, 0, 0, 'OZ oblast Vysočina, K Silu 1143, 393 01  Pelhřimov, p. Novotný, tel. 565 333 150, office-vysocina@swietelsky.cz\r\nJan Kocman, +420602148061'),
(110, 143, 'Šícha Emil', 'ČR', 'Velvarská 10', 'Horoměřice', '25262', NULL, NULL, 'emil.sicha@volny.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(111, 144, 'Švehla a syn a.s.', 'ČR', 'Dobrovodská 606', 'České Budějovice 1', '37001', NULL, NULL, 'obchod@svehlaasyn.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(112, 145, 'Technické služby Havlíčkův Bro', 'ČR', 'Na Valech 3523', 'Havlíčkův Brod', '58002', '569429886', NULL, 'ts@tshb.cz', NULL, 0, 0, 0, 0, 0, 0, 'p. Baloun, zasílací adresa: Reynkova 2886, 586 01  Havl. Brod'),
(113, 146, 'Technické služby Kutná Hora, s', 'ČR', 'U Lazara 22', 'Kutná Hora-Vnitřní M', '28401', NULL, NULL, 'ts@tskh.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(114, 147, 'TS Světlá nad Sázavou', 'ČR', 'Rozkoš 749', 'Světlá nad Sázavou', NULL, NULL, NULL, 'rediteltbs@svetlans.', NULL, 0, 0, 0, 0, 0, 0, NULL),
(115, 148, 'Technické služby Vsetín, s.r.o', 'ČR', 'Jasenice 528', 'Vsetín', '75501', NULL, NULL, 'jan.horsak@tsvsetin.', NULL, 0, 0, 0, 0, 0, 0, NULL),
(116, 149, 'TERMÁL', 'ČR', 'Chořelice 1071', 'Litovel', '78401', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(117, 150, 'TESTA s.r.o.', 'ČR', 'Budějovická 6', 'Jesenice u Prahy', '25242', NULL, NULL, 'testa.sro@iol.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(118, 151, 'TM Stav, spol. s r.o.', 'ČR', 'Jasenice 729', 'Vsetín', '75501', NULL, NULL, 'daniel.mikes@tmstav.', NULL, 0, 0, 0, 0, 0, 0, NULL),
(119, 152, 'Tojflová Marie', 'ČR', 'Bryxova 956', 'Praha', '19800', NULL, NULL, 'tomas.tojfl@mybox.cz', NULL, 0, 1, 1, 1, 0, 0, 'Adresa domů: Za drahou 1667, 102 00  Praha 10 - Hostivař'),
(120, 153, 'TOPAS - Ing. Miroslav Bartošek', 'ČR', 'Mlýnská 861', 'Sezimovo Ústí', '39101', NULL, NULL, 'topas@tabor.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(121, 154, 'TOPAS STAVBY s.r.o.', 'ČR', 'Chýnovská 2115', 'Tábor', '39002', NULL, NULL, 'topas@tabor.cz', NULL, 0, 0, 0, 0, 0, 0, 'provozovna: Chýnovská 2989, 390 02 Tábor'),
(122, 156, 'Tost.cz, s.r.o.', 'ČR', 'Havlíčkova 408', 'Ledeč nad Sázavou', '58401', NULL, NULL, 'tost@tost.cz', NULL, 0, 1, 1, 1, 0, 0, 'Josef Zounek - skladník, sklad@tost.cz'),
(123, 157, 'TRASKO a.s.', 'ČR', 'Na Nouzce 487/8', 'Vyškov', '68201', NULL, NULL, 'p.kapounek@trasko-as', NULL, 0, 0, 0, 0, 0, 0, NULL),
(124, 158, 'Uher Milan', 'ČR', 'Dr. E. Beneše 1106', 'Neratovice', '27711', NULL, NULL, NULL, NULL, 0, 0, 0, 1, 0, 0, 'IČO: 45884846, DIČ: CZ7012111579'),
(125, 159, 'VAK Hradec Králové, a.s.', 'ČR', 'Výrobní 881', 'Hradec Králové', '50003', NULL, NULL, 'palec_jiri@vakhk.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(126, 160, 'VB 42, spol. s r.o.', 'ČR', 'Sokolovská 325/140', 'Praha 8, Karlín', '18600', NULL, NULL, 'vanous.martin@seznam', NULL, 0, 0, 0, 0, 0, 0, NULL),
(127, 161, 'Volf Aleš', 'ČR', 'Rychvaldská 210', 'Bohumín-Záblatí', '73552', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(128, 162, 'Weiss plus', 'ČR', 'Na Pastvisko 3246/3', 'Ostrava-Martinov', '72300', NULL, NULL, 'jarek@weissplus.cz', NULL, 0, 0, 0, 0, 0, 0, NULL),
(129, 163, 'ZEPRA STAVBY s.r.o.', 'ČR', 'Jindřišská 273', 'Pardubice-Zelené Pře', '53002', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(130, 164, 'Vojkůvka Petr', 'ČR', 'Dolní Bečva 36', 'Dolní Bečva', '756 55', NULL, NULL, 'vojkuvka.petr@gmail.cz', NULL, 0, 0, 0, 1, 0, 0, NULL),
(131, 168, 'MONTOLIT s.r.o.', 'ČR', 'V Horkách 1389/11', 'Praha 4', '114000', NULL, NULL, 'montolit@interservis.cz', 'montolit@atlas.cz', 0, 0, 0, 0, 0, 0, NULL),
(132, 169, 'PETRON - technické služby', 'ČR', 'Průběžná 6165', 'Ostrava - Poruba', '70800', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(133, 165, 'ATS - stavební stroje s.r.o.', 'ČR', 'Areál obalovny SSŽ', 'Černovice u Chomutova', '430 01', NULL, NULL, 'obchod@ats-stroje.cz', 'www.ats-stroje.cz', 0, 0, 0, 0, 1, 0, NULL),
(134, 212, 'Energie - stavební a báňská a.s.', 'ČR', 'Vašíčkova 3081', 'Kladno 4', '272 04', '+420 312612315', '+420 312612318', 'jezek@enas.cz', 'www.enas.cz', 0, 1, 0, 1, 0, 0, NULL),
(135, 214, 'Šprinc Milan', 'ČR', 'Dlouhá 76', 'Kovářská', '431 86', NULL, NULL, 'milansprinc@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'IČ: 74501143'),
(136, 215, 'Parfus František', 'ČR', 'Pražská 106', 'Brno', '642 00', NULL, NULL, 'parfus@centrum.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(137, 216, 'Urban Ján, Ing.', 'SR', 'A. Pavců 279', 'Habovka', '027 32', NULL, NULL, 'urbanjan@bsk.sk', NULL, 0, 1, 1, 1, 0, 0, NULL),
(138, 217, 'ProTeren s.r.o.', 'ČR', 'Dr. Milady Horákové 1477', 'České Budějovice', '370 05', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(139, 218, 'REGALSYSTEM BAU G.K. s.r.o.', 'SR', 'Liesek 391', 'Liesek', '027 12', NULL, NULL, 'garek2712@gmail.com', NULL, 0, 1, 1, 1, 0, 0, NULL),
(140, 219, 'BEKERA - Josef Prček', 'ČR', 'Dolní náměstí 68', 'Zliv', '373 44', '+420387963838', '+420387963838', 'bekera@volny.cz', 'bekera.cz', 0, 1, 1, 1, 0, 0, 'U Vodojemu 624, 373 44  Zliv'),
(141, 220, 'SMO a.s.', 'ČR', 'Zlínská 172', 'Otrokovice', '765 02', '+420577591192', NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, 'p. Slovák, stř. 760 01 Zlín, K Majáku 5001, tel. +420 602 735 747'),
(142, 221, 'Loučka Vladimír', 'ČR', 'Rumunská 4049', 'Kroměříž', '767 01', NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, 0, NULL),
(143, 222, 'expand holding SE', 'ČR', 'Sokolovská 366/84', 'Praha 2', '182 00', NULL, NULL, 'nekolna@expandholding.cz', NULL, 1, 1, 1, 1, 0, 0, 'stavbyvedoucí p. Kubů, 602 197 956'),
(144, 223, 'Marfil s.r.o.', 'SR', 'Cabajská 25', 'Nitra', '949 01', NULL, NULL, 'martin.silak@gmail.com', NULL, 0, 1, 1, 1, 0, 0, NULL),
(145, 225, 'STRABAG a.s., České Budějovice', 'ČR', NULL, NULL, NULL, NULL, NULL, 'vladimir.boska@strabag.com', NULL, 0, 1, 1, 1, 0, 0, NULL),
(146, 226, 'Longauer Miroslav', 'ČR', 'Malá Čermná 199', 'Čermná nad Orlicí', '517 25', NULL, NULL, 'longauer@unet.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(147, 227, 'Komárek', 'ČR', NULL, NULL, NULL, NULL, NULL, 'lu.kom@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'živnostník, JČ, pracuje pro Strabag, cca 20.000 m2 ročně'),
(148, 228, 'SITEL, spol. s r.o.', 'ČR', 'Vinohradská 74', 'Brno', '618 00', '+420548133411', '+420548211324', NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(149, 229, 'Popilka David', 'ČR', 'Žďárec u Skutče 104', 'Skuteč', '539 73', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(150, 230, 'Kasparek Roman', 'ČR', 'Norberta Frýda 4', 'Ostrava', '700 30', NULL, NULL, 'kasparekroman@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'parťák, co přímo klade - p. Žálek, 776 303 203'),
(151, 231, 'STRABAG a.s., oz Vysočina', 'ČR', 'Myslotínská 313', 'Pelhřimov', '393 01', '+420 565301437', '+420565324301', NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(152, 232, 'Sikora Tomáš', 'ČR', 'Písek 269', 'Písek u Jablunkova', '739 84', NULL, NULL, 'rsvojtechov@seznam.cz', NULL, 0, 1, 0, 1, 0, 0, 'IČ: 45218633, DIČ: CZ7111064939 do 17.9.1999,'),
(153, 233, 'Stavebniny Přecechtěl s.r.o.', 'ČR', 'Hradec - Nová Ves 22', 'Mikulovice', '790 84', NULL, NULL, NULL, NULL, 0, 1, 0, 0, 1, 0, 'BAUMAX'),
(154, 234, 'INPROS PRAHA , v.o.s.', 'ČR', 'Ke Krči 735/28', 'Praha 4', '147 00', NULL, NULL, 'radonice@inpros.cz', NULL, 0, 1, 1, 1, 0, 0, 'Doručovací adresa - ředitelství: Ke Krči 27, 147 00  Praha\r\nProvozně-technický areál Radonice - Pustina: Počernická ulice 276, Radonice u Prahy'),
(155, 235, 'HP INVEST GROUP s.r.o.', 'ČR', 'Vítězslava Nováka 937', 'Skuteč', '539 73', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(156, 236, 'Hájek Jan', 'ČR', 'Horní 72', 'Ostrava', '700 30', NULL, NULL, 'Hajek81@Tiscali.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(157, 238, 'Mikula Lukáš', 'ČR', 'Bystřice 564', 'Bystřice', '739 95', NULL, NULL, 'lukas.mikula@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(158, 239, 'Chládek Jiří', 'ČR', 'Dyjákovice', 'Znojmo', '671 26', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(159, 240, 'STAVIVOS s.r.o.', 'ČR', 'Dělnická 195/21', 'Liberec', '460 06', NULL, NULL, 'stavivos@seznam.cz', NULL, 0, 1, 1, 1, 1, 0, NULL),
(160, 241, 'Krasanovský František', 'ČR', 'Prokopa Velikého 1799', 'Tachov', '374 01', NULL, NULL, NULL, 'www.krasanovsky.cz', 0, 1, 1, 1, 1, 0, 'Doručovací adresa: Stavebniny Krasanovský, Petra Jilemnického 2097, 347 01 Tachov'),
(161, 242, 'VM stavební, s.r.o.', 'ČR', 'Dobiášova 860/14', 'Liberec 6', '460 06', NULL, NULL, 'metelec@vmstavebni.cz', NULL, 0, 0, 1, 1, 0, 0, 'DIČ: CZ27300218'),
(162, 243, 'Latko Tibor Ing. - LAROKS', 'SR', 'Žltá 1043/23', 'Žilina', '010 03', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(163, 254, 'ATLANTA a.s.', 'ČR', 'Nový Šaldorf 162', 'Znojmo', '671 81', '+420 515200617', '+420 515200613', 'dvorak.jos@atlanta-as.cz', 'www.atlanta-as.cz', 1, 1, 1, 1, 0, 0, NULL),
(164, 255, 'CONSTRE s.r.o.', 'ČR', 'Tělovýchovná 1076', 'Praha 5', '155 00', NULL, NULL, 'capekconstre@volny.cz', NULL, 0, 1, 1, 1, 0, 0, 'bývalé BENE; IČ: 24812315 DIČ: CZ24812315, kont. osoba: Žilák, +420734313618\r\nplatby: ekonom Burkert 602 143 502, faktury: Švecová 602 281 382 svecova@constre.cz\r\nstará kont. Osoba p. Čapek +420 602421027'),
(165, 256, 'SKANSKA a.s. stř. 301', 'ČR', 'Průmyslová 493', 'Pardubice', '530 03', NULL, NULL, 'antonin.kvacek@skanska.cz', 'www.skanska.cz', 0, 1, 1, 1, 0, 0, NULL),
(166, 270, 'EK STAVBY s.r.o.', 'ČR', 'V Jámách 457/6', 'Moravany', '664 48', NULL, NULL, 'info@ekstavby.cz', 'www.ekstavby.cz', 0, 1, 1, 1, 1, 0, 'IČ: 29229146, DIČ: CZ29229146, provozovna 614 00 Brno, Tkalcovská 16, pan Eduard Klempár - prokurista'),
(167, 271, 'Půjčovna nářadí a mechanizace', 'ČR', 'Krejčího 40', 'Brno - Slatina', '627 00', '+420 548218889', '+420 548218892', 'info@pujcovnachmela.cz', 'www.pujcovnachmela.cz', 0, 0, 0, 0, 0, 0, NULL),
(168, 272, 'TOCHÁČEK spol. s r.o.', 'ČR', 'Slovinská 36', 'Brno', '612 00', '+420 541217527', NULL, 'reditel@tochacek.cz', 'www.tochacek.cz', 0, 1, 1, 1, 1, 0, NULL),
(169, 273, 'KÁMEN BRNO, spol. s r.o.', 'ČR', 'Mezírka 775/1', 'Brno', '602 00', NULL, NULL, 'info@kamenbrno.cz', 'www.kamenbrno.cz', 0, 1, 1, 0, 1, 0, 'IČ: 44963386, DIČ: CZ44963386, půjčovna Hradčany 262, pí. Zemánková, jednatelka, tel. 724226005, 602562248'),
(170, 274, 'Rellcon, s.r.o.', 'ČR', 'Zapletalova 14', 'Brno', '620 00', NULL, NULL, NULL, NULL, 0, 1, 0, 1, 0, 0, NULL),
(171, 275, 'VICHR spol. s r.o.', 'ČR', 'Kobližná 19', 'Brno', '602 00', '+420543246268', NULL, NULL, NULL, 0, 1, 1, 0, 1, 0, 'dodací adresa: Uhelná 11b, Brno'),
(172, 276, 'Forgáč Marek', 'SK', 'Orovnica 229', 'Tekovská Breznica', '966 52', NULL, NULL, 'mafoforgac@gmail.com', NULL, 0, 1, 1, 1, 0, 0, 'viz. rovněž MANISTAV s.r.o.; má 1x Mini'),
(173, 277, 'MANISTAV s.r.o.', 'SK', 'Orovnica 229', 'Tekovská Breznica', '966 52', NULL, NULL, 'mafoforgac@gmail.com', NULL, 0, 1, 1, 1, 0, 0, 'viz. Forgáč Marek'),
(174, 278, 'Krupinský Vladimír', 'ČR', 'S. K. Neumanna 361', 'Stochov', '273 03', NULL, NULL, 'j.w.k@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(175, 279, 'Přibyl Jiří', 'CZ', 'K Javůrku 311', 'Nová Hrádek', '549 22', NULL, NULL, 'j.pribyl@novoplastpp.cz', NULL, 0, 0, 1, 1, 0, 0, 'Doručovací adresa: Slavoňov 86, 549 01  Nové Město nad Metují'),
(176, 280, 'František Čeliš,EVROPS a.s.', 'ČR', 'Český Újezd 247', 'Ústí nad Labem', '400 10', '+420475603222', '+420475522161', NULL, NULL, 0, 1, 1, 0, 1, 0, '10% sleva vše, stroj sleva 5%'),
(177, 281, 'SIPE s.r.o.', 'SK', 'Oravská Lesná 201', 'Oravská lesná', '029 57', NULL, NULL, 'sipe@sipe.sk', NULL, 0, 1, 1, 1, 0, 0, 'Dodací a korespondenční adresa: Duržstevná 20, 900 28  Ivanka pri Dunaji'),
(178, 282, 'OPEN RE-ECO. s.r.o.', 'ČR', 'Jiráskova 701', 'Vsetín', '755 01', '571419375', NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(179, 283, 'JANOUŠEK IS spol. s r.o.', 'ČR', 'Tovaryšský vrch 1358/3', 'Liberec 1', '460 01', '+420485104784', '+420485164670', 'info@janousek-is.cz', 'www.janousek-is.cz', 0, 1, 1, 1, 0, 0, NULL),
(180, 284, 'Jiří Loukota', 'ČR', 'Růžová 142', 'Velká Bíteš', NULL, NULL, NULL, 'jiraloukota@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(181, 285, 'Čábelka Lukáš', 'ČR', 'Josefy Faimonové 2236/17', 'Brno', '628 00', NULL, NULL, 'lcabelka@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'syn Miloše Čábelky, který zemřel; Lukáš Čábelka IČ 88917134'),
(182, 286, 'Markusreal, s.r.o.', 'SK', 'Štefánikova 3', 'Trenčín', '911 01', NULL, NULL, 'markusreal@markusreal.sk', NULL, 0, 1, 1, 0, 0, 0, NULL),
(183, 287, 'DIPS ZLÍN,spol. s r.o.', 'ČR', 'Nábřeží 599', 'Zlín', '760 01', NULL, NULL, 'josef.prikryl@o2active.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(184, 288, 'BV Bau s.r.o.', 'ČR', 'Příkazy 25', 'Příkazy', '783 33', NULL, NULL, 'petr.bednar@bvbau.cz', NULL, 0, 1, 1, 1, 0, 0, 'Dodací adresa: Na Šibeníku 1, 779 00  Olomouc'),
(185, 289, 'Josef Zapletal', 'ČR', 'Za humny 288', 'Prštice', '664 46', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(186, 290, 'STROJRENT s.r.o.', 'ČR', 'Vodařská 13', 'Brno', '619 00', NULL, NULL, 'strojrent.ales@gmail.com', 'www.strojrent.cz', 0, 1, 1, 1, 0, 0, NULL),
(187, 291, 'D.A.L., spol. s r.o.', 'SK', 'Povážský Chlmec 500', 'Žilina', '010 03', NULL, NULL, 'durina@dal.sk', NULL, 0, 1, 1, 1, 0, 0, NULL),
(188, 292, 'Silnice Horšovský Týn, a.s.', 'ČR', 'Nad rybníčkem 40', 'Horšovský Týn-Velké Předměstí', '346 01', '+420379410301', NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(189, 293, 'VAKR-stavební a inženýrská společnost', 'ČR', 'Branská 1180', 'Praha', '198 00', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, 'spol. s r.o.'),
(190, 294, 'Rada Václav', 'ČR', 'Ústí 125', 'Hranice', '753 01', NULL, NULL, 'raza@centrum.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(191, 295, 'Melichar Liberec s.r.o.', 'ČR', 'Kateřinská 83', 'Liberec', '460 14', '', '', 'drapalik@melicharliberec.cz', 'www.melicharliberec.cz', 0, 1, 1, 1, 0, 1, NULL),
(192, 296, 'STAVMAT STAVEBNINY a.s.', 'ČR', 'Na hlavní 18', 'Praha 8 - Březiněnves', '182 00', '+420354437030', NULL, 'jaroslav.mach@stavmat.cz', NULL, 0, 1, 1, 0, 1, 0, 'Prodejna Cheb: Vrázova 3a, 350 02 Cheb'),
(193, 297, 'AQUARIUS s.r.o.', 'ČR', 'Pražská 224', 'Kyšice', '273 51', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(194, 298, 'Slepička Jaroslav', 'ČR', 'Kostelec 81', 'Stříbro', '349 01', NULL, NULL, 'jaroslavslepicka@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, 'vyřizuje Tomáš Trhlík 733 379 661'),
(195, 299, 'SIPS, spol. s r.o.', 'SR', 'Moyzesova 184', 'Liptovský Hrádok', '033 01', NULL, NULL, 'sips2@stonline.sk', NULL, 0, 1, 1, 0, 0, 0, NULL),
(196, 300, 'STAVBY ŠUPÁK, s.r.o.', 'ČR', 'Koliště 278/63', 'Brno', '602 00', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(197, 301, 'Lukáš Beran', 'ČR', 'Terezy Stolcové 1020', 'Kostelec nad Labem', '277 13', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, 'viz. BERAN 2, s.r.o.'),
(198, 302, 'H 3 Inženýrské stavby, spol. s r.o.', 'ČR', 'Brněnská 1002/27', 'Blansko', '678 01', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, 'dělali zemní práce a zámkovky při rekonstrukci v Kuřimi'),
(199, 303, 'GESTAV, s.r.o.', 'ČR', 'Zápská 441', NULL, '250 01', NULL, NULL, 'gestav@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(200, 304, 'STANAP Karlovy Vary s.r.o.', 'ČR', 'Závodu míru 579/1', 'Karlovy Vary', '360 17', NULL, NULL, 'info@stanap.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(201, 305, 'Provozní Nový Malín s.r.o.', 'ČR', 'Nový Malín 240', 'Nový Malín', NULL, NULL, NULL, 'fochler@novymalin.cz', NULL, 0, 1, 1, 0, 0, 0, NULL),
(202, 306, 'GAROMI s.r.o.', 'SR', 'Lietava 297', 'Lietava', '013 18', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(203, 307, 'NORAN s.r.o.', 'SR', 'Nobelova 34', 'Bratislava', '831 02', NULL, NULL, 'valko@noran.sk', NULL, 0, 0, 1, 1, 0, 0, NULL),
(204, 308, 'S u b t e r r a a.s.', 'ČR', 'Koželužská 2246/5', 'Praha 8', '180 00', NULL, NULL, 'pkalisek@subterra.cz', NULL, 1, 1, 1, 1, 0, 0, 'Ing. Jiří Panuška +420702118575'),
(205, 309, 'STAVBY HORIZONT s.r.o.', 'ČR', 'Smetanovo návrší 186/4', 'Dubí', '417 02', NULL, NULL, 'r-konrad@volny.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(206, 310, 'Petr Kučera', 'ČR', 'Polní Chrčice 9', 'Kolín', '280 02', NULL, NULL, 'kuci.petr@seznam.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(207, 311, 'Dlaždičská s.r.o.', 'ČR', 'Červená Lhota 3', 'Bílá Lhota', '783 21', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 0, 0, NULL),
(208, 312, 'MRJ s.r.o.', 'ČR', 'Za Žoskou 2506', 'Nymburk', '288 02', NULL, NULL, 'jilek@mrj.global.cz', NULL, 0, 1, 1, 1, 0, 0, NULL),
(209, 170, 'STROJE a ZARIADENIA', 'SR', 'Drieňova 1', 'Bratislava', '82101', NULL, NULL, 'zdimal@strojezar.sk', NULL, 0, 1, 1, 0, 1, 0, NULL),
(210, 171, 'A.S. MOZAIKA, s.r.o.', 'SR', 'Lúčnica nad Žitavou 367', 'Lúčnica nad Žitavou', '95188', NULL, NULL, NULL, 'asmozaika@asmozaika.sk', 0, 1, 1, 1, 0, 0, 'Šulková +421915126228'),
(211, 172, 'APEX JUDr. Jaroslav Varga', 'SR', 'Stummerova 1276', 'Topoľčany', '95501', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(212, 173, 'B&B PLUS s.r.o.', 'SR', 'Sv. Juraja č. 9', 'Dunajská Streda', '92901', NULL, NULL, NULL, 'bbplus@bbplus.sk', 0, 1, 1, 1, 0, 0, NULL),
(213, 174, 'Cvaško František', 'SR', 'Školská 232/4', 'Považská Bystrica', '01701', NULL, NULL, NULL, 'cvasko@cvasko.sk', 0, 0, 0, 0, 0, 0, NULL),
(214, 175, 'Doprastav, a.s.', 'SR', 'Blagoevova 28', 'Bratislava', '85261', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(215, 176, 'EUROVIA - Cesty, a.s. závod 04 Prešov', 'SR', 'Jelšová 24', 'Prešov', '08005', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(216, 177, 'FINISTAV stavebniny', 'SR', NULL, 'Teplička nad Váhom', NULL, NULL, NULL, NULL, 'cerveny.martin@finistav.sk', 0, 0, 0, 0, 0, 0, 'info@finistav.sk'),
(217, 178, 'IVS REKON, s.r.o.', 'SR', 'Kopčianska 20', 'Bratislava 5', '85101', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(218, 179, 'JUNASTAV s.r.o.', 'SR', 'Hlavná ulica 46/24', 'Špačince', '91951', NULL, NULL, NULL, 'junastav@junastav.sk', 0, 0, 0, 0, 0, 0, NULL),
(219, 180, 'L.K.-staving s.r.o.', 'SR', 'Brestov 174', 'Brestov', '06601', NULL, NULL, NULL, 'lkukol@stonline.sk', 0, 0, 0, 0, 0, 0, NULL),
(220, 181, 'LBD', 'SR', 'Nádražná 481', 'Ludanice', '95611', '+421 915755262', NULL, 'info@lbdzamkovedlazby.sk', 'www.lbdzamkovedlazby.sk', 0, 1, 1, 1, 0, 0, 'IČO:  44341601'),
(221, 182, 'MaM Marián Pilát', 'SR', 'SNP 1464/97-5', 'Považská Bystrica', '01701', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(222, 183, 'N - stav, s.r.o.', 'SR', 'Nitrianska cesta 1', 'Senec', '90301', NULL, NULL, NULL, 'nstav@zoznam.sk', 0, 0, 0, 0, 0, 0, NULL),
(223, 184, 'Palkovič František', 'SR', 'Lipová 1233', 'Senica', '90501', NULL, NULL, NULL, 'palkovicsmc@stonline.sk', 0, 1, 1, 1, 0, 0, 'zasílací adresa: Hlboké 258, 906 31 Hlboké'),
(224, 185, 'PAVLOVIČ', 'SR', 'Sekule 567', NULL, NULL, '+421903691783', NULL, NULL, 'info@ropasekule.sk', 0, 1, 1, 1, 0, 0, 'starý email: ropasekule@zoznam.sk'),
(225, 186, 'R - 3S s.r.o.', 'SR', 'Šafárikova 6', 'Rožňava', '04801', NULL, NULL, NULL, 'tris-ke@stonline.sk', 0, 0, 0, 0, 0, 0, NULL),
(226, 187, 'Rehak Paving s.r.o.', 'SR', 'Dopravná 18', 'Topoľčany', '95501', NULL, NULL, NULL, 'info@rehak.sk', 1, 1, 1, 1, 1, 0, NULL),
(227, 188, 'Rivent spol. s r.o.', 'SR', 'Na Horke 8676/32', 'Zvolen', '96001', NULL, NULL, NULL, 'ivan.sedla@stonline.sk', 0, 0, 0, 0, 0, 0, NULL),
(228, 189, 'SATES a.s.', 'SR', 'Slovenských partizánov 1423/1', 'Považská Bystrica', '01701', NULL, NULL, NULL, 'sates@sates.sk', 0, 0, 0, 0, 0, 0, NULL),
(229, 190, 'Sedláček Ľubomír Ing.', 'SR', 'Hradná 31', 'Šintava', '92551', NULL, NULL, NULL, NULL, 0, 1, 1, 1, 1, 0, NULL),
(230, 191, 'SESTAV, s.r.o.', 'SR', 'Sihoť 825/85', 'Ilava', '01901', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(231, 192, 'STAVMAK Ing. Juraj Kaličiak', 'SR', 'Nová 7', 'Vrútky', '03601', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(232, 193, 'SyBricks', 'SR', 'Kollárova 85 A', 'Martin', '03601', NULL, NULL, NULL, 'sybricks@sybricks.sk', 0, 1, 1, 1, 0, 0, NULL),
(233, 194, 'Šumega Milan', 'SR', NULL, NULL, NULL, NULL, NULL, NULL, 'sumega@cvasko.sk', 0, 1, 1, 0, 0, 0, NULL),
(234, 195, 'Technické služby stavby s.r.o.', 'SR', 'Technická 6', 'Bratislava 2', '82104', NULL, NULL, NULL, 'zakazka@tsstavby.sk', 0, 0, 0, 0, 0, 0, NULL),
(235, 196, 'TECHNOSTAV Nitra, spol. s r.o.', 'SR', 'Novozámocká 195', 'Nitra', '94905', NULL, NULL, NULL, 'jcivan@post.sk', 0, 0, 0, 0, 0, 0, NULL),
(236, 197, 'TSS GRADE a.s.', 'SR', 'Dunajská 48', 'Bratislava', '811 08', NULL, NULL, 'info@tss.sk', 'cabadaj@trnavska-spolocnost.sk', 0, 1, 1, 1, 0, 0, 'palenik@trnavska-spolocnost.sk\r\n(bývalá Trnavská stavebná spoločnosť a.s.)'),
(237, 198, 'TSM Nové Město nad Váhom', 'SR', 'Klčové 34', 'Nové Město n. V.', '91501', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL),
(238, 199, 'VIRTUS a.s.', 'SR', 'Abovská 1', 'Košice', '04001', NULL, NULL, NULL, 'rusnak@virtus-as.sk', 0, 0, 0, 0, 0, 0, NULL),
(239, 200, 'Zavarský Miloš', 'SR', 'Krakovská 11', 'Šúrovce', '91925', '+421 377828288', '+421 377828130', 'staveko1@staveko-smf.sk', 'www.staveko-smf.sk', 0, 0, 0, 0, 0, 0, NULL),
(240, 201, 'Premona, s.r.o.', 'SR', 'Pod zlatým brehom 46', 'Nitra 1', '949 01', NULL, NULL, 'premona@premona.sk', 'www.premona.sk', 0, 0, 1, 1, 0, 0, 'IČO: 36710440, DIČ: SK2022284858'),
(241, 202, 'Ing. Marián Sahul STAVEKO', 'SR', 'Benkova 13', 'Nitra', '949 11', '+421377828296', NULL, 'krivacka@staveko-smf.sk', 'http://www.staveko-smf.sk', 0, 1, 1, 1, 0, 0, 'Doručovací adresa: STAVEKO, 951 21  Rišňovce 4'),
(242, 166, 'Červeňák Jan', 'ČR', 'Ke hřbitovu 1218', 'Kolín', '280 00', NULL, NULL, 'cervenakjan@centrum.cz', NULL, 0, 0, 0, 1, 0, 0, NULL),
(243, 167, 'DILOS Czech s.r.o.', 'ČR', 'Buničitá 1085', 'Vratimov', '739 32', NULL, NULL, 'info@dilosczech.cz', 'www.dilosczech.cz', 0, 0, 0, 1, 0, 0, NULL),
(244, 0, 'ANNASTAV CZ s.r.o.', 'ČR', 'Vyšehradská 2', 'Praha', '12800', '774575155', '', '', '', 0, 1, 1, 1, 0, 0, NULL),
(245, 0, 'Chládek a Tintěra Havlíčkův Brod, a.s.', 'ČR', 'Průmyslová 941', 'Havlíčkův Brod', '58001', '602645910', '', 'hajek@chladek-tintera.cz', 'chladek-tintera.cz', 0, 1, 1, 1, 0, 0, NULL),
(246, 0, 'Šerhalka s.r.o.', 'ČR', 'Nádražní 1178', 'Miroslav', '67102', '727858845', '', '', '', 0, 1, 0, 1, 1, 0, NULL),
(247, 0, 'Jaroslav Kamidra', 'ČR', 'K Dálnici ev.č. 14', 'Praha - Uhříněves', '10400', '720213982', '', 'jaroslav.kamidra@seznam.cz', '', 0, 1, 1, 1, 0, 0, 'ič 65431731');

-- --------------------------------------------------------

--
-- Struktura tabulky `objednavka`
--

CREATE TABLE IF NOT EXISTS `objednavka` (
  `id` int(11) NOT NULL,
  `datumobjednavky` date NOT NULL,
  `prijal` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `datumvyrizeni` date DEFAULT '0000-00-00',
  `vyridil` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `predmetobjednavky` text COLLATE utf8_czech_ci NOT NULL,
  `jakvyridil` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `cislo_obj_jejich` varchar(10) COLLATE utf8_czech_ci DEFAULT NULL,
  `cislo_obj_nase` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `klient_id` int(11) NOT NULL,
  `nabidka` tinyint(4) DEFAULT '1',
  `sleva` int(11) DEFAULT '0',
  `eur` tinyint(4) DEFAULT '0',
  `poznamka` text COLLATE utf8_czech_ci
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `objednavka`
--

INSERT INTO `objednavka` (`id`, `datumobjednavky`, `prijal`, `datumvyrizeni`, `vyridil`, `predmetobjednavky`, `jakvyridil`, `cislo_obj_jejich`, `cislo_obj_nase`, `klient_id`, `nabidka`, `sleva`, `eur`, `poznamka`) VALUES
(1, '2016-06-03', 'Kotol', '0000-00-00', NULL, '1x Mini, 1x Simplex, 1x Palice dlouhá, 4ks Špalíky', NULL, NULL, 'O170001', 203, 1, 0, 0, 'Doprava Optimas'),
(2, '2016-08-11', 'Kotol', '0000-00-00', NULL, '1x PH 0,5-5,90 m', NULL, NULL, 'O170002', 204, 0, 0, 0, 'Mulltimex');

-- --------------------------------------------------------

--
-- Struktura tabulky `objednavka_has_produkt`
--

CREATE TABLE IF NOT EXISTS `objednavka_has_produkt` (
  `objednavka_id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `kolik` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `produkt`
--

CREATE TABLE IF NOT EXISTS `produkt` (
  `id` int(11) NOT NULL,
  `nazevproduktu` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `cena` float DEFAULT NULL,
  `katalog_id` int(11) NOT NULL,
  `cena_eur` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `produkt`
--

INSERT INTO `produkt` (`id`, `nazevproduktu`, `cena`, `katalog_id`, `cena_eur`) VALUES
(1, 'Optimas typ H99', 954164, 53855, 36280),
(2, 'hydraulické kleště Multi 6 vč. pokládacího přítlaku', 221446, 47097, 8420),
(3, 'kabina', 3525, 53856, 92708),
(4, 'vytápění kabiny', 33664, 50056, 1280),
(5, 'automatika kleští', 39450, 50057, 1500),
(6, 'dvoustupňový výložník', 32218, 50058, 1225),
(7, 'otočné zařízení (nekonečné 360°)', 38661, 50059, 1470),
(8, 'paket světel (2 přední světlomety, 1 zadní a pracovní světlomety)', 18279, 50060, 695),
(9, 'maják', 6049, 50061, 230),
(10, 'rádio', 7101, 50065, 270),
(11, 'držák mobilního telefonu (nebo vysílačky)', 868, 50066, 33),
(12, 'komfortní sedadlo vč. vyhřívání - příplatek', 29193, 50069, 1110),
(13, 'rádio s bluetooth handsfree sadou + zásuvka 12V - příplatek', 4340, 53471, 165),
(14, 'paket světel LED (2 přední světlomety, 1 zadní a pracovní světlomety) - příplatek', 19725, 53343, 750),
(15, 'vyhřívaná zpětná zrcátka - příplatek', 3551, 50156, 135),
(16, 'paket pohon všech kol (včetně širokých pneumatik a protiprokluzu)', 106778, 51379, 4060),
(17, 'široké pneumatiky, 4 ks - příplatek', 5996, 51850, 228),
(18, 'lak na přání dle RAL, jednobarevný', 21961, 50067, 835),
(19, 'lak na přání dle RAL, dvoubarevný', 34453, 52732, 1310),
(20, 'oko pro manipulaci jeřábem nebo hydraulickou rukou', 16832, 50068, 640),
(21, 'Optimas  Zametací zařízení (jen pro Optimas H88/H99)', 70221, 51421, 2670),
(22, 'mechanický sběrný zásobník vč. 3. stabilizačního kola', 26247, 51801, 998),
(23, 'Optimas  spárovací zařízení (jen pro Optimas H88/H99)', 83108, 47149, 3160),
(24, 'Optimas  vůz na vodu (jen pro Optimas H88/H99)', 41554, 47151, 1580),
(25, 'Optimas  přídavná nádrž na vodu', 4997, 47152, 190),
(26, 'Optimas  hydraulické kleště na obrubníky (0,45-1,40 m)', 72851, 47099, 2770),
(27, 'prodloužení kleští na rozsah úchopu 200 cm', 6838, 50082, 260),
(28, 'Optimas  Vacuum BE (jen pro Optimas H88/H99)', 137549, 47102, 5230),
(29, 'adaptér na přísavnou desku do 200 kg (z programu hadicové zvedání)', 7364, 47103, 280),
(30, 'adaptér na přísavnou desku 200 - 500 kg (z programu Vacu-Magnet)', 11835, 47751, 450),
(31, 'Optimas Zametací zařízení vč.závěsu na vidlice a 3. stabilizačního kola', 97179, 51761, 3695),
(32, 'mechanický sběrný zásobník', 15727, 51422, 598),
(33, 'Optimas spárovací zařízení vč. nádrže na vodu 1000 l s připojením na hadici C pro rychlé plnění', 201984, 52384, 7680),
(34, 'Optimas  hydraulická lopata na rozprostření písku (objem 0,9 m³)', 180944, 49114, 6880),
(35, 'Optimas  lžíce s dopravníkem materiálu Finliner', 245774, 53686, 9345),
(36, 'rychloupínací deska', 23539, 53265, 895),
(37, 'skluzavka materiálu', 3892, 53693, 148),
(38, 'rám pro upevnění štítu na úpravu krajnic', 23407, 53835, 890),
(39, 'ocelový štít na úpravu krajnic', 15254, 53792, 580),
(40, 'gumový štít na úpravu krajnic', 8811, 83833, 335),
(41, 'otočné zařízení kleští pro kleště na obrubníky (vyžaduje druhý hydraulický okruh)', 18147, 47203, 690),
(45, 'Optimas  Pflastergreifer inkl. Anlegehilfe 2 Hydraulikkreise erforderlich', 239067, 47759, 9090),
(47, 'tahový ventil', 10783, 52150, 410),
(48, 'elektrický řídící pedál ', 10783, 52063, 410),
(49, 'Optimas Vacu-Magnet 500 P', 146228, 52188, 5560),
(50, 'Optimas Vacu-Magnet 500 H', 142546, 51934, 5420),
(51, 'Optimas Vacu-Magnet 1500 P', 200143, 52218, 7610),
(52, 'Optimas Vacu-Magnet 1500 H', 187782, 51935, 7140),
(53, 'adaptér na přísavnou desku do 200 kg (z programu hadicové zvedání)', 8153, 52225, 310),
(54, 'přísavná deska do 300 kg (520 x 320 mm)', 18410, 52209, 700),
(55, 'přísavná deska do 500 kg (620 x 420 mm)', 22224, 52210, 845),
(56, 'přísavná deska do 750 kg (720 x 520)', 26169, 52211, 995),
(57, 'přísavná deska do 1.000 kg (820 x 620 mm)', 31560, 52212, 1200),
(58, 'přísavná deska do 1.500 kg (1.120 x 720 mm)', 40765, 52213, 1550),
(59, 'Optimas Vacu-Mobil 140 E', 628570, 51902, 23900),
(60, 'Optimas Vacu-Mobil Allrounder', 965210, 51929, 36700),
(61, 'Optimas Vacu-Pallet-Mobil P (benzin, motor Honda)', 998085, 51904, 37950),
(62, 'Optimas Vacu-Pallet-Mobile D (diesel, motor Hatz)', 1103280, 53474, 41950),
(63, 'automatická nivelace výložníku VPM', 51285, 54097, 1950),
(64, 'Optimas Vacu-Lift H', 520740, 51905, 19800),
(65, 'Optimas Vacu-Lift P', 540991, 52289, 20570),
(66, 'Optimas Vacu-Lift D', 552300, 51906, 21000),
(67, 'přísavná deska 370 x 370 mm', 11099, 52243, 422),
(68, 'přísavná deska 350 x 500 mm', 11414, 52294, 434),
(69, 'přísavná deska 5-7x pro žlabovky a desky v řadách', 60490, 52084, 2300),
(70, 'stranová přísavná deska na chodníkové obrubníky (max. šířka 100 mm)', 18279, 52097, 695),
(71, 'zalomená přísavná deska na silniční obrubníky', 20909, 52198, 795),
(72, 'zalomená přísavná deska na obloukové obrubníky', 20909, 52241, 795),
(73, 'Optimas-PlanMatic 2,0 m', 788737, 52627, 29990),
(74, 'Laser Leica Rugby 410 s příslušenstvím', 123347, 52720, 4690),
(76, 'Leica Tri-Sonic systém', 67591, 52719, 2570),
(77, 'Leica MD40  laserový přijímač - příplatek', 72062, 53361, 2740),
(78, 'radlice o šířce 2,60 m - příplatek', 28667, 52744, 1090),
(79, 'hydraulicky sklopná radlice', 77848, 53478, 2960);

-- --------------------------------------------------------

--
-- Struktura tabulky `stroj`
--

CREATE TABLE IF NOT EXISTS `stroj` (
  `id` int(11) NOT NULL,
  `vyrobce` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `typ` varchar(45) COLLATE utf8_czech_ci DEFAULT NULL,
  `vyrobnicislo` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `rokvyroby` int(11) DEFAULT NULL,
  `poznamka` text COLLATE utf8_czech_ci,
  `stav` varchar(25) COLLATE utf8_czech_ci DEFAULT 'volné',
  `klient_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `create_time`) VALUES
('safapa', 'patrik.safar@educanet.cz', '$2a$07$sillysaltforoptimasasOkW4dHqUkUW/mR/b5oLiKNOVfjfryCFi', '2017-11-05 08:53:27');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `dopravce`
--
ALTER TABLE `dopravce`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `jednani`
--
ALTER TABLE `jednani`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jednani_klient1_idx` (`klient_id`);

--
-- Klíče pro tabulku `jednatel`
--
ALTER TABLE `jednatel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jednatel_klient_idx` (`klient_id`);

--
-- Klíče pro tabulku `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_objednavka_klient1_idx` (`klient_id`);

--
-- Klíče pro tabulku `objednavka_has_produkt`
--
ALTER TABLE `objednavka_has_produkt`
  ADD KEY `fk_objednavka_has_produkt_produkt1_idx` (`produkt_id`),
  ADD KEY `fk_objednavka_has_produkt_objednavka1_idx` (`objednavka_id`);

--
-- Klíče pro tabulku `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `katalog_id_UNIQUE` (`katalog_id`);

--
-- Klíče pro tabulku `stroj`
--
ALTER TABLE `stroj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stroj_klient1_idx` (`klient_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `dopravce`
--
ALTER TABLE `dopravce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pro tabulku `jednani`
--
ALTER TABLE `jednani`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pro tabulku `jednatel`
--
ALTER TABLE `jednatel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pro tabulku `klient`
--
ALTER TABLE `klient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pro tabulku `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT pro tabulku `stroj`
--
ALTER TABLE `stroj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `jednani`
--
ALTER TABLE `jednani`
  ADD CONSTRAINT `fk_jednani_klient1` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `jednatel`
--
ALTER TABLE `jednatel`
  ADD CONSTRAINT `fk_jednatel_klient` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  ADD CONSTRAINT `fk_objednavka_klient1` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `objednavka_has_produkt`
--
ALTER TABLE `objednavka_has_produkt`
  ADD CONSTRAINT `fk_objednavka_has_produkt_objednavka1` FOREIGN KEY (`objednavka_id`) REFERENCES `objednavka` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_objednavka_has_produkt_produkt1` FOREIGN KEY (`produkt_id`) REFERENCES `produkt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `stroj`
--
ALTER TABLE `stroj`
  ADD CONSTRAINT `fk_stroj_klient1` FOREIGN KEY (`klient_id`) REFERENCES `klient` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
