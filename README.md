![image](https://github.com/s78718/Laravel--cart/blob/master/public/png/cart.png)  

整個專案是我自己一步一步完成(前後端)  
以下為記錄遇到的問題點  
目前有在找網頁後端開發工程師工作(高雄) php  
補充:整個專案是我自己花3個多月自己學習,9天撰寫,如果有非專業地方,可以告知我,作為我改善部分    

+我有在aws放上我個人履歷  
ec2-18-180-25-206.ap-northeast-1.compute.amazonaws.com (18.180.25.206)  

不會動到部分:  
1.產品圖片目前為隨機產生,正式環境應該到資料庫寫入並帶入img->src  
2.第三方登入只開發到開發者模式,不做申請為正式模式

已完成:   
1.購物車    
2.登入,第三方登入移植(fb line google),忘記密碼,會員訂單查詢,會員資料修改        
3.ecpay金流(需修改回調網址.env)(可以使用ngrok)
    
       
執行(注意點):  
0.請先安裝composer npm xampp ngrok postman   
1.修改.env資料(env.example),回調網址可以用aws或是ngrok,修改後記得重開sever     
2.創建mik資料庫   
3.執行php artisan migrate   
4.執行php artisan db:seed --class=ProductSeeder   
5.執行php artisan db:seed --class=PriceSeeder   
6.執行composer install  
7.執行php artisan serve    
8.需寄信可以到env設定寄信帳密  
(gmail需到官方網站設定為低安全性)  
(信內容請至views->mail裡修改)    
9.使用綠界請務必避開csrf回調網址,會回報419錯誤  
(middleware->verifycsrftoken->except加入避開路徑 /Callback & /)  
10.第三方登入目前只寫到開發者測試,實際上線需要各自去申請,請到各第三方官網開發網站申請帳號並填入相關資訊加上此範例的回調網址    
11.Line socilaite 需要另外下載單獨的provider   
(已安裝)  
12.綠界再次付款會造成重複碼問題  
(在訂單後面補上隨機三碼)    
13.MODEL部分限制白黑名單會造成資料庫寫入異常  


使用技術:  
1.laravel(php)   
2.ajax  
3.css  
4.bootstrap  
5.html  
6.綠界  
7.第三方登入(socialite)  
8.ORM(Eloquent)  
9.git版本管控  


引用:  
https://blog.25sprout.com/%E8%AE%93%E4%BD%A0%E7%9A%84-html-table-responsive-%E5%90%A7-a2d4336a1f60  
解決表格rwd問題  
最後使用div格式  
 
<!--專解決表格問題使用div-->   
  
<style type="text/css">  
    .css-table{  
        display: table;  
        font-size: 15px;  
    }  
    .css-table .thead{  
        display:table-header-group;  
        background-color: #ccc;  
    }  
    .css-table .tbody{  
        display:table-row-group;  
    }  
    .css-table .tr{  
        display:table-row;  
    }  
    .css-table .th, .css-table .td{  
        display:table-cell;  
        border: 1px solid #ccc;  
        width:10em;  
    }  
  
</style>  
