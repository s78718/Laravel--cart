![image](https://github.com/s78718/Laravel--cart/blob/master/public/png/cart.png)  

已完成:   
購物車    
登入    
ecpay金流(需修改回調網址 env )(可以使用ngrok)    
      

未完成:   
會員資料修改     
訂單資料    
第三方登入    
       
執行:  
1.修改.env資料(env.example)  
2.創建mik資料庫  
3.執行php artisan migrate  
4.執行php artisan db:seed --class=ProductSeeder  
5.執行php artisan db:seed --class=PriceSeeder  
6.執行composer install  
7.執行php artisan serve    
8.需寄信可以到env設定寄信帳密(gmail需到官方網站設定為低安全性)(信內容請至views->mail裡修改)   
9.使用綠界請務必避開csrf回調網址,會回報419錯誤 (middleware->verifycsrftoken->except加入避開路徑 /Callback & /)
