<?php
class imagePaginator {

    public $sourceXML, $directory, $linkLimit, $currentPage;
    private $images, $pages, $count, $pgkey, $private, $jsonArray;
    
    public function __construct($directory, $limit = 12, $linkLimit = 10)
    {
        //set the json
        $this->json = json_decode($_SESSION['data'], true);
        $this->jsonArray = array_column( $this->json, 'url');
        
        $this->directory = $directory; //set directory for reading and saving all images
        $this->limit = $limit; //set limit of how many images to paginate
        $this->linkLimit = $linkLimit; // set limit of how many links per pagination
        $this->currentPage = 1;
        
        //get current images from dir
        $this->images = array_slice(scandir($this->directory), 2);  // remove . and .. from array
        $arrayOfImages = array_chunk($this->images, $limit); // break the array into 12 images per page 
        $this->count = ceil(count($this->images) / $limit); // count amount of pages
        $this->pages = array_filter(array_merge(array(0), $arrayOfImages)); // push array +1 so pagination navigation matches correctly from 1
        
        //clean and check $showpage is set correctly and not malicious
        if(isset($_GET['showpage']) && is_numeric($_GET['showpage']) && !empty($_GET['showpage']))
        {
            $this->pgkey = (int) $_GET['showpage']; // get variable from url or set to page 1
        } else {
            $this->pgkey = 1;
        }
        
        //check if download
        if(isset($_GET['download']) && is_numeric($_GET['download']) && !empty($_GET['download']))
        {
            $this->saveImages();
            exit;
        }
        
    }

    /*
     * save images
     * 
     * 
     */
    public function saveImages ()
    {
        foreach ($this->jsonArray as $item) 
        {
            $name = basename($item);

            //first check file exists
            if (file_exists($this->directory ."\\". $name))
            {
                $stat = filemtime($this->directory ."\\". $name); //get modified date  
                $this->sourceXML = $this->curlRequest($item, $connectionType = 'check');
                //then check its modified date is > or = to current file
                
                if ($this->sourceXML['header']['filetime'] <= $stat)
                {
                    echo "<p>File: $item is up to date, no saving was done...</p>";
                    
                } else {
                    
                    //file has been updated, better redownload it!
                    $this->sourceXML = $this->curlRequest($item, $connectionType = 'download');
                    file_put_contents($this->directory ."\\" . $name, file_get_contents($item));
                    echo "<p>$item has been saved...</p>";
                }
                
            } else {
                //we don't have that image, so lets download it!
                $this->sourceXML = $this->curlRequest($item, $connectionType = 'download');
                
                file_put_contents($this->directory ."\\" . $name, file_get_contents($item));
                echo "<p>$item has been saved...</p>";
                
                //return $this->sourceXML;
            }
        }
        
        return;
    }
    
    
    /**
     *  buildResult - builds html of all images
     * 
     *  @return array
     */
    public function buildResult()
    {
        $results = '<div id="content" class="row text-center">';
        
        foreach($this->pages[$this->pgkey] as $key => $file)
        {
            
            $basename = pathinfo($file, PATHINFO_FILENAME); //remove file type from file name
            $item =  array_search($basename, array_map('basename', $this->jsonArray)); //search jsonArray array via local filename and return key index
            
            $results .= '<div class="col-lg-3 col-md-2 col-sm-3 col-xs-4 thumb"> <a class="thumbnail">'."\n\r";  
            $results .= '<img class="freezeframe img-responsive" src="../gifs/images/'. $file . '" alt="">'."\n\r";
            $results .= '<div class="input-group js-zeroclipboard-container">
                            <h3>URL:</h3>
                            <input type="text" class="input-mini input-monospace js-copytextarea" value="'. $this->jsonArray[$item] .'" readonly="readonly">
                            <span class="url">'.$this->jsonArray[$item] .'</span>
                         </div>';
            $results .= '</a></div>'."\n\r";
        }
        
        $results .= '</div>'."\n\r";
        
        return $results;
    }

