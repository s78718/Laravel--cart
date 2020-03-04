![image](https://github.com/s78718/Laravel--cart/blob/master/public/png/cart.png)  

整個專案是我自己一步一步完成(前後端)  
以下為記錄遇到的問題點  
目前有在找網頁後端開發工程師缺(高雄) php   
如果有缺人的公司可以聯絡我  
我有在aws放上我個人履歷  
ec2-18-180-25-206.ap-northeast-1.compute.amazonaws.com (18.180.25.206)  

不會動到部分:  
產品圖片目前為隨機產生,正式環境應該到資料庫寫入位置並帶入讀取資料庫後帶入src  


已完成:   
購物車    
登入    
ecpay金流(需修改回調網址 env )(可以使用ngrok)    
      

未完成:   
會員資料修改     
會員訂單查詢 會員資料修改 忘記密碼   
第三方登入移植(fb line google)  
完成後續head區另外寫個檔案include  


       
執行:  
1.修改.env資料(env.example)  回調網址可以用aws或是ngrok  
2.創建mik資料庫  
3.執行php artisan migrate  
4.執行php artisan db:seed --class=ProductSeeder  
5.執行php artisan db:seed --class=PriceSeeder  
6.執行composer install  
7.執行php artisan serve    
8.需寄信可以到env設定寄信帳密(gmail需到官方網站設定為低安全性)(信內容請至views->mail裡修改)   
9.使用綠界請務必避開csrf回調網址,會回報419錯誤 (middleware->verifycsrftoken->except加入避開路徑 /Callback & /)
