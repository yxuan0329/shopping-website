# Little Things: Online Clothing Shopping Website Project
This repository is a final project of **Database Programming, 2019 Spring** in NCUE CSIE

## Author

| GitHub Account | Class | Student ID | Name |
| -------------- | ------|------------| ---- |
| yxuan0329      | 資管二| S0661124   | 梁芸瑄|

<br>
## How To Use?
- Clone this repository or download as a zip file
- Incase you downloaded as a zip, unzip it
- [Download XAMPP](https://www.apachefriends.org/download.html) and install it. 
- After installation, start the XAMPP control panel and **start Apache and MySQL**.
- Go to [phpmyadmin](http://localhost/myphpadmin) and import the database(localhost.sql) in our repository.
- Done! Now you can surf the clothing website by entering http://localhost/index.php .

##  Introduction
本網站主要販售女性服裝為主，使用者可以在本站瀏覽商品並放入購物車，註冊會員並登入成功之後便可將購物車內商品結帳，再輸入收件人資訊後即可完成商品訂單。

輸入表單及個人資料時均會透過jQuery表單驗證，驗證成功後才可送出資料，並儲存至資料庫中。此外，網站以簡約的淺色設計及排版，讓使用者瀏覽時更加舒適易讀且更加符合使用者體驗。
  
## System Design

2.1.1 使用者分級
網頁使用者共分三個等級：訪客、會員、管理者。
三者均可以自由瀏覽網頁，會員與管理者可以結帳產生購物訂單，唯有管理者可以管理會員、商品、留言、訂單資訊。

2.1.2 商品管理
商品置於資料表product中，內容包含商品的文字、數據、圖片資訊。可以在網頁查看商品尺寸資訊、模特兒穿搭照片、會員即時評價等。

2.1.3 購物車與訂單
將商品放入購物車之後，可以結帳並產生訂單。於網路結帳享有好禮三選一之服務，單筆未滿500元須自付運費60元，滿1500元送限量文青帆布袋。訂單成立後會清空購物車，再導引使用者至首頁。

2.1.4 留言板
會員可以留言，及時反映消費疑問。
若想針對商品給予評價，亦可透過商品網頁下方的連結給予即時回饋。
