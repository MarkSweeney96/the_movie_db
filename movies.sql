-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2020 at 01:36 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(4) NOT NULL,
  `poster` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `releaseDate` date NOT NULL,
  `ageRating` varchar(5) NOT NULL,
  `starRating` int(1) NOT NULL,
  `runtime` int(4) NOT NULL,
  `storyline` varchar(60000) NOT NULL,
  `trailer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `poster`, `title`, `genre`, `releaseDate`, `ageRating`, `starRating`, `runtime`, `storyline`, `trailer`) VALUES
(1, 'https://image.tmdb.org/t/p/original/9rtrRGeRnL0JKtu9IMBWsmlmmZz.jpg', 'Justice League', 'Superhero Movie', '2017-11-17', '12A', 5, 120, 'Fueled by his restored faith in humanity and inspired by Superman&#39;s selfless act, Bruce Wayne enlists the help of his newfound ally, Diana Prince, to face an even greater enemy. Together, Batman and Wonder Woman work quickly to find and recruit a team of metahumans to stand against this newly awakened threat. But despite the formation of this unprecedented league of heroes-Batman, Wonder Woman, Aquaman, Cyborg and The Flash-it may already be too late to save the planet from an assault of catastrophic proportions.', 'https://www.youtube.com/watch?v=r9-DM9uBtVI'),
(2, 'https://image.tmdb.org/t/p/original/xGWVjewoXnJhvxKW619cMzppJDQ.jpg', 'Star Wars: The Last Jedi', 'Action', '2017-12-15', '12A', 5, 150, 'Having taken her first steps into the Jedi world, Rey joins Luke Skywalker on an adventure with Leia, Finn and Poe that unlocks mysteries of the Force and secrets of the past.', 'https://www.youtube.com/watch?v=Q0CbN8sfihY'),
(3, 'https://image.tmdb.org/t/p/original/nZgq5ioz7mC39IALmsua6nrPNek.jpg', 'Pitch Perfect 3', 'Comedy', '2017-12-22', '12A', 4, 90, 'After the highs of winning the World Championships, the Bellas find themselves split apart and discovering there aren&#39;t job prospects for making music with your mouth. But when they get the chance to reunite for an overseas USO tour, this group of awesome nerds will come together to make some music, and some questionable decisions, one last time.', 'https://www.youtube.com/watch?v=qZkuyLsN3gM'),
(4, 'https://image.tmdb.org/t/p/original/zSo9i3K3ZC1r35XaTyrh8SkFxRU.jpg', 'IT', 'Horror', '2017-09-08', '16', 4, 135, 'In the Town of Derry, the local kids are disappearing one by one, leaving behind bloody remains. In a place known as &#39;The Barrens&#39;, a group of seven kids are united by their horrifying and strange encounters with an evil clown and their determination to kill It.', 'https://www.youtube.com/watch?v=hAUTdjf9rko'),
(5, 'https://image.tmdb.org/t/p/w1280/utcy2Cxp0BzbsjbuAmiC6EBpUyx.jpg', 'Whiplash', 'Drama', '2016-01-16', '18', 5, 107, 'A young and talented drummer attending a prestigious music academy finds himself under the wing of the most respected professor at the school, one who does not hold back on abuse towards his students. The two form an odd relationship as the student wants to achieve greatness, and the professor pushes him.>', 'https://www.youtube.com/watch?v=7d_jQycdQGo'),
(6, 'https://image.tmdb.org/t/p/original/dN9LbVNNZFITwfaRjl4tmwGWkRg.jpg', 'Baby Driver', 'Crime', '2017-06-28', '15A', 5, 112, 'This was the most fun Iâ€™ve had watching a movie in a long time. It has everything Iâ€™m looking for in a summer blockbuster: nonstop action, amazing soundtrack (best soundtrack of the year), and hilariously funny. Oh and itâ€™s an Edgar Wright film which has never been a let down. Iâ€™ve never seen the star, Ansel Elgort, in anything before but I know he was in the running to play Han Solo and now Iâ€™m extremely sad he didnâ€™t make the cut â€“ he even dresses like Solo for most of the film. >>>', 'https://www.youtube.com/watch?v=zTvJJnoWIPk'),
(7, 'https://image.tmdb.org/t/p/w1280/osJNr64CNyGhCzdlg6oHt3a6vNA.jpg', 'Ted', 'Comedy', '2012-06-29', '15A', 5, 106, 'John Bennett, a man whose childhood wish of bringing his teddy bear to life came true, now must decide between keeping the relationship with the bear or his girlfriend, Lori.>', 'https://www.youtube.com/watch?v=9fbo_pQvU7M'),
(8, 'https://image.tmdb.org/t/p/w1280/38C91I7Xft0gyY7BITm8i4yvuRb.jpg', 'Ted 2', 'Comedy', '2015-06-26', '16', 4, 115, 'Newlywed couple Ted and Tami-Lynn want to have a baby, but in order to qualify to be a parent, Ted will have to prove he&#39;s a person in a court of law.', 'https://www.youtube.com/watch?v=S3AVcCggRnU'),
(9, 'https://image.tmdb.org/t/p/original/3AJfmBiEXVY7YmxRx2NSdbjuVDc.jpg', 'Thank You for Your Service', 'War', '2017-10-27', '15A', 4, 109, 'A look at how Post Traumatic Stress Disorder affects American servicemen and women returning home from war.', 'https://www.youtube.com/watch?v=50LQGcb5knE'),
(10, 'https://image.tmdb.org/t/p/w1280/yGSxMiF0cYuAiyuve5DA6bnWEOI.jpg', 'Deadpool', 'Comedy', '2016-05-10', '15A', 5, 108, 'Deadpool tells the origin story of former Special Forces operative turned mercenary Wade Wilson, who after being subjected to a rogue experiment that leaves him with accelerated healing powers, adopts the alter ego Deadpool. Armed with his new abilities and a dark, twisted sense of humor, Deadpool hunts down the man who nearly destroyed his life.>', 'https://www.youtube.com/watch?v=ONHBaC-pfsk'),
(11, 'https://image.tmdb.org/t/p/w1280/vlOgaxUiMOA8sPDG9n3VhQabnEi.jpg', 'Minions', 'Family', '2015-07-10', 'G', 2, 91, 'Minions Stuart, Kevin and Bob are recruited by Scarlet Overkill, a super-villain who, alongside her inventor husband Herb, hatches a plot to take over the world.>', 'https://www.youtube.com/watch?v=eisKxhjBnZ0'),
(12, 'https://image.tmdb.org/t/p/original/nk11pvocdb5zbFhX5oq5YiLPYMo.jpg', 'Up', 'Family', '2009-05-28', 'G', 5, 96, 'Carl Fredricksen spent his entire life dreaming of exploring the globe and experiencing life to its fullest. But at age 78, life seems to have passed him by, until a twist of fate (and a persistent 8-year old Wilderness Explorer named Russell) gives him a new lease on life.', 'https://www.youtube.com/watch?v=qas5lWp7_R0'),
(13, 'https://image.tmdb.org/t/p/original/uLlmtN33rMuimRq6bu0OoNzCGGs.jpg', 'Downsizing', 'Comedy', '2018-01-08', 'G', 2, 145, 'A kindly occupational therapist undergoes a new procedure to be shrunken to four inches tall so that he and his wife can help save the planet and afford a nice lifestyle at the same time.', 'https://www.youtube.com/watch?v=UCrBICYM0yM'),
(14, 'https://image.tmdb.org/t/p/w1280/uXDfjJbdP4ijW5hWSBrPrlKpxab.jpg', 'Toy Story', 'Family', '1995-11-22', 'G', 5, 81, 'Led by Woody, Andy&#39;s toys live happily in his room until Andy&#39;s birthday brings Buzz Lightyear onto the scene. Afraid of losing his place in Andy&#39;s heart, Woody plots against Buzz. But when circumstances separate Buzz and Woody from their owner, the duo eventually learns to put aside their differences.>>>', 'https://www.youtube.com/watch?v=v-PjgYDrg70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
