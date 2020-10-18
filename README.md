# The Movie DB (Movies Site)
This repository contains a movies site I designed and developed in my second year of college.
It uses HTML, CSS, PHP and an SQL database. All the movies and their relevant data are live text directly from the SQL database. The movie posters and trailers are embedded from links stored in the database.

To install this project you will need to:
1. Install a local Apache Web Server and a MySQL database server. <a href="https://www.apachefriends.org/index.html">XAMPP</a> is a good piece of software that installs both.   
2. Create a new database called 'movies' and import the <i>movies.sql</i> file located in this repository.
3. <b>NB:</b> Make sure the Connection.php file has the correct information for your local web server and database.

I got an A grade for this module (Advanced Web Design and Development).

You can browse through all of my code above and see some screenshots of the project in action below:

<b>Overall Design</b><br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/movies_db/master/screenshots/sc1.png" alt="sc1" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/movies_db/master/screenshots/sc2.png" alt="sc2" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/movies_db/master/screenshots/toy-story-view.png" alt="toy story view" height="450"><br>

<b>Edit and Add Individual Movies</b><br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/movies_db/master/screenshots/toy-story-edit.png" alt="toy story edit" height="450">
<br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/movies_db/master/screenshots/add-movie.png" alt="add movie" height="450">
<br>

<b>Search Functionality</b><br>
<img src="https://raw.githubusercontent.com/MarkSweeney96/movies_db/master/screenshots/ted-search.png" alt="ted search" height="450">
<br>

<b>Sources</b><br>
All movie data and images were sourced from https://www.themoviedb.org/. All movie trailers were sourced from YouTube. The links to the images used are in the database under 'poster' and the links to the movie trailers are under 'trailer'.
