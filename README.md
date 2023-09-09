# Book-Selling-website
A market place where you can preview books, search books by their names or by author names, check reviews for each book, allowing you to make informed decisions about the titles you want to read, and purchase books either at Cash on delivery or by Credit/Debit Cards.

## Project Overview
BookVerse is a dynamic and user-friendly platform designed to revolutionize the way books are bought and sold online. This comprehensive system combines cutting-edge technology (PHP, HTML and CSS) with a seamless user experience, empowering both book enthusiasts and sellers to connect, discover, and acquire their favorite reads.
#### Key Features includes:
1. User Authentication
2. User Authorization
3. Administration
4. User Reviews
5. Search Filters
6. Book Categories
7. Cart management
8. Checkout
9. Payment gateway through Stripe (test mode)
10. Transaction History

## Steps for executing website:
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

## User Manual
### ADMIN VIEW 

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

### USER VIEW 

From User perspective, there is a home page which is just used to display some featured products. Through home page user can go to shop page, contact us, and about us.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/78dd4d9b-bfc0-4cbd-85d2-f44d55234fbe)
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/22f613be-2421-4759-a759-cd51082068f8)
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/0a178bcd-d22f-418b-bc07-f6bf39ae8933)

There is a shop page used to display all the books available. The page is categorized according to genres. It also displays the featured books.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/11bba709-4105-4301-b456-a0b680a8e6e9)
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/c3ac9dc4-8bbc-455d-ae1e-a04b0da85a46)
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/243638a5-1c96-4665-abe0-ac1ec2ffe917)

The About us page displays what is website for. It also displays testimonials of users.

![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/280a5b3a-1494-42f5-95db-b130eb4182a0)

### HOW DO A USER CAN INTERACT WITH THE WEBSITE?

In order to interact with the website user has to register himself.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/14bd3d6c-947b-4fca-abcc-f60f1f738cca)

Once the user has registered himself, he will be redirected to login page. After login, he will be directed to the Home page where he/she can choose a book or can reach the shop page to buy a book. 
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/f482dc96-8ca2-44d2-bff1-39ad05c78b08)

The product will be added to the cart from where he she selects one of the payment process.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/3461ea75-a220-4ac3-bca1-5f1d2f40f957)

After selecting the payment method, he will be redirected to checkout form.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/90afb788-66ab-49fa-b9c0-6fe3ed41c6fe)

If user has selected Cash On Delivery, his order will be confirmed but if he/she has selected payment gateway then a form open to enter his credit/debit card information.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/cb5186a2-a8f7-424e-a8de-1cc2806b2afd)

Once the user, has confirmed a purchase, his order will appear on the orders page. This page displays information such as name, order, address and payment status etc.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/93832e50-3793-4997-9764-466f2797f071)

The user can also visit transaction page which is used to display all online payment done by the user. This does not display order of cash on delivery.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/3058f628-78c3-43e4-a492-4cd95a200e04)

Not only that, there is also a Contact us page which is like a help desk for user. User can inquire anything about the website, order or product. In order to contact, user have to be registered first.
![image](https://github.com/FarihaArif/Book-Selling-website/assets/114657374/7ba43e90-f62f-4ffe-ac9b-f212dc2f2b45)
















