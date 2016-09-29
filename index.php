<?php

session_start();

if(!isset($_SESSION['data'])) header("Location: localstorage.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Thumbnail Gallery</title>

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
    
    <script>
            $(function() {
                $(".container").on('click', '.pagination li a', function() { 

                var page_id = $(this).data('id');
                $.ajax
                ({ 
                    url: 'ajax.php',
                    data: {"showpage": page_id},
                    type: 'get',
                     async:false,
                        success: function(result)
                        {
                            
                            $('#results').html(result).fadeIn(700, function() 
                            {
                            });
                            freezeframe.run();
                            copyBtn();
                            
                        }
                    });
                });
            });  
             
                  
                  $(document).ready(function()
                  {
                    copyBtn();
                  }); //end document ready
                  
                  function copyBtn()
                  {
                   
                   $('span.url').each(function(e){
                      $(this).addClass('Select C'+e);
                      $(this).after( ' <span class="input-group-button"><button data-toggle="tooltip" data-placement="left" title="copy to clipboard" class="btn btn-sm SelectBtn C'+e+'"><span class="octicon octicon-clippy"></span></button></span>');
                     });
                     
                      $('button').each(function(e)
                      {
                          $('[data-toggle="tooltip"]').tooltip();                          
                          var copyEmailBtn = $('.SelectBtn.C'+e);
                          
                          copyEmailBtn.on('click', function(event)
                          {  
                              $(this).attr('data-original-title', "Copied!").tooltip('show');
                              // Select the email link anchor text  
                              var emailLink = document.querySelector('.Select.C'+e);
                              var range = document.createRange();
                              range.selectNode(emailLink);  
                              window.getSelection().addRange(range);
                            
                              try {  
                                // Now that we've selected the anchor text, execute the copy command  
                                var successful = document.execCommand('copy');
                                var msg = successful ? '...copied ' : '...unsuccessful';
                                msg2 = emailLink.innerHTML;
                                //console.log(msg2);
                                //alert(msg+msg2);
                                //console.log(emailLink.innerHTML);
                                //console.log(window.clipboardData.getData('Text'));
                                //$('Select C'+e).after(msg).fadeOut('slow');
                              } catch(err) { 
                                 $(this).prev('code').css('background','#ff5555');
                              }
                            
                            window.getSelection().removeAllRanges();  
                           }); 
                       });   
                  }
                  
    </script>
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
          <a class="navbar-brand" href="#">Gif Library</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="localstorage.php">Setup Localstorage</a></li>
            <li><a href="?download=1">Download Localstorage</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Page Content -->
    <div id="results" class="container text-center">
         <?php 
                include "gifs.class.php";
                include_once "gifs-config.php";
                
                $gifs = new imagePaginator($directory);
                //echo $gifs->saveImages();
                 echo $gifs->buildPagination();
//                 
                 echo $gifs->buildResult();
//         
                 echo $gifs->buildPagination();
                 echo $gifs->currentPage;
        
        ?>
    </div>
    <div class="container text-center">
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

</body>

</html>
