-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 20, 2019 alle 12:40
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
--

DROP DATABASE if EXISTS newspaper;
CREATE DATABASE newspaper;

use newspaper;

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--

CREATE TABLE `articles` (
  `article_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `publication_date` date NOT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`article_id`, `title`, `content`, `publication_date`, `author_id`) VALUES
(1, 'Quegli investimenti del Vaticano su Lapo Elkann e in un film su Elton John', 'E invece la realtà supera ogni fantasia. Già, perché la Santa Sede, attraverso il Centurion Global Fund – un fondo di investimento internazionale con sede a La Valletta, capitale di Malta – ha finanziato lautamente Italia Independent del rampollo Elkann e la pellicola Rocketman.', '2019-12-04', 3),
(2, 'Lettura dei quotidiani contro informazione sul Web, chi vince?', 'Il 18% va in edicola 3-4 volte a settimana. Ma non bisogna disperare: esistono ancora i fedelissimi: il 26% non rinuncia al quotidiano. Come incrementare l interesse? Proponendo copie online e insistendo sulle pagine culturali che non inseguono solo la notizia ma propongono una lettura critica dell accaduto.', '2019-11-12', 3),
(3, 'Poligrafici, rinnovato il contratto nazionale di lavoro', 'ROMA - E stato siglato oggi dalla Fieg (Federazione italiana editori), Asig (Associazione stampatori di giornali) e Slc-Cgil, Fistel-Cisl e Uilcom-Uil, il nuovo contratto nazionale di lavoro per i dipendenti di aziende editrici, stampatrici di giornali quotidiani e di agenzie di stampa. La trattativa è durata circa quattro anni. L accordo partirà dal primo gennaio prossimo e avrà durata di un anno per la parte normativa ed economica.', '2019-05-02', 4),
(4, 'Audiweb: Nessun dato sensibile passerà da Facebook con il nuovo sistema di rilevazione', 'MILANO - Nessuna informazione sensibile sarà inviata ai server di Facebook nell ambito della rilevazione Audiweb 2.0, assicura il consorzio in merito a quanto scritto dall agenzia AdnKronos sul nuovo sistema di rilevazione dei contatti online. Audiweb precisa che, esattamente come già illustrato fin dalla prima comunicazione sulla nuova ricerca e nelle successive, incluse quelle all Agcom, ed alla stessa Adnkronos lo scorso 14 aprile, nessuna informazione, sensibile sarà inviata ai server di Facebook. Dal consorzio si spiega che Nielsen, fornitore di Audiweb, invierà a Facebook esclusivamente codici criptati che corrispondono semplicemente a dei contenuti e, quindi, non rappresentano dati sensibili relativi agli editori né, tanto meno, di utenti che in alcun modo saranno profilati su Facebook attraverso la nuova ricerca.', '2018-12-04', 3),
(5, 'La Spoon River dei migranti', 'IL GIORNALE tedesco Der Tagesspiegel ha pubblicato una lista con i nomi di circa 33mila persone morte mentre cercavano di raggiungere l Europa, nei vari flussi migratori dal 1993 a quest anno. L elenco è stato pubblicato online e sulla versione cartacea del giornale venerdì 10 novembre. Le Nazioni Unite stimano che solo lo scorso anno siano morti oltre 5mila migranti, durante i loro tentativi di raggiungere l Europa attraverso il Mediterraneo. L iniziativa è orientata non solo a sensibilizzare i lettori sul tema dei migranti, ma anche a criticare le politiche adottate da molti paesi europei per quanto riguarda richiedenti asilo, rifugiati e migranti in genere, provenienti spesso da Paesi con guerre civili o interessati da grande povertà.', '2018-04-07', 4),
(6, 'Il lettore di giornali', '\"Il lettore di giornali è una razza speciale, un curioso, un pettegolo, uno che ha fretta; gli piacciono le notizie titolate in modo brusco, è un goloso di rivelazioni, gli piace essere informato alla svelta, alla brava, gli piace stupirsi, irritarsi, commuoversi\".\nGiorgio Manganelli, Improvvisi per macchina da scrivere\n \nNonostante internet, web2.0 e infine i social network il ritratto resta attuale. Niente di nuovo sotto il sole.', '2019-12-20', 4),
(7, 'I nuovi potenti e l informazione', 'IL POTERE attacca l informazione quando è in difficoltà, quando la vive come un intralcio alla sua azione o alla sua narrazione. Succede da sempre, ma oggi i nuovi potenti, che amano comunicare direttamente con i cittadini senza fastidiose mediazioni e senza il rischio di fastidiose domande, sono più radicali e cercano di risolvere il problema all origine: delegittimare i giornalisti. I nuovi potenti amano raffigurarsi come outsider, si chiamino Trump o Grillo, come freschi e genuini rappresentanti del popolo a cui giornalisti e giudici cercano invece di mettere i bastoni tra le ruote. Nel caso italiano la polemica contro i magistrati ancora non c è ma è solo questione di tempo.', '2019-12-20', 3),
(8, 'Il giudice è il lettore', 'L ITALIA è al 77esimo posto nella classifica della libertà di stampa, dietro Paesi africani come Burkina Faso e Benin. Il motivo? Non quello che pensano i detrattori del nostro giornalismo, ovvero l asservimento al potere, ma il contrario: troppi sono i giornalisti minacciati dalle mafie e dalla criminalità organizzata per le loro inchieste su malaffare e corruzione. Come se non bastasse abbiamo il record delle cause contro i giornali intentate dai politici, che mal sopportano l idea che qualcuno faccia loro le pulci o li critichi e così ricorrono ai tribunali con evidente scopo intimidatorio.', '2017-01-26', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `authors`
--

CREATE TABLE `authors` (
  `author_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(250) CHARACTER SET utf8 NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `authors`
--

INSERT INTO `authors` (`author_id`, `name`, `surname`, `email`, `password`) VALUES
(3, 'nome', 'cognome', 'email@test.it', '$2y$10$RuSIDdeboQcHtdmUx7txFuXt8dfhu3RvVlq/mAEHtKcY7TpowEoFW'),
(4, 'nome2', 'cognome2', 'email2@test.it', '$2y$10$kL5OWXTCEOUehUGHFrwdn.gahCqM2JpPe77Y4QKzKsfy0EcgzRuHe');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `author_id` (`author_id`);

--
-- Indici per le tabelle `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `Articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DROP user if exists 'phpProject'@'localhost';
CREATE USER 'phpProject'@'localhost' IDENTIFIED BY 'phpPro9?';
GRANT ALL PRIVILEGES ON newspaper. * TO 'phpProject'@'localhost';
