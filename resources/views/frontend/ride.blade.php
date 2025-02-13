@extends('layouts.header_ride_service')

@section('sectionmain')
<section id="main__cta" class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="main__cta__rectangle">
            <h4 class="mb-3 text-center text-dark">Find a Driver Near You</h4>

            <div class="mb-3">
                <label for="pickup" class="form-label">Enter Your Location</label>
                <input type="text" id="pickup" class="form-control" placeholder="Enter your location">
            </div>

            <button class="btn btn-primary">Find Driver</button>
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
          <img
            src="https://www.uber-assets.com/image/upload/f_auto,q_auto:eco,c_fill,w_558,h_372/v1613520218/assets/3e/e98625-31e6-4536-8646-976a1ee3f210/original/Safety_Home_Img2x.png"
            alt=""
          />
          <h4 style="color: black;">Our commitment to your safety</h4>
          <p style="color: black;"class="sous-titre">
            Each of our safety features and rules in our Community Guidelines
            contributes to creating a safe environment for our users.
          </p>
          <a href="#" class="text-cta"
            >Discover our Community Guidelines</a
          >
          <a href="#" class="text-cta"
            >See all safety features</a
          >
        </div>
        <div class="engagements__section__flex">
          <img
            src="https://www.uber-assets.com/image/upload/f_auto,q_auto:eco,c_fill,w_558,h_372/v1613520285/assets/c2/91ea9c-90d7-4c36-a740-d7844536694e/original/Cities_Home_Img2x.png"
            alt=""
          />
          <h4 style="color: black;">We move over 10,000 cities</h4>
          <p style="color: black;" class="sous-titre">
            With the app available in thousands of cities worldwide, you can
            also order rides when you're far from home.
          </p>
          <a href="#" class="text-cta" title="View all cities"
            >View all cities</a
          >
        </div>
      </div>
    </div>
  </section>






   <section data-aos="fade-up" id="infos__section" class="bg-light">
    <div class="container">
      <div class="split">
        <div class="infos__section__card">
          <img
            src="https://www.uber-assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542256135/assets/dd/c53d7b-8921-4dc7-93f4-45fb59f4ffb9/original/person-multiple-outlined.svg"
            alt=""
          />
          <p style="color: black;" class="titre">About Us</p>
          <p  style="color: black;"class="sous-titre">
            Discover our story, motivations, and world of opportunities.
          </p>
          <a href="#" class="text-cta">Learn more</a>
        </div>
        <div class="infos__section__card">
          <img
            src="https://www.uber-assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542254244/assets/eb/68c631-5041-4eeb-9114-80048a326782/original/document-outlined.svg"
            alt=""
          />
          <p style="color: black;" class="titre">Press Room</p>
          <p style="color: black;" class="sous-titre">
            Follow news about our features, initiatives, and partnerships.
          </p>
          <a href="#" class="text-cta">Learn more</a>
        </div>
        <div class="infos__section__card">
          <img
            src="https://www.uber-assets.com/image/upload/q_auto:eco,c_fill,w_24,h_24/v1542255370/assets/64/58118a-0ece-4f80-93ee-8041b53593d5/original/home-outlined.svg"
            alt=""
          />
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

  <script>
    AOS.init();
  </script>

@endsection