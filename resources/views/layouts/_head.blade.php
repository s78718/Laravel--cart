<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>mik</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--放大鏡-->
    <script type="text/javascript" src="/blowup/blowup.js"></script>
</head>

<!-- Styles -->
  <style>
    @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css");
    *{
        padding: 0;
        margin: 0;
        font-family: 'Noto Sans TC' ;
        list-style:none;
    }
    <!--關閉超連結-->
    a.disabled {
        pointer-events: none;
        background-color: #eee;
        color: white;
    }
    .nav-categroy a{
        text-decoration: none;
        color: #444;
        font-weight: 500;
        font-size: 20px;
        padding: 20px 20px 0 ;
        transition: 0.8s;
        transform: translateY(0px);
    }
    .nav-categroy{
        display:block;
        justify-content:center;
        margin-bottom: 20px;
        padding: 0 80px 0;
    }
    .nav a
    {
        text-decoration: none;
        color: #444;
        font-weight: 300;
        font-size: 15px;
        padding: 20px 20px 0 ;
        transition: 0.3s;
        transform: translateY(0px);
    }
    .nav a:hover,
    .nav-categroy a:hover{
        border-bottom: 1px solid #ddd;
        transform: translateY(-5px);
    }
    .nav-top,
    .nav-categroy{
        display: flex;
        padding:15px 0 15px;
    }
    .nav-search input{
        width:100px;
    }
    .nav-search input,
    .nav-search button{
        border: none;
        background-color: #fff;
        margin:35px 0 0 30px;
        font-size: 15px;
        color:#444;
    }
    .nav-search input:focus,
    .nav-search button:focus{
        outline: none;
    }
    .carousel{
        margin-top:20px;
        margin-bottom:20px;
    }

    #carouselExampleFade{
        padding: 10px;
       border: 5px double #ccc;
    }
    #menu
    {
        line-height: 2em;
    }
    #menu a{
        text-decoration: none;
        color: #444;
        border-bottom: 1px solid #444;
    }

    #menu li{
        transition: 0.6s;
    }

    #menu li:hover{
        transform: scale(1.05);
    }
    .aside{
        font-size: 20px;
    }
    .aside-sub{
        font-size: 15px;
    }
    .aside-sub li::before{
        content: "-";
    }

    #footer
    {
        background-color: #ccc;
        color: #444;
        text-align: center;
        padding: 10px;
        border: 6px double #eee;
    }

    #detail{
        padding: 20px;
    }

    #detail img{
        padding: 15px;
        width:100%;
        hight:100%;
        border: 8px double #ccc;
    }
    #detail-ori-price{
        text-decoration:line-through;
        font-size: 15px;
    }
    #qty{
        margin: 5px;
        width:5em;
        height:2em;
    }
    .add-cart{
        background-color: #ccc;
        margin-left: 50px;
    }
    .color ,.size{
        border-radius: 50%;
        background-color: #ccc;
        width:50px;
        hight:50px;
    }


    .cart{
        border: 5px double #ccc;
        padding: 40px;
        margin-bottom: 10px;
    }
    .clear-cart,.buy{
        background-color: #ccc;
    }
    table {
        margin: auto;
        width: 100% !important;
    }



    #main #main-img img{
        margin-bottom: 50px;
        padding: 10px;
        width: 100%;
        border-top-left-radius: 90%;
        border-top-right-radius: 90%;
        border-bottom-right-radius: 10%;
        border-bottom-left-radius: 10%;
        border: 5px double #ccc;
    }
    #main .card{
        background-color: #fff;
        transition: 0.8s;
        color:#444;
        border: 5px double #ccc;
        height: 100%;

    }
    #main .card:hover{
        transform: scale(1.05);
    }
    #main .card a{
        color: #444;
        text-decoration: none;
    }
    #main .card .ori-price{
        font-size: 12px;
        text-decoration:line-through;
    }
    #main .card .sale-price {
        padding-left: 15px;
    }


    #login-form{
        margin-bottom: 10px;
        padding: 30px;
        border: 8px double #ccc;
    }
    #third-login{
        margin-bottom: 10px;
        padding: 30px;
        border: 8px double #ccc;
    }
    #third-login a{
        text-decoration: none;
        padding-right: 40px;
    }

    #third-login img{

        width:40px;
        height: 40px;
    }
    #login-form button{
        background-color: #ccc;
    }
    #login-form a{
        text-decoration: none;
        color: #444;
        padding-right: 10px;
    }

    .cart ,.buyer{
        border: 5px double #ccc;
        padding: 40px;
        margin-bottom: 10px;
    }
    .clear-cart,.buy{
        background-color: #ccc;
    }
    table {
        margin: auto;
        width: 100% !important;
    }
    #order-cart{
        background-color: #ccc;
    }
    .qa{
        border: 5px double #ccc;
        padding: 40px;
        margin-bottom: 10px;
    }
</style>





