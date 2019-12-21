<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
       
<style>
 
 *, *:before, *:after {
   box-sizing: border-box;
 }
 html {
     height: 100%;
 }
 body {
     background: url(https://media.giphy.com/media/SwJ6ZXZlVLlwqAukRk/source.gif) no-repeat center center fixed; 
     background-size: cover;
     font-family: 'Raleway', sans-serif;
     background-color: #342643; 
     height: 100%;
     overflow:hidden
 }
 
 .text-wrapper {
     height: 100vh;
    width:100vw;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-shadow: 1px 1px #000;
 }
 
 .title {
     font-size: 6em;
     font-weight: 700;
     color: #FFF;
 }
 
 .subtitle {
     font-size: 40px;
     font-weight: 700;
     color: #fff;
 }
 
 .buttons {
 margin: 30px;
 }
 
 
 .buttons a.button {
    font-weight: 700;
    border: 2px solid #FFF;
    text-decoration: none;
    padding: 15px;
    text-transform: uppercase;
    color: #FFF;
    border-radius: 26px;
    transition: all 0.2s ease-in-out;
 
 }
 .buttons a.button:hover {
 background-color: #FFF;
 color: black;
 transition: all 0.2s ease-in-out;
 }
 </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                @yield('code')
            </div>

            <div class="message" style="padding: 10px;">
                @yield('message')
            </div>
        </div>
    </body>
</html>
