<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid Prevention Unit</title>
    <link rel="stylesheet" href="css/covid.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&display=swap" rel="stylesheet">
</head>

<body>

    <!--Navigation bar-->

    <div class="menu">
        <div><img src="imgs/CovidLogo.png" alt="logo"></div>
        <div class="navbar">
            <ul class="right-menu">
                <li><a href="#Home">Home</a></li>
                <li><a href="#Precaution">Precaution</a></li>
                <li><a href="login.php">Staff Login</a></li>
                <li><a href="admin.php">Admin</a></li>

            </ul>
        </div>

    </div>
    
    <!--Home-->

    <div  class = "wrap" id="Home">
        <img src="imgs/Mask_bg.jpg" alt="">
    </div>

    <div class="about">
        <h2 class="header">About Covid</h2>
        <div class="grid container">
            <div class="info-section">
                <h3>How it started?</h3>
                <p>There is uncertainty about several aspects of the Covid-19 origin story that scientists are trying
                    hard to unravel.
                    Prof Stephen Turner, head of the department of microbiology at Melbourne’s Monash University, says
                    what’s most likely is that virus originated in bats.</p>
                <h3>How it spreads?</h3>
                <p>COVID-19 spreads mainly by droplets produced as a result of coughing or sneezing of a COVID-19
                    infected person.
                </p>
                <ul>
                    <li> Direct close contact: one can get the infection by being in close contact with COVID-19
                        patients (within one Metre of the infected person), especially if they do not cover their face
                        when coughing or sneezing.
                    </li>
                    <li>Indirect contact: the droplets survive on surfaces and clothes for many days. Therefore,
                        touching any such infected surface or cloth and then touching one’s mouth, nose or eyes can
                        transmit the disease.</li>
                </ul>
            </div>
            <div class="right-img"><img src="imgs/Virus.jpg" alt=""> </div>
        </div>
    </div>
    
    <!--Counter Measures-->

    <section id="Precaution">
        <h2 class="header">Counter Measures</h2>
        <div class="custom-grid container">
            <div class="social-distancing card-box">
                <img src="imgs/Social_distancing.jpg" alt="">
                <p>Social distancing helps limit opportunities to come in contact with contaminated surfaces and
                    infected people outside the home. Although the risk of severe illness may be different for everyone,
                    anyone can get and spread COVID-19.</p>
                <a class="btn-precaution custom-a"
                    href="https://www.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/social-distancing.html#:~:text=Social%20distancing%20helps%20limit%20opportunities,get%20and%20spread%20COVID%2D19.">Read
                    more</a>
            </div>

            <div class="washing-hands card-box">
                <img src="imgs/Hand_sanitize.jpg" alt="">
                <p>Germs are everywhere! They can get onto hands and items we touch during daily activities and make us
                    sick. Cleaning hands at key times with soap and water or hand sanitizer that contains at least 60%
                    alcohol is one of the most important steps you can take to avoid getting sick</p>
                <a class="btn-precaution custom-a"
                    href="https://www.cdc.gov/handwashing/hand-sanitizer-use.html#:~:text=Germs%20are%20everywhere!,germs%20to%20those%20around%20you.">Read
                    more</a>
            </div>

            <div class="good-hygiene card-box">
                <img src="imgs/Quarantine.jpg" alt="">
                <p>Governments and health authorities use quarantines to stop the spread of contagious diseases.
                    Quarantines are also for people or groups who do not have symptoms but were exposed to the disease.
                    The quarantine keeps them away from others so they do not unknowingly infect anyone.</p>
                <a class="btn-precaution custom-a"
                    href="https://patientser.com/why-its-important-to-self-quarantine-during-the-covid-19-coronavirus-pandemic/">Read
                    more</a>
            </div>

            <div class="wearing-mask card-box">
                <img src="imgs/pexels-anna-shvets-3902881.jpg" alt="">
                <p>COVID-19 spreads mainly from person to person through respiratory droplets. A mask is NOT a
                    substitute for social distancing. Masks should still be worn in addition to staying at least 6 feet
                    apart, especially when indoors around people who don’t live in your household. </p>
                <a class="btn-precaution custom-a"
                    href="https://www.cdc.gov/coronavirus/2019-ncov/prevent-getting-sick/cloth-face-cover-guidance.html">Read
                    more</a>
            </div>

        </div>
    </section>

    <!--Aarogya Setu-->

    <section id="Aarogya-setu">

        <div class="Aarogya-background grid">

            <div class="Aarogya-info">
                <h5>Aarogya Setu</h5>
                <p>This pandemic get yourself protected with Aarogya Setu Mobile App.
                    Aarogya Setu is a mobile application developed by the Government of India to connect essnetial
                    health services with the people of India in our combined fight against COVID-19.
                </p>
                <p>Get your own bodyguard for free!</p>
                <a class="btn-orange custom-a" href="https://www.mygov.in/aarogya-Setu-app/">Get it now!</a>
            </div>


            <div class="Aarogya-app"><img src="imgs/Aarogya_Setu_app.jpg" alt=""></div>

        </div>
    </section>

    <!--Footer-->

    <footer>
        <div class="footer">
            <div class="grid-3 my-1">
                <div>
                <img src="imgs/CovidLogo.png" alt="logo"> 
                </div>

                <div>
                    <h4>Links</h4>
                    <ul>
                        <li>
                            <a class="custom-a"href="https://www.mygov.in/covid-19/" class="">Covid Dashboard India</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h4>About Us</h4>
                    <ul>
                        <li>Powered by Clg Biros</li>
                        <li>ouremail@email.com</li>
                        <li>#212,Alyas,Bangalore,India</li>
                    </ul>
                </div>
            </div>

            <p class="hr"></p>

            <div class="grid-3">
                <div>
                    <p>partnered with Pramukh</p>
                </div>
                <div>

                </div>
                <div class="copy-right">
                    <p><em>All rights reserved</em>&copy2020 Clg Biros</p>
                </div>
            </div>
        </div>

    </footer>

</body>

</html>