

<!DOCTYPE html>
<html>
    <head>
        <script language="javascript" type="text/javascript">
            
        function searchKeyPress(e) 
        
            {
                if (typeof e == 'undefined' && window.event) // typeof event to be performed 
                {
                      e = window.event;   
                }
                     if (e.keyCode == 13) //keycode event to be performed where number 13 is for enter key
                {
                      document.getElementById('button').click(); //it perform the value enter and button search provided that added with button id
                }
            }
            
            
        function onsearchload()
                
                {
                   
               
                
                // hr is an variable for XMLHttpRequest object
                var hr = new XMLHttpRequest();
                // ser and url are the variables we need to send to our PHP file
                var ser = document.getElementById("searchaddress").value;//searched value
                var url = "GetPlaces.php?searchaddress="+ser;// url for the parsing script 
                hr.open("GET", url, true); // open method on XMLHttpRequest consist of parameter to send the given script to be passed to the url in GetPlaces.php using GET method 
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");//sets the url encoded variable in the request
                hr.onreadystatechange = function()// the XMLHttpRequest on ready state event 
                {
                        if(hr.readyState == 4 && hr.status == 200) //when the ready state is complete and its status is okay 
                        {
                                var dataret = hr.responseText; // this given the output of Getplaces.php
                                document.getElementById("result").innerHTML = dataret; // The result value stores the output value from GetPlaces.php to the given id inside home.php
                    
                        }
                        
                }
                
                hr.send() // waiting for the response to update on the given result div this executes the request
                document.getElementById("result").innerHTML; //before the onreadystate function triggers this is actually load the given result
        }
    
        </script>
        <title>Effect Works</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="style1.css" rel="stylesheet" type="text/css"/> 
    </head>
    <body>
        
        <div id="wrapper">
            <div id="effect">Effect Works</div><!-- end of effect -->
            <br /><br />
                     
                <input id="searchaddress" type="text"onkeypress="searchKeyPress(event)" name="searchaddress" placeholder="Enter an address to search"/><input type="submit"value="SUBMIT" onclick="javascript:onsearchload()" name="submitbutton" id="button"/>
                <br /><br /><br /><br /><br />
                <ul id="result"></ul>
                
                
        </div><!-- end of wrapper -->
        
    </body>
</html>
