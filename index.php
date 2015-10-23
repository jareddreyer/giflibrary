<!DOCTYPE html>
<html lang="en">

<head>

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
        
    <script>
            $("document").ready(function(){
                
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
                            
                            $('.container').html(result).fadeIn(700, function() 
                            {
                            });
                            freezeframe.run();
                            copyBtn();
                        }
                    });
                });
                
             
                  copyBtn();
                  
                  function copyBtn ()
                  {
                    $('span.url').each(function(e){
                      $(this).addClass('Select C'+e);
                      $(this).after( ' <span class="input-group-button"><button class="btn btn-sm SelectBtn C'+e+'"><span class="octicon octicon-clippy"></span></button></span>');
                     });
                     
                      $('button').each(function(e)
                      {
                          var copyEmailBtn = document.querySelector('.SelectBtn.C'+e);  
                          copyEmailBtn.addEventListener('click', function(event)
                          {  
                      
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
                                alert(msg+msg2);
                                //console.log(emailLink.innerHTML);
                                //console.log(window.clipboardData.getData('Text'));
                                //$('Select C'+e).after(msg).fadeOut('slow');
                              } catch(err) { 
                                 $(this).prev('code').css('background','#ff5555');
                              }
                            
                            window.getSelection().removeAllRanges();  
                        }); 
                });
              };    
                  
    }); //end document ready
    </script>
</head>

<body>

    <!-- Page Content -->
    <div class="container text-center">
         <?php 
                include "gifs.class.php";
                include_once "gifs-config.php";
                
                $gifs = new imagePaginator($directory);
                echo $gifs->buildPagination();
                
                echo $gifs->buildResult();
        
                echo $gifs->buildPagination();
                echo $gifs->currentPage;
        
        ?>
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
