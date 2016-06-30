-------------------------
Web Chat Application
-------------------------

1. Download the application from here: 
https://github.com/dafinakaramanoleva/php_chat

(Click on the green button "Clone or download"
2. Extract the .zip in the chosen directory

3. If you don't have XAMPP, you can download it here:
https://www.apachefriends.org/index.html

4. If you have troubles go here:
http://stackoverflow.com/questions/14073985/xampp-apache-server-is-not-starting-after-skype-installation

5. Start your Server and Database from XAMPP Control panel

6. Go there: http://localhost:8080/phpmyadmin

7. Run the script from Setup.sql

8. Check which port is using your Apache Server, and then
access  http://localhost:****/php_chat , where **** is your port

9. Now you have access to the application.

-------------------------
.zip content
-------------------------

1. folder css: all the css files
2. folder font-awesome: with 4 subfolders (it's a CSS library)
3. folder functions: 
	-addRoom.php
	-chat.php
	-chatRooms.php
	-download.php
	-fileUpload.php
	-insertMsg
	-joinChat.php
	-leaveChat.php
	-login.php
	-logout.php
	-newRoom.php
	-register.php
	-updateChat.php
4. folder images: there are the background image and the logo
5. folder includes:
	-subfolder database: file connect.db.php
	-core.php
	-footer.php
	-header.php
6. folder js:
	-chat.js
	-index.js
7. file index.php
8. file Setup.sql