# Article Website Application Usage Documentation

# Viewing Articles
Users who have not logged in can easily browse articles and view article details. Please visit the homepage to view the list of articles, and click *Read More* to read the content. In addition, the *About Me* page is also available for viewing.

# About Me Page
The *About Me* page provides information about the account owner and contributors on this website. Users who have not logged in can access this page to find out more.

# Login
To access the full features, you need to login. Use the login form on the main page and enter your account credentials.
Email : admin@gmail.com
Password : 12345

# Adding Category
After login, you can add a new category. Follow these steps:
1. Press the "Create" button in the category list.
2. Fill in the form with the category name.
3. Click "Submit" to save your new article.

# Editing and Deleting Category
If you want to update an existing category, the following steps can be followed:
1. Go to the category list page.
2. Select the "Edit" option to edit its category.
3. To delete an category, select the "Delete" option.

# Adding Articles
After login, you can add a new article. Follow these steps:
1. Press the "Create" button in the article list.
2. Fill in the form with the title, image, content, and select the appropriate category and tags.
3. Click "Submit" to save your new article.

# Editing and Deleting Articles
If you want to update an existing article, the following steps can be followed:
1. Go to the article list page.
2. Select the "Edit" option to edit its content.
3. To delete an article, select the "Delete" option.

# Tag Management
After login, you can manage tags. Here are the instructions:
1. Select the "Categories" or "Tags" option in the main menu.
2. Create, edit, or delete categories and tags as needed.

---

# How To Use
1. clone this repo
2. Copy .env.example file to .env and edit database
3. Run composer install / composer update
4. Run php artisan key:generate
5. Run php artisan migrate --seed
6. Run npm install
7. Run npm run dev
8. Run php artisan serve
9. php artisan storage:link (This command is written after adding an image in the article to create a storage folder in the public folder)