    /**
     *  pagination
     * 
     * 
     */
    public function buildPagination()
    {
        //*todo fix variables for over-use
        $prev = max(1, $this->pgkey - 1);
        $next = min($this->count , $this->pgkey + 1); 
        $last       =  $this->count;
        $is_first = $this->pgkey == 1;
        $is_last  = $this->pgkey == $this->count;
        
        $start      = ( ( $this->pgkey - $this->linkLimit ) > 0 ) ? $this->pgkey - $this->linkLimit : 1;
        $end        = ( ( $this->pgkey + $this->linkLimit ) < $last ) ? $this->pgkey + $this->linkLimit : $last;
 
        $pagination = '<nav><ul class="pagination pagination-sm">'."\n\r"; //open ul
        
        $pagination .= !$is_first ? '<li><a data-id="'. $prev .'"  href="#">Previous</a></li>'."\n\r" : '';
        
        if ( $start > 1 )
        {
            $pagination   .= '<li><a href="#" data-id="1">1</a></li>';
            $pagination   .= '<li class="disabled"><span>...</span></li>';
        }
        
        $class = ( $this->pgkey == 1 ) ? ' class="disabled"' : "";
            
        for($i=$start; $i <= $end; $i++)
        {
            $pagination  .= ( $this->pgkey == $i ) ? '<li class="active"><span>'. $i .'<span class="sr-only">(current)</span></span></li>'."\n\r" : '<li><a data-id="'. $i .'" href="#">'. $i .'</a></li>'."\n\r"; 
        }

        if ( $end < $last )
        {
            $pagination   .= '<li class="disabled"><span>...</span></li>';
            $pagination   .= '<li><a href="#" data-id="' . $last . '">' . $last . '</a></li>';
        }
        
        $pagination .=  !$is_last ? '<li><a data-id="'. $next .'" href="#">Next</a></li>'."\n\r" : '';
        $pagination .=  "</ul>\n\r</nav>"; //end ul
        
        $this->currentPage = '<p>Page ' . $this->pgkey . ' of ' . $this->count . '</p>';
        
        return $pagination;
    }


    /**
     *  getReuqest - curl request function
     * 
     * @param
     * @param
     * 
     */
    public function curlRequest($url, $connectionType='')
    {
        
        ($connectionType == 'check') ? $options = array(   
                            CURLOPT_RETURNTRANSFER => 1, // return web page
                            CURLOPT_HEADER => TRUE, // don't return headers
                            CURLOPT_FILETIME => TRUE, // don't return headers
                            CURLOPT_NOBODY => TRUE, //doing a quick check so don't need full download
                            CURLOPT_FOLLOWLOCATION => TRUE, // follow redirects
                            CURLOPT_ENCODING => "", // handle all encodings
                            CURLOPT_USERAGENT => "gif_checker", // who am i
                            CURLOPT_AUTOREFERER => TRUE, // set referer on redirect
                            CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                            CURLOPT_TIMEOUT => 120, // timeout on response
                            CURLOPT_MAXREDIRS => 10, // stop after 10 redirects                            
                        ) : 
                        
                        $options = array(   
                            CURLOPT_RETURNTRANSFER => 1, // return web page
                            CURLOPT_HEADER => 0, // don't return headers
                            CURLOPT_FILETIME => 0, // don't return headers
                            CURLOPT_FOLLOWLOCATION => TRUE, // follow redirects
                            CURLOPT_ENCODING => "", // handle all encodings
                            CURLOPT_USERAGENT => "gif_downloader", // who am i
                            CURLOPT_AUTOREFERER => TRUE, // set referer on redirect
                            CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                            CURLOPT_TIMEOUT => 120, // timeout on response
                            CURLOPT_MAXREDIRS => 10, // stop after 10 redirects                            
                        );
        $ch = curl_init($url);
        curl_setopt_array($ch, $options);
        
        $headers['errno']   = curl_errno($ch);
        $headers['errmsg']  = curl_error($ch);
        $headers['content'] = curl_exec($ch);
        $headers['header']  = curl_getinfo($ch);
        
        curl_close($ch);
        
        return $headers;
    
    }

}
