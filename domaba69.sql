-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 20 Sty 2022, 20:13
-- Wersja serwera: 10.5.12-MariaDB-102+deb11u1
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `domaba69`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `harmonogram_szkolenia`
--

CREATE TABLE `harmonogram_szkolenia` (
  `id` int(11) NOT NULL,
  `szkolenie_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `harmonogram_wystawy`
--

CREATE TABLE `harmonogram_wystawy` (
  `id` int(11) NOT NULL,
  `wystawa_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `rola` int(11) NOT NULL,
  `imie` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `numer_telefonu` varchar(13) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`id`, `login`, `haslo`, `rola`, `imie`, `nazwisko`, `data_urodzenia`, `numer_telefonu`, `email`) VALUES
(1, 'admin', 'admin', 4, 'Daniel', 'Magical', '2020-02-04', '+48801802803', 'admin@gmail.com'),
(2, 'madcun', 'izezI3MKt', 1, 'Madelena', 'Cunney', '0000-00-00', '7708391268', 'mcunney0@linkedin.com'),
(3, 'nasto', 'uS82hY', 1, 'Nari', 'Stoves', '0000-00-00', '+48233802213', 'nstoves1@ameblo.jp'),
(4, 'organizator1', 'org1', 3, 'maciek', 'tepaj', '1998-02-02', '999123224', 'maciektepaj@tmpl.com'),
(5, 'trener1', 'tre1', 2, 'magdalena', 'nowicka', '1982-12-12', '224444444', 'magdalenanowica@gmail.com'),
(6, 'brbafk', 'rrrte23', 1, 'mateusz', 'bielun', '1981-01-01', '123456554', 'matbe@gmail.com'),
(7, 'organizator2', 'org2', 3, 'Nari', 'walczak', '1972-05-02', '457231663', 'loremippsum@gmail.com'),
(8, 'operator1', 'op1', 4, 'Miroslav', 'Zelent', '1990-07-15', '531321764', 'zelentinfa@gmail.com'),
(9, 'trener2', 'tre2', 2, 'Daniel', 'Stoves', '1995-06-30', '324565432', 'danisto@gmail.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `organizator_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `informacje` longtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `organizator_id`, `data`, `godzina`, `informacje`) VALUES
(1, 1, '2022-01-19', '19:15:00', 'Witamy na naszej aplikacji :)'),
(2, 1, '2022-01-19', '19:20:56', 'zobaczcie co tu mamy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `operatorzy`
--

CREATE TABLE `operatorzy` (
  `id` int(11) NOT NULL,
  `konto_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `operatorzy`
--

INSERT INTO `operatorzy` (`id`, `konto_id`) VALUES
(1, 1),
(2, 8);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `organizatorzy`
--

CREATE TABLE `organizatorzy` (
  `id` int(11) NOT NULL,
  `konto_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `organizatorzy`
--

INSERT INTO `organizatorzy` (`id`, `konto_id`) VALUES
(1, 4),
(2, 7);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `szkolenia`
--

CREATE TABLE `szkolenia` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `trener_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `adres` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` longtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `szkolenia`
--

INSERT INTO `szkolenia` (`id`, `nazwa`, `trener_id`, `data`, `godzina`, `adres`, `opis`) VALUES
(2, 'Tresura psa - podstawowe polecenia', 1, '2022-01-23', '10:00:00', 'Olsztyn Żołnierska 4', 'Szkolenie pod okiem profesjonalnego trenera, w którym nauczysz swojego pupila podstawowych komend. Szkolenie odbędzie się na świeżym powietrzu.'),
(3, 'Szkolenie psa pasterskiego', 1, '2022-02-16', '11:00:00', '', 'Szkolenie psa pasterskiego.\r\n-Omówienie komend \r\n-Polecenia przy pomocy gwizdka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `transmisje`
--

CREATE TABLE `transmisje` (
  `id` int(11) NOT NULL,
  `wystawa_id` int(11) NOT NULL,
  `link` longtext CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `transmisje`
--

INSERT INTO `transmisje` (`id`, `wystawa_id`, `link`) VALUES
(1, 2, '<iframe width=\"790\" height=\"444\" src=\"https://www.youtube.com/embed/quhug2kJuE8\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trenerzy`
--

CREATE TABLE `trenerzy` (
  `id` int(11) NOT NULL,
  `konto_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `trenerzy`
--

INSERT INTO `trenerzy` (`id`, `konto_id`) VALUES
(2, 5),
(3, 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczestnicy`
--

CREATE TABLE `uczestnicy` (
  `id` int(11) NOT NULL,
  `wystawa_id` int(11) NOT NULL,
  `zgloszenie_id` int(11) NOT NULL,
  `punkty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `konto_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `konto_id`) VALUES
(1, 2),
(2, 3),
(3, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wystawy`
--

CREATE TABLE `wystawy` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `godzina` time NOT NULL,
  `kategoria` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `liczba_uczestnikow` int(11) NOT NULL,
  `adres` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `organizator_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wystawy`
--

INSERT INTO `wystawy` (`id`, `nazwa`, `data`, `godzina`, `kategoria`, `liczba_uczestnikow`, `adres`, `organizator_id`) VALUES
(3, 'Wystawa psów domowych ', '2022-01-25', '16:00:00', 'domowe', 15, 'Olsztyn Warszawska 13', 1),
(2, 'Wystawa psów pasterskich - edycja zimowa 2022', '2022-01-29', '13:00:00', 'pasterskie', 10, 'Olsztyn Wilczyńskiego 7', 1),
(4, 'Wystawa psów', '2022-02-10', '13:00:00', 'dowolne', 20, 'Olsztyn Żołnierska 4', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(11) NOT NULL,
  `wlasciciel_id` int(11) NOT NULL,
  `wystawa_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `zatwierdzono` int(11) NOT NULL DEFAULT 0,
  `nazwa_zwierzaka` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `rasa_psa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `plec` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `data_urodzenia` date NOT NULL,
  `waga` double NOT NULL,
  `wzrost` double NOT NULL,
  `rodowod` blob DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `wlasciciel_id`, `wystawa_id`, `data`, `zatwierdzono`, `nazwa_zwierzaka`, `rasa_psa`, `plec`, `data_urodzenia`, `waga`, `wzrost`, `rodowod`) VALUES
(1, 1, 2, '2022-01-20', 0, 'Karotek', 'Owczarek Niemiecki', 'samiec', '2019-04-06', 15, 120, NULL),
(2, 2, 2, '2022-01-21', 0, 'Reksiu', 'Samojed', 'samiec', '2018-04-04', 15, 110, NULL),
(3, 1, 3, '2022-01-22', 0, 'Leksiu', 'York', 'samiec', '2020-12-12', 5, 40, NULL),
(4, 2, 2, '2022-01-22', 0, 'Andzia', 'Buldog', 'samica', '2017-08-08', 13, 90, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `harmonogram_szkolenia`
--
ALTER TABLE `harmonogram_szkolenia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `harmonogram_wystawy`
--
ALTER TABLE `harmonogram_wystawy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ogloszenia_organizatora` (`organizator_id`);

--
-- Indeksy dla tabeli `operatorzy`
--
ALTER TABLE `operatorzy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konto_id` (`konto_id`);

--
-- Indeksy dla tabeli `organizatorzy`
--
ALTER TABLE `organizatorzy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konto_id` (`konto_id`);

--
-- Indeksy dla tabeli `szkolenia`
--
ALTER TABLE `szkolenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `szkolenia_trenerow` (`trener_id`);

--
-- Indeksy dla tabeli `transmisje`
--
ALTER TABLE `transmisje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transmisja_wystawy` (`wystawa_id`);

--
-- Indeksy dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konto_id` (`konto_id`);

--
-- Indeksy dla tabeli `uczestnicy`
--
ALTER TABLE `uczestnicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zgloszenie_id` (`zgloszenie_id`),
  ADD KEY `uczestnicy_wystawy` (`wystawa_id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `konto_id` (`konto_id`);

--
-- Indeksy dla tabeli `wystawy`
--
ALTER TABLE `wystawy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `harmonogram_szkolenia`
--
ALTER TABLE `harmonogram_szkolenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `harmonogram_wystawy`
--
ALTER TABLE `harmonogram_wystawy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `operatorzy`
--
ALTER TABLE `operatorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `organizatorzy`
--
ALTER TABLE `organizatorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `szkolenia`
--
ALTER TABLE `szkolenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `transmisje`
--
ALTER TABLE `transmisje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `trenerzy`
--
ALTER TABLE `trenerzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uczestnicy`
--
ALTER TABLE `uczestnicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `wystawy`
--
ALTER TABLE `wystawy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
