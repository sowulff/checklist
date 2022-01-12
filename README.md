INSERT MANDATORY GIF

# todo

This is an individual school assignment focusing on php-programming. i've created a To-Do application with following features:

-   As a user I should be able to create an account.
-   As a user I should be able to login.
-   As a user I should be able to logout.
-   As a user I should be able to edit my account email and password.
-   As a user I should be able to upload a profile avatar image.
-   As a user I should be able to create new tasks with title, description and deadline date.
-   As a user I should be able to edit my tasks.
-   As a user I should be able to delete my tasks.
-   As a user I should be able to mark tasks as completed.
-   As a user I should be able to mark tasks as uncompleted.
-   As a user I'm able to create new task lists with title.
-   As a user I'm able to edit my task lists.
-   As a user I'm able to delete my task lists along with all tasks.
-   As a user I'm able to add a task to a list.
-   As a user I'm able to view all tasks.
-   As a user I'm able to view all tasks within a list.
-   As a user I'm able to view all tasks which should be completed today.

**Extra:**

-   As a user I'm able to remove a task from a list.

</details>

# Installation

To install this project follow the steps below:

-   Clone the project -> `https://github.com/sowulff/checklist`

-   Start php server -> `php -S localhost:8000`

-   Open your browser and paste this link -> `http://localhost:8000/`

# Code Review

Code review written by [Nema Vinkeloe Uuskyla](https://github.com/patrosk).

1. `loggedin.ph:89-165` - Once you submit your email and password, there is no message or indication that you are logged in. When logged in, the register and login forms are still displayed on the home page. This could be a bit confusing for the user.
2. `loggedin.php:96` - For some reason, the if statement didn't work, with the consequence that no tasks are shown (the function get_tasks() works and it is possible to access the user's tasks). After some debugging, it finally worked when instead of ===, the if statement uses == between the task list_id and GET. This is an easy fix!
3. `footer.php` - You have not required the footer in all your pages in the root of the directory. This means that the js file is not included on all of your pages, which might cause problems if you should continue working on this project and want to add more javascript.
4. `loggedin.php:71` - The list title changes when I check and uncheck the tasks, but it does not correspond to the list in which I am editing the tasks. I couldn't find the reason for this, but I'm guessing it is something in the checkbox (at line 143) which causes this...?
5. `loggedin.php:142` - I could not edit my task, since the tasks/update.php uses the key word 'description' instead of 'content' (the column is called 'content' in the tasks table). The same issue arose with 'completed_by' - this column is called 'deadline_at' in your database. If you change these two the logic works. This is an easy fix!
6. `create.php:13` - You mix naming conventions a bit in your php code - if you stick to one, it improves the readability of your code.
7. `profile.php:10` - I could change my email address but it did not show on the profile page. It did work however - once I logged out and tried to log in again, the old email no longer worked but the new one did. Upon logging in again, the profile picture wasn't displayed. I saw that the variable $userImage doesn't contain the user id which is needed to access the image in the uploads folder. (My image was called ‘leia.jpeg’ which is what was found in the variable, but in the uploads folder it's name was ’23leia.jpeg’). An easy fix is to include the user id in your echo on line 10.
8. `login.php` - It seems like the file login.php isn't in use (the login logic is on the index page) so it could be removed from the directory to avoid confusion.
9. `profile.php:14` - The placeholder image is not always displayed on the profile page (sometimes it worked, other times not - strange!).
10. `loggedin.php:11` - If you register as a new user, remain logged in and create lists, the user_id is set to null in the database. This could be fixed if you add the user to the session in your register.php file!
11. Overall: the page looks great and the simplistic style makes it clear and easy to follow! I did not notice any errors in the inspector and most of the issues above are due to typos which are easily fixed. When changed, the site works smoothly. Great work! :)

# Testers

Tested by the following people:

1. Amanda Karlsson
2. Nelly Svarvare Petrén
