<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" rel="stylesheet">
<title>Authentication</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<style type="text/css">
    /* @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600); */

    /* body{
        margin: 0;
        font-size: .9rem;
        font-weight: 400;
        line-height: 1.6;
        color: #212529;
        text-align: left;
        background-color: #f5f8fa;
    } */
    .navbar-laravel
    {
        box-shadow: 0 2px 4px rgba(0,0,0,.04);
    }
    /* .navbar-brand , .nav-link, .my-form, .login-form
    {
        font-family: Raleway, sans-serif;
    } */
    .my-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
    .my-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
    .login-form
    {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }
    .login-form .row
    {
        margin-left: 0;
        margin-right: 0;
    }
    img{
        width: 100%;
    }
    .card-deck {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin-bottom: 20px;
      }

    .card {
      width: calc(33.33% - 20px);
      margin-bottom: 20px;
      background-color: #fff;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      position: relative;
    }

    
    @media (max-width: 768px) {
      .card {
        width: calc(50% - 15px);
      }
    }

    @media (max-width: 576px) {
      .card {
        width: 100%;
      }
    }
</style>