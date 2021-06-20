# mx-bet
a project for php classes - bookmacher site (modeled on the LV BET site)

## 🎈 Requirements

#### 🌐 Hosting
- [x] remote available - DEPLOYMENT ON HEROKU

#### 💼 Accounts
- [x] create an account
  - [x] checking if login and email are UNIQUE
  - [x] add record to database
- [x] sign in
  - [x] check if login exists
  - [x] check if password exists
  - [x] add record to database


#### 🙋‍♂️ User after signing in
- [x] betting
  - [x] validation if user clicked at least 1 bet
  - [x] validation if user added a stake
    - [x] not empty
    - [x] greater than 0
  - [x] creating a bet
    - [x] check if user has enough balance
    - [x] user_balance = old_balance - stake
    - [x] adding users_choices to database
  - [x] betting results
    - [x] coupon win validation
      - [x] check from db if coupon won
        - [x] check if every bet on coupon won
    - [x] show users bet results (win/lose)
  - [x] show potential win from each coupon
    - [x] more bets on 1 coupon -> more money if won
- [x] adding balance to account
  - [x] amount validation (>0)
  - [x] query
- [x] show details of user's coupons 


#### 👮‍♂️ Admin after signing in
- [x] add balance to any user
- [x] create a bet_entity
  - [x] create bet options
  - [x] create odds for bets
- [x] add results of a bet
- [x] add new category
- [x] add new region
- [x] add new event
- [x] see statistics

#### Admin panel overview     
![ezgif com-gif-maker](https://user-images.githubusercontent.com/76202102/122688666-ed2d8500-d21d-11eb-9429-83e2d5aa2eed.gif)



#### 📝 Newsletter ONLY ON LOCALHOST
- [x] after creating a coupon send details to user via email
  ![email 4](https://user-images.githubusercontent.com/76202102/122684699-3de5b380-d207-11eb-9d22-57076ec9ea7a.PNG)
- [x] after adding a result send result details to users with such bet
  ![email 1](https://user-images.githubusercontent.com/76202102/122684659-f3643700-d206-11eb-960d-800addcdcd04.PNG) 
- [x] send info if coupon won or lost ?
  -  Coupon lost:
     ![email 3](https://user-images.githubusercontent.com/76202102/122684697-3c1bf000-d207-11eb-9e3e-1792adbf2b40.PNG)
  - Coupon won:
    ![email 2](https://user-images.githubusercontent.com/76202102/122684671-0bd45180-d207-11eb-9b3b-91677566d10f.PNG)
- [x] send info about user's balance (above)

#### Screenshot from my inbox
![email](https://user-images.githubusercontent.com/76202102/122684637-ce6fc400-d206-11eb-9eff-6edf24ab57f2.PNG)






#### ✨ Additional functionalities
- [x] user can filter available events from database
- [x] validation if user is logged in on site
- [x] responsive design?
- [x] multibet - the more bets on one coupon the highest potential prize
- [x] account details on user's page
- [x] coupons details on user's page
- [x] user's stats - coupons won, all coupons, etc.
- [x] showing sponsored events on user's main page

## 📚 Database
##### On localhost I've used xampp with phpmyadmin and apache
- ##### Server type: MariaDB
- ##### Language: mysql
- ##### PHP version: 8.0.6
#### 📖 Database Schema
![image](https://user-images.githubusercontent.com/76202102/122311270-185c5f80-cf12-11eb-9d1c-6136b16dd19f.png)
