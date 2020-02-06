-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2020, 15:20
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'warzywa'),
(2, 'owoce');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categoryy`
--

CREATE TABLE `categoryy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categoryy`
--

INSERT INTO `categoryy` (`id`, `name`, `slug`, `text`, `image`, `baner`) VALUES
(12, 'Nowy artykuł', 'krótki wstęp Most of the answers here are misleading because they relate to Bootstrap 3. By default, the Bootstrap 4 Navbar is transparent. Just remember to use navbar-light or navbar-dark so the link colors work against the contrast of the background col', 'aaaDziękujemy za odwiedzenie naszej strony. Z dniem 25 maja 2018 r. weszło w życie Rozporządzenie Parlamentu Europejskiego i Rady (UE) 2016/679 z dnia 27 kwietnia 2016 r. w sprawie ochrony osób fizycznych w związku z przetwarzaniem danych osobowych i w sprawie swobodnego przepływu takich danych oraz uchylenia dyrektywy 95/46/WE (określane popularnie jako „RODO\"). Wprowadziło ono szereg zmian, istotnych zwłaszcza dla rynku online.\r\n\r\nAdministratorem Twoich danych osobowych jesteśmy my, jako właściciel serwisu z którego właśnie korzystasz. Nasze pełne dane znajdziesz w polityce prywatności dostępnej na naszej stronie. W przypadku wyrażenia przez Ciebie zgód, o które prosimy Twoje dane zostaną przekazane do naszych Zaufanych Partnerów. Ich pełną listę możesz zawsze sprawdzić w naszej polityce prywatności.\r\n\r\nW celu świadczenia najwyższej jakości usług zarówno my, jak i nasi Zaufani Partnerzy na naszej stronie korzystamy z tzw. plików cookie w celu: lepszego doboru prezentowanych treści, personalizowania reklam a także w celu analizowania ruchu na stronie. Niektóre podmioty trzecie wymagają Twojej zgody na zbieranie danych, aby móc wyświetlać Ci spersonalizowane treści i reklamy. Dzięki takiemu wykorzystaniu technologii cookie jesteśmy w stanie emitować reklamy jak najlepiej dopasowane do Twoich preferencji.\r\n\r\nKlikając przycisk „Zaakceptuj wszystko\" zgadzasz się na postanowienia zawarte powyżej.\r\n\r\nW każdej chwili możesz edytować wyrażone zgody (również całkowicie je wycofać) klikając w', '115f4b2ae64e52160f7778d68ac2e2d8.jpeg', '6b90bf513618eb8b4773b79949b2dfb7.jpeg'),
(14, 'O rodo', 'Stwierdzenie, jakoby brexit był tematem numer jeden, którym żyje cała Europa, to drobne wyolbrzymienie. Bliżej mu raczej do niekończącej się historii, w trakcie słuchania której wiele osób traci zainteresowanie finałem.', 'Stwierdzenie, jakoby brexit był tematem numer jeden, którym żyje cała Europa, to drobne wyolbrzymienie. Bliżej mu raczej do niekończącej się historii, w trakcie słuchania której wiele osób traci zainteresowanie finałem. Owszem, może i jest on na językach wszystkich Brytyjczyków, z pewnością też nie daje zmrużyć oka paru ważnym urzędnikom unijnym, odpowiedzialnym za sprawne przeprowadzenie tego procesu, lecz przeciętna osoba tematem wyjścia Wielkiej Brytanii może być po prostu zmęczona. \r\n\r\nReferendum dotyczące dalszego członkostwa Wielkiej Brytanii w UE odbyło się w czerwcu 2016 r., co dobrze ilustruje, jak długo trwa już ten proces.\r\n\r\nJednym jest jednak śledzenie tego tematu z czystego zainteresowania, a drugim – trzymanie ręki na pulsie i oczekiwanie na zmiany, które brexit może przynieść przedsiębiorcom. Szczególnie dla tej grupy osób przydatne może okazać się poniższe opracowanie. W pigułce prezentujemy najważniejsze z ostatnich wydarzeń na linii Wyspy – UE i sygnalizujemy, przez pryzmat ochrony danych osobowych, co każdy przedsiębiorca powinien zweryfikować w związku z brexitem i jakie kroki podjąć, aby pobrexitowa rzeczywistość nie sparaliżowała przepływu danych przetwarzanych w ramach działalności gospodarczej.\r\n\r\nPrzegląd ostatnich wydarzeń – a jednak Wielka Brytania opuszcza Unię\r\nWszystko wskazuje na to, że brexit w końcu dojdzie do skutku. Wielka Brytania ma oficjalnie opuścić UE 31 stycznia 2020 r. Nie było jednak łatwo do tego doprowadzić. Omawiany proces przechodził etapy od wspomnianego referendum, w którym zwolennicy wyjścia z UE zdobyli zaledwie 51,89% głosów, przez bardzo trudne negocjacje na poziomie europejskim, nagłe wątpliwości i przejawy bardziej prounijnych nastrojów mieszkańców Wysp, nieudolność brytyjskiego parlamentu w przedmiocie przyjęcia ostatecznego kształtu porozumienia w sprawie brexitu, aż po wcześniejsze wybory parlamentarne, w których triumfy święciła Partia Konserwatywna z Borisem Johnsonem na czele nowo utworzonego rządu.', 'f133fba48595a445af94a7a6f0a09382.jpeg', 'e753290d46b7d703a7e9b11004a00853.jpeg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryy_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `categoryyid` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `text`, `categoryy_id`, `user_id`, `userid`, `categoryyid`, `username`) VALUES
(30, 'asdasdasfasdfasdf', NULL, NULL, 1, 12, 'admin'),
(31, 'asdasdasdasd', NULL, NULL, 1, 12, 'admin'),
(41, 'asdasdasd', NULL, NULL, 2, 12, 'adam'),
(42, 'nowy komentarz od adama', NULL, NULL, 2, 12, 'adam');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200118140039', '2020-01-18 14:01:55');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `ilosc` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$eWpUUE9ZTklES1BabkFnZQ$w19hPHNnRsVks/svxT35HfZl2JiXK55Kg3NkcjK3Om0'),
(2, 'adam', '', '$argon2id$v=19$m=65536,t=4,p=1$Z3lsNHY5VEsxTWFWS2ZMSg$abjkVzPh5xezM0jktEiwxlQIl0tx16Y/sVgGSvMrNww'),
(4, 'adam1', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WGZhc1NCN2hxcmE0blhlTw$ATXLHoFp/E9ytWJubq+oLIC5iUffMhgUkZ5IpjXPY8Y'),
(5, 'adam2', '[]', '$argon2id$v=19$m=65536,t=4,p=1$SzhTaGg0M2c4UmNnNFZGQg$HwaKqguiW1RniLRz40i3ohGgeK/WzOtKKmA2LVu1gtU'),
(6, 'asdasdas', '[]', '$argon2id$v=19$m=65536,t=4,p=1$Vlk1THVKenFEa2hkZnZRNA$FOaMUJdeH5S9GMYEon/KNSXeMQNT1esK9ZgwV+tuBIE'),
(7, 'adam4', '[]', '$argon2id$v=19$m=65536,t=4,p=1$enBKakJMUDFjZkJUVWVRTg$wslMkkl/os2n2uswOENRWdA+b7Oh8y/ihP2oT9XC8OQ'),
(8, 'adam6', '[]', '$argon2id$v=19$m=65536,t=4,p=1$L3BjYUcwaXNKM2F0cmZ6Rw$qVb/NcWWsyNt9DJTSESTfN/HlIIuwbAxex6Zl5AOC78'),
(11, 'adam10', '[]', '$argon2id$v=19$m=65536,t=4,p=1$dENXcmRYYlpFM2xFSDF2dw$WxFo3W0KtKZLvuHWfpamHwMZfCX3aLpx/9pF945wgnk');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `categoryy`
--
ALTER TABLE `categoryy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5F9E962AC6DA9888` (`categoryy_id`),
  ADD KEY `IDX_5F9E962AA76ED395` (`user_id`);

--
-- Indeksy dla tabeli `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8D12469DE2` (`category_id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `categoryy`
--
ALTER TABLE `categoryy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_5F9E962AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_5F9E962AC6DA9888` FOREIGN KEY (`categoryy_id`) REFERENCES `categoryy` (`id`);

--
-- Ograniczenia dla tabeli `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
