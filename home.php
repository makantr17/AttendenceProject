<!DOCTYPE html>      
          
<html>
    <head>
            <!-- Start morris code -->
            <title>HomePage</title>
            <link rel="stylesheet" href="styleHome.css">
         
    </head>
    

    <body>

        <!--  -->
        <section id="homepage">
            <!-- Menu bar -->
            <div id="menuBar">
                <div id="menu">
                    <ul>
                        <li><a>Home</a></li>
                        <li><a>Dashboard</a></li>
                        <li>Log in
                            <ul> 
                                <li><a href="http://localhost:8000/logInsystem.php">Facilitator</a></li>
                                <li><a href="http://localhost:8000/logInsystem.php">Student</a></li>
                                <li><a href="http://localhost:8000/facilitatorLogin.php">Sponshor</a></li>
                            </ul>
                        </li>
                    </ul>
                </div> 

                <div id="imageLef">
                    <div id="description">
                        <h1>SPONSORS --------------------------------------------------------</h1>
                        <p>Check my presence through a period</p>
                        <p>General Presence through month</p>
                        <p>Make a report</p>
                    </div>

                    <div id="description">
                        <h1>STUDENT ---------------------------------------------------------</h1>
                        <p>Check my presence through a period</p>
                        <p>Make a request for my presence</p>
                        <p>Notified my Absence</p>
                    </div>

                    <div id="description">
                        <h1>FACILITATOR -----------------------------------------------------</h1>
                        <p>Check Student presence through a period and general info related to his class</p>
                        <p>Make new attendence and update existing attendence</p>
                        <p>Being Notified by Students</p>
                        <p>Make a report</p>
                    </div>
                </div>



            </div>


            <div id="content">
                <h1>TRACK STUDENT' ATTENDENCE</h1>
                <div id="cover">
                    <img id="replace" src="image/backG.jpg">
                </div>

                <div id="about">
                   
                    <p id="message">ALU University is a Panafrican University the most growing leadership
                       and connectivity. Extended in 2017 from the previous University of Ile moris by the 
                       the most powerful African leader Fred Swaniker.
                       ALU Community African leadership University community know for his quality 
                     </p>
                </div>

                <div id="slide">
                    <div id="icons">
                        <img id="simage1" src="image/backG.jpg">
                        <button onclick="slide1Function()" id="slide1">1</button>
                        <p style="display:none" id="smessage1">
                            Extended in 2017 from the previous University of Ile moris by the 
                            the most powerful African leader F
                        </p>
                    </div>

                    <div id="icons">
                        <img id="simage2" src="image/communi.jpg">
                        <button onclick="slide2Function()" id="slide2">2</button>
                        <p style="display:none" id="smessage2">
                        ul African leader Fred Swaniker.
                       ALU Community African lead
                        </p>
                    </div>

                    <div id="icons">
                        <img id="simage3" src="image/proALU.jpg">
                        <button onclick="slide3Function()" id="slide3">3</button>
                        <p style="display:none" id="smessage3">
                        ALU University is a Panafrican University the most growing leadership
                       and connect
                        </p>
                    </div>
                
                </div>

                <script>
                    
                    function slide1Function() {
                        document.getElementById('simage2').style.width = "60px";
                        document.getElementById('simage2').style.height = "60px";
                        document.getElementById('simage2').style.position = "none";
                        document.getElementById('simage2').style.margin = "0px";
                        document.getElementById('simage2').style.marginBottom = "10px";
                        document.getElementById('simage2').style.border = "1px solid gray";

                        document.getElementById('simage3').style.width = "60px";
                        document.getElementById('simage3').style.height = "60px";
                        document.getElementById('simage3').style.position = "none";
                        document.getElementById('simage3').style.margin = "0px";
                        document.getElementById('simage3').style.marginBottom = "10px";
                        document.getElementById('simage3').style.border = "1px solid gray";


                        
                        document.getElementById('simage1').style.width = "70px";
                        document.getElementById('simage1').style.height = "70px";
                        document.getElementById('simage1').style.position = "relative";
                        document.getElementById('simage1').style.margin = "-5px";
                        document.getElementById('simage1').style.marginBottom = "15px";
                        document.getElementById('simage1').style.border = "1px solid tomato";

                        document.getElementById('replace').src=document.getElementById('simage1').src;
                        document.getElementById('message').textContent=document.getElementById('smessage1').textContent;
                     
                    }
                    function slide2Function() {
                        
                        document.getElementById('simage1').style.width = "60px";
                        document.getElementById('simage1').style.height = "60px";
                        document.getElementById('simage1').style.position = "none";
                        document.getElementById('simage1').style.margin = "0px";
                        document.getElementById('simage1').style.marginBottom = "10px";
                        document.getElementById('simage1').style.border = "1px solid gray";

                        document.getElementById('simage3').style.width = "60px";
                        document.getElementById('simage3').style.height = "60px";
                        document.getElementById('simage3').style.position = "none";
                        document.getElementById('simage3').style.margin = "0px";
                        document.getElementById('simage3').style.marginBottom = "10px";
                        document.getElementById('simage3').style.border = "1px solid gray";

                        document.getElementById('simage2').style.width = "70px";
                        document.getElementById('simage2').style.height = "70px";
                        document.getElementById('simage2').style.position = "relative";
                        document.getElementById('simage2').style.margin = "-5px";
                        document.getElementById('simage2').style.marginBottom = "15px";
                        document.getElementById('simage2').style.border = "1px solid tomato";

                        document.getElementById('replace').src=document.getElementById('simage2').src;
                        document.getElementById('message').textContent=document.getElementById('smessage2').textContent;
                     
                    }
                    function slide3Function() {
                        document.getElementById('simage1').style.width = "60px";
                        document.getElementById('simage1').style.height = "60px";
                        document.getElementById('simage1').style.position = "none";
                        document.getElementById('simage1').style.margin = "0px";
                        document.getElementById('simage1').style.marginBottom = "10px";
                        document.getElementById('simage1').style.border = "1px solid gray";

                        document.getElementById('simage2').style.width = "60px";
                        document.getElementById('simage2').style.height = "60px";
                        document.getElementById('simage2').style.position = "none";
                        document.getElementById('simage2').style.margin = "0px";
                        document.getElementById('simage2').style.marginBottom = "10px";
                        document.getElementById('simage2').style.border = "1px solid gray";

                        document.getElementById('simage3').style.width = "70px";
                        document.getElementById('simage3').style.height = "70px";
                        document.getElementById('simage3').style.position = "relative";
                        document.getElementById('simage3').style.margin = "-5px";
                        document.getElementById('simage3').style.marginBottom = "15px";
                        document.getElementById('simage3').style.border = "1px solid tomato";


                        document.getElementById('replace').src=document.getElementById('simage3').src;
                        document.getElementById('message').textContent=document.getElementById('smessage3').textContent;
                     
                    }

                </script>
                

            </div>

        </section>

    </body>

</html>