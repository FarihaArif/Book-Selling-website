# Book-Selling-website
A market place where you can preview books, search books by their names or by author names, check reviews for each book, allowing you to make informed decisions about the titles you want to read, and purchase books at Cash on delivery.
# Steps for executing website:
1. Download final1 folder from github.
2. To execute this, make sure that you should have XAMPP server installed at your device.
3. Open the XAMPP server.
4. Start the Apache and MySQL services by clicking on the 'start' buttons next to them.
5. Then open xampp folder, then open htdocs folder placed inside this xampp folder.
6. Place the installed bookverse folder into the htdocs folder.
7. After placing, open web browser and visit http://localhost/phpmyadmin/
8. Click on new button, and create a new database named with shop_db.
9. After then, import .sql file from bookverse folder.
10. Access the PHP files by opening the web browser and visit http://localhost/final1/login.php or http://localhost/final1/home.php.
# User Manual
## ADMIN VIEW 

Admin needs to login in order to operate the website.
He/she can login by enter his/her credentials in the form.
After entering credentials click login.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/e389b330-e752-4833-9126-60985a6c6932)

The homepage or the dashboard is too monitor the entities of the website.
The admin can detail such as Payments due, Payments completed, Order Places, Number of Products, Number of Users, No of Admins, and Numbers of messages received. The admin cannot change anything on the dashboard and will have to go to other pages.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/6fe72e53-1e3c-468d-a04b-661f11250ca2)

In order for admin to add a product he/she has to fill the form.
The add form consists of Name of Book, Name of Author, Price of Book, Number of Copies available, Genre, Description and a Photo of its cover.
The cover photo can be selected from the photos save in the system.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/25543f3f-b698-4d79-9137-15e61e81524e)

Once the Book is added its detail will appear below.
The details of the book can be update by clicking update button.
A form box will appear, where admin can what he/she wants to change.
All the changes can be implemented by clicking the delete button.
The delete button is remove the book from products.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/141537ce-b481-4598-b51f-276bfc160403)

Orders page is to view all the orders.
Admin can update the payment status to complete or pending by changing it from top down menu.
After selecting status click Update Button
The details such as user name, address and total price appears in one order box.
Admin can also delete an order completely by clicking on the delete button.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/5e7822ff-9fef-4715-9292-4c20f5bff346)

Users page display’s all the registered users and admin.
Admin can delete a user by clicking on the delete button.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/0448224d-d44e-40ad-92c9-42a76c300bf2)

The Messages page is to see all the questions and comments by the users.
Admin can delete message by clicking delete button.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/9e27ddfc-2eee-46fa-86f6-82fc378e1578)
