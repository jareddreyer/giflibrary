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
					$('.order').html('<li> You did not enter a URL, nothing was saved. </li>')
					return false
				}

				// UPDATE
				var result = JSON.parse(localStorage.getItem("urls"));

				if (result == null) result = [];
				
                    var alreadyExists = result.filter(function(item){
                        return id === item.url
                    }).length;
                    
                    if (alreadyExists > 0) {
                        $(".order").append("<li>" + id + " ... already exists in your list.</li>");
                      return false;
                    } else {
                        // APPEND
                        $('.order').append('<li>' + $(url).val() + '... has been added.<button id="' + id + '" name="remove" class="delete" >Delete</button></li>');

                        result.push({
                            url : id
                        });
                    }

				// SAVE
				localStorage.setItem("urls", JSON.stringify(result));
			});
            
            var urls = JSON.parse(localStorage.getItem("urls"));
            if (urls != null)
            {
                for (var i = 0; i < urls.length; i++)
                {
                    var item = urls[i];
                    $('.order').append('<li>' + item.url + '... has been added.<button id="' + item.url + '" name="remove" class="delete" >Delete</button></li>');
                }
                
                
                
                
                var data = localStorage.getItem('urls');
                
                $.post('localstorage.php', {data} );
                
            }

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
				$(e.target).parent().html('<li>...item has been deleted</li>');

			});

		});
        </script>
    </head>

    <body>
        <?php 
        $json = json_decode($_SESSION['data'], true);
        $array = array_column($json, 'url');
        
        print_r($array);
        //var_dump($_SESSION['data']);
        //
        //echo $array[0]['url'];
        //print_r($array);
        foreach ($array as $key => $jsons)
        { // This will search in the 2 jsons
        
            foreach($jsons as $key => $value) 
            {
                //echo "$key => $value";
                 //echo $value . "<br>"; // This will show jsut the value f each key like "var1" will print 9
                 //$newArray = array($value);
                 
                 
            }
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

        <div>
            <ul class="order">

            </ul>
        </div>
    </body>

</html>
