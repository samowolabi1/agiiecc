<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./frontend/assets/styles/style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script defer src="/frontend/assets/script.js"></script>
    <link rel="icon" type="image/x-icon" href="images/Agiilogo1.png" />
    <title>Agii Ride</title>
</head>
<style>
    .box {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 1.8rem;
        text-align: center;
        margin-bottom: 20px;
        color: #222;
    }

    .options {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .options button {
        width: 48%;
        padding: 10px;
        font-size: 1rem;
        color: white;
        border: 1px solid #ddd;
        background: #8fc74a;
        border-radius: 5px;
        cursor: pointer;

    }

    .options button:hover {
        background: #8fc74a;
        ;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .form-inline {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .form-inline select,
    .form-inline input {
        padding: 10px;
        font-size: 1rem;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 48%;
    }

    .see-prices {
        display: block;
        width: 100%;
        padding: 10px;
        font-size: 1.2rem;
        text-align: center;
        color: #fff;
        background: #8fc74a;
        ;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .see-prices:hover {
        background: #444;
    }
</style>

<body>
    <header class="" style="background-color: white;">
        <div class="container">
            <nav>
                <div>
                    <img src="images/Agiilogo2.png" style="height: 70px; padding-right: 50px;" alt="">
                    <ul class="nav-links">
                        <li><a href="#">Company</a></li>
                        <li><a href="#">Safety</a></li>
                        <li>
                            <a href="index.html">Marketplace</a>
                        </li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>
                <div>
                    <ul id="nav-links" class="nav-links">
                        <li><a href="login.html">Log in</a></li>
                        <li><a href="signin.html" class="nav__cta">Sign up</a></li>
                    </ul>
                </div>
                <div class="hamburger">
                    <span class="hamburger-bar"></span><span class="hamburger-bar"></span>
                    <span class="hamburger-bar"></span>
                </div>
            </nav>
        </div>
    </header>

    <section id="main__cta">
        <div class="container">
            <div class="split">
                <div class="main__cta__rectangle bg-light">
                    <div class="box align-items-start">
                        <h1 style="color: black;">Go Anywhere with Agii Ride</h1>

                        <div class="options">
                            <button>Ride</button>
                            {{-- <button>Courier</button> --}}
                        </div>

                        <form action="{{ route('rider.getprice')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="pickup">Pickup Location</label>
                                <input type="text" id="pickup" placeholder="Enter pickup location">
                            </div>

                            <div class="form-group">
                                <label for="dropoff">Dropoff Location</label>
                                <input type="text" id="dropoff" placeholder="Enter dropoff location">
                            </div>

                            {{-- <div class="form-inline">
                                <select>
                                    <option>Today</option>
                                    <option>Tomorrow</option>
                                </select>
                                <input type="time" value="12:00" >
                            </div> --}}

                            <button class="see-prices" type="submit">See Prices</button>
                        </form>
                    </div>


                </div>
                <div></div>
            </div>
        </div>
    </section>

    <section id="business-header">
        <div class="container">
            <div class="business-header__text">
                <h3>Agii Ride for Business</h3>
                <p>
                    Change the way your employees move and dine.
                </p>
                <a href="#" class="btn">Discover how</a>
            </div>
        </div>
    </section>

    <section data-aos="zoom-in" id="engagements__section" class="bg-light">
        <div class="container">
            <h3>Wherever you go, your safety is our priority</h3>
            <div class="split">
                <div class="engagements__section__flex">
                    <img src="https://www.uber-frontend/assets.com/image/upload/f_auto,q_auto:eco,c_fill,w_558,h_372/v1613520218/frontend/assets/3e/e98625-31e6-4536-8646-976a1ee3f210/original/Safety_Home_Img2x.png"
                        alt="" />
                    <h4 style="color: black;">Our commitment to your safety</h4>
                    <p style="color: black;"class="sous-titre">
                        Each of our safety features and rules in our Community Guidelines
                        contributes to creating a safe environment for our users.
                    </p>
                    <a href="#" class="text-cta">Discover our Community Guidelines</a>
                    <a href="#" class="text-cta">See all safety features</a>
                </div>
                <div class="engagements__section__flex">
                    <img src="https://www.uber-frontend/assets.com/image/upload/f_auto,q_auto:eco,c_fill,w_558,h_372/v1613520285/frontend/assets/c2/91ea9c-90d7-4c36-a740-d7844536694e/original/Cities_Home_Img2x.png"
                        alt="" />
                    <h4 style="color: black;">We move over 10,000 cities</h4>
                    <p style="color: black;" class="sous-titre">
                        With the app available in thousands of cities worldwide, you can
                        also order rides when you're far from home.
                    </p>
                    <a href="#" class="text-cta" title="View all cities">View all cities</a>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up" id="infos__section" class="bg-light">
        <div class="container">
            <div class="split">
                <div class="infos__section__card">
                    <img src="https://www.uber-frontend/assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542256135/frontend/assets/dd/c53d7b-8921-4dc7-93f4-45fb59f4ffb9/original/person-multiple-outlined.svg"
                        alt="" />
                    <p style="color: black;" class="titre">About Us</p>
                    <p style="color: black;"class="sous-titre">
                        Discover our story, motivations, and world of opportunities.
                    </p>
                    <a href="#" class="text-cta">Learn more</a>
                </div>
                <div class="infos__section__card">
                    <img src="https://www.uber-frontend/assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542254244/frontend/assets/eb/68c631-5041-4eeb-9114-80048a326782/original/document-outlined.svg"
                        alt="" />
                    <p style="color: black;" class="titre">Press Room</p>
                    <p style="color: black;" class="sous-titre">
                        Follow news about our features, initiatives, and partnerships.
                    </p>
                    <a href="#" class="text-cta">Learn more</a>
                </div>
                <div class="infos__section__card">
                    <img src="https://www.uber-frontend/assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542255370/frontend/assets/64/58118a-0ece-4f80-93ee-8041b53593d5/original/home-outlined.svg"
                        alt="" />
                    <p style="color: black;" class="titre">Global Citizens</p>
                    <p style="color: black;" class="sous-titre">
                        Discover what we're doing to have a positive impact in the cities
                        we serve.
                    </p>
                    <a href="#" class="text-cta">Learn more</a>
                </div>
            </div>
        </div>
    </section>

    <section id="applications__section">
        <div class="container">
            <h3 style="color: black;">Find even more features in our apps</h3>
            <div class="split">
                <a data-aos="fade-right" href="#" class="app__card">
                    <span>Agii Ride</span>
                    <p class="app__titre">
                        Download the app for drivers and couriers
                    </p>
                </a>
                <a data-aos="fade-left" href="#" class="app__card">
                    <span>Agii Ride</span>
                    <p class="app__titre">Download the Agii Ride app</p>
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-dark">
        <div class="container">
            <nav>
                <div><a href="#" class="logo">Agii Ride</a></div>
                <div>
                    <a href="#">How Agii Ride apps and website work</a>
                </div>
            </nav>
        </div>
    </footer>
    <script>
        AOS.init();
    </script>
</body>

</html>
