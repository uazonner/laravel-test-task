# Laravel Test Task for Code Care

Online version - http://phplaravel-28637-63264-169983.cloudwaysapps.com/

We have mysql database with table Vocabulary. Table has column word varchar(255).


Create page where user can select several items from Vocabulary table and get hash of them with one or several selected algorithms, e.g. md5, sha1, etc. Please provide at least 5 different algorithms. Result for each selected hash algorithm has to be displayed independently.
User should be able to save hashes to the database and access saved hashes via rest interface.
Provide cli task and schedule it to run each 11 minutes. Task should create xml files with information about user, their saved hashes, origin words and similar words from database. User information should include ip, browser, cookie and country of the user.


Please make sure you’ve provided good documentation for your solution in english with instruction on how to run and use it.


You would get additional points for providing unit/functional tests and code that follows SOLID principles.


As result of this task we expect to get link to git repository.