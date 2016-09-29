<?php
// 
//  localstorage.php
//  wwwroot
//  
//  Created by jareddr on 2015-10-23.
//  Copyright 2015 jareddr. All rights reserved.
// >
session_start();

///echo $_POST['data'];
// fill $_SESSION['ids'] only with new $_POST['session'] posted
if ( isset($_POST['data']))
{
    $_SESSION['data'] = $_POST['data'];
}

// prepare $_SESSION['ids']


?>
<!DOCTYPE HTML> 

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
		$(function() {
		    var url = $('#url');
		    
			$('.add').click(function()
			{

				var id = $(url).val();
				
				if (id == "") {
					$('.order').html('<li><div class="alert alert-warning" role="alert">You did not enter a URL, nothing was saved. </div></li>')
					return false
				}

				// UPDATE
				var result = JSON.parse(localStorage.getItem("urls"));

				if (result == null) result = [];
				
                    var alreadyExists = result.filter(function(item){
                        return id === item.url
                    }).length;
                    
                    if (alreadyExists > 0) {
                        $(".order").append('<li><div class="alert alert-warning" role="alert">' + id + ' already exists in your list.</div></li>');
                      return false;
                    } else {
                        // APPEND
                        $('.order').append('<li><div class="alert alert-success" role="alert">' + $(url).val() + ' has been added.<button id="' + id + '" name="remove" class="delete" >Delete</button></div></li>');

                        result.push({
                            url : id
                        });
                    }
                // Clear text box
                $(url).val('');
                
				// SAVE
				localStorage.setItem("urls", JSON.stringify(result));
				 $.post('localstorage.php', {data} );
			});
            
            var urls = JSON.parse(localStorage.getItem("urls"));
            if (urls != null)
            {
                for (var i = 0; i < urls.length; i++)
                {
                    var item = urls[i];
                    $('.order').append('<li>' + item.url + '&nbsp; <button id="' + item.url + '" name="remove" class="delete" >Delete</button></li>');
                }
                
                var data = localStorage.getItem('urls');
                
                $.post('localstorage.php', {data} );
                
            }
            
            $('.save').click(function()
            {
               
            });
            
			//retrieve
			$('.storage').click(function()
			{
				var retrivedValue = localStorage.getItem('urls');
				if (retrivedValue) {
					console.log(retrivedValue);
					$(".order").html("<li>" + retrivedValue + '</li>');
				}
			});

			//clear
			$('.clear').click(function() {
				localStorage.clear();
				$('.order').empty();
			});

			//delete
			$('.order').on('click', 'button.delete', function(e)
			{
				var id = $(e.target).attr('id');

				// UPDATE
				var urls = JSON.parse(localStorage.getItem("urls"));
				var urls = urls.filter(function(item) { return item.url !== id; });

				// SAVE
				localStorage.setItem("urls", JSON.stringify(urls));
				$(e.target).parent().html('<li><div class="alert alert-success" role="alert">Item has now been removed.</div></li>');

			});

		});
        </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery - Start Bootstrap Template</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/thumbnail-gallery.css" rel="stylesheet">
    <link href="css/overrides.css" rel="stylesheet">
    <link rel="stylesheet" href="css/octicons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
    .form-control, input[type="text"], input[type="password"], input[type="email"], input[type="number"], input[type="tel"], input[type="url"], select, textarea {
        background-color: #fff;
        background-repeat: no-repeat;
        background-position: right 8px center;
        border: 1px solid #ccc;
        border-radius: 3px;
        outline: none;
        width: 180px;
        box-shadow: inset 0 1px 2px rgba(0,0,0,0.075);
    }
    .url { height: 1px; width: 1px; font-size: 0.1% }
    .input-group h3
    {
        margin-bottom: 5px;
        font-size: 11px;
        font-weight: normal;
        color: #767676;
        display: inline
    }
    a:hover { text-decoration: none }
    </style>
    <script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/freezeframe.min.js"></script>        
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="#">Gif library</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="localstorage.php">Setup Localstorage</a></li>
            <li><a href="index.php?download=1">Download storage</a></li>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <!-- Page Content -->
    <div class="container text-center">
                <?php 
                    if(!isset($_SESSION['data'])) 
                    {
                        echo "<p>Session is now restored</p>";
                    } else {
                        $json = json_decode($_SESSION['data'], true); 
                        $array = array_column($json, 'url'); 
                    }
                ?>

        <input type="text" name="url" id="url">
        <button class="add">
            Add New Item
        </button>
        <button class="clear">
            Clear storage
        </button>
        <button class="storage">
            Get storage
        </button>
        
        <hr>
        <div class="container text-left">
        <h1>GIFS currently in storage</h1>
        <div>
            <ul class="order">

            </ul>
        </div>
        </div>
        <hr>
        
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Jared Dreyer 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->

</body>

</html>
