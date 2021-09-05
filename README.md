# Subscription System
 Subscription platform(with RESTful APIs and MySQL) in which users can subscribe to a website and there are multiple websites in the system that can be created dynamically. Whenever a new post is published on a particular website, all it's subscribers receive an email with the post title and description in it. The emails run in the background through queue jobs. 

###### Included information:-
- Migrations for the all tables are added in the system.
- You can create a "post" for a "particular website".
- User can subscribe to a "particular website" with all validations through the help of models relationships.
- Emails would be sent after every new post to the particular website subscribers and will  inform them with the title and description of the post that is done on a particular website.
- Queues are used to schedule sending emails in the background.
- No duplication occurs while sending notifications to the subscribe users.

---
## How to install Subscription System

1. First clone the project from github and add it to your server (local/remote)
2. Make a database by the name  ```subscription_system ``` in MYSQL database

For your gmail configuration go to this link:  https://myaccount.google.com/security#connectedapps
and turn on the less secure apps in your gmail.


#### Step 1 : Set up your .env file


  ```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your mail
MAIL_PASSWORD=your password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=email from whom you want to send email
MAIL_FROM_NAME="${APP_NAME}"
  ```
 


   
then run the following command

   ``` php artisan config:cache ```  for removing the cache
   

  
#### Step 2 : Run all Migrations

   ``` php artisan migrate ``` 


Note: if you want to listen to the queues you can use the below command:
   ``` php artisan queue:listen ```  

#### Step 2 : Run the system

   ``` php artisan serve ```  
   
   Main Page
   <img width="1431" alt="Screenshot 2021-09-05 at 3 09 18 AM" src="https://user-images.githubusercontent.com/65660680/132116178-57ff5dae-140f-45d7-9bbc-4a66fd189b53.png">


