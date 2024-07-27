<?php
#deny access to main page if user not logged in 
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: jetBirdLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Main Page</title>
        <link rel="stylesheet" href="jetbirdMainPage.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="navlogoJB">
                    <a href="jetBirdMain.php">
                        <img src="imagesJB/logo.png" alt="JetBird Logo" />
                        <h2>JetBird</h2>
                    </a>
                </div>
                <input type="checkbox" id="click" />
                <label for="click">
                    <i class="menu_btnJB bx bx-menu"></i>
                    <i class="close_btn bx bx-x"></i>
                </label>
                <ul>
                    <li><a href="jetBirdLogout.php">Logout</a></li>
                    <li><a href="#booking">Booking</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#why">Why Us</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </header>
        <!-- home -->
        <section class="homeJB">
            <div class="containerJB">
                <div class="homecontainerJB">
                    <div class="textSectionJB">
                        <h2>Fly with us!</h2>
                        <h3>Discover new worlds with JetBird</h3>
                        <p>
                            JetBird Travel Agency is here to help you create unforgettable memories and seamless travel experiences. Whether you're envisioning a tropical getaway, a cultural exploration, or a luxurious vacation, JetBird is dedicated to making your dream destination a reality.
                        </p>
                        <div class="mainSectionBttnJB">
                            <button class="BttnJB"><a href="#booking" color="white">Book Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- flights location -->
        <section class="servicesJB" id="service">
            <h2 class="containerTitleJB">Our Services</h2>
            <div class="containerJB">
                <div class="serviceContainerJB">
                    <div class="servicesItemsJB">
                        <img src="imagesJB/c1.jpg" alt="Hot Beverages" />
                        <div class="servicesTextJB">
                            <h3>America €350</h3>
                            <p>
                                There's a pretty scalable selection of holiday activities, attractions and events across the United States for every interest or taste. It is true that in the United States you can spend your holidays no matter what interests of, because there are areas for all tastes!
                            </p>
                            <a href="#booking"> Book Now</a>
                        </div>
                    </div>
                    <div class="servicesItemsJB">
                        <img src="imagesJB/c2.jpg" alt="Cold Beverages" />
                        <div class="servicesTextJB">
                            <h3>United Kingdom €150</h3>
                            <p>
                                Visit some of the classic highlights such as Christmas lights on Oxford Street, ice skating at Somerset House, and checking out famed landmarks including Tower of London or Buckingham Palace. Miss Winter Wonderland in Hyde Park, with its rides and shows? For Christmas time, the UK has a wide range of things to do on holiday so there is something for all tastes.
                            </p>
                            <a href="#booking"> Book Now</a>
                        </div>
                    </div>
                    <div class="servicesItemsJB">
                        <img src="imagesJB/c3.jpg" alt="Refreshment" />
                        <div class="servicesTextJB">
                            <h3>France €150</h3>
                            <p>Whether your interests are cultural, natural or whether you're seeking a great gastronomic adventure; France can cater to all as it offers and excellent range of things-to-do.</p>
                            <a href="#booking"> Book Now</a>
                        </div>
                    </div>
                    <div class="servicesItemsJB">
                        <img src="imagesJB/c4.jpg" alt="Special Combos" />
                        <div class="servicesTextJB">
                            <h3>Germany €250</h3>
                            <p>
                                Buenos Aires is a melting pot of historical sites, modern attractions and cultural dynamism. See the Brandenburg Gate, Berlin Wall, Museum Island or take your pick in cool districts like Kreuzberg and Prenzlauer Berg. Berlin boasts a diverse range of nightlife, including some cutting-edge clubs and bars as well numerous other live music venues. 
                            </p>
                            <a href="#booking"> Book Now</a>
                        </div>
                    </div>
                    <div class="servicesItemsJB">
                        <img
                            src="imagesJB/c5.jpg"
                            alt="Burger & French Fries"
                            />
                        <div class="servicesTextJB">
                            <h3>Italy €150</h3>
                            <p>Known as the "Eternal City," Rome is a treasure trove of historical and cultural sites. Visit iconic landmarks such as the Colosseum, the Roman Forum, the Vatican Museums, and St. Peter's Basilica. Don't miss the Trevi Fountain, the Pantheon, and the lively neighborhoods of Trastevere and Campo de' Fiori. dont add</p>
                            <a href="#booking"> Book Now</a>
                        </div>
                    </div>
                    <div class="servicesItemsJB">
                        <img src="imagesJB/c6.jpg" alt="Desserts" />
                        <div class="servicesTextJB">
                            <h3>Japan €500</h3>
                            <p>
                                Tokyo, as a vibrant metropolis, offers a blend of modernity and tradition with its mix of futuristic skyscrapers and ancient temples. Must-see landmarks range from the famous Tokyo Tower to the culturally rich Senso-ji Temple in Asakusa, as well as the trendy neighborhoods of Shibuya and Harajuku. Dive into the tech hub of Akihabara, delve into top-notch museums, and savor the lively nightlife found in places like Roppongi and Shinjuku.
                            </p>
                            <a href="#booking"> Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Book jetbird -->
        <section class="bookJB" id="booking">
            <?php
            $connection = mysqli_connect('localhost', 'root', '', 'book_db');
            if (isset($_POST['send'])) {
                $nameJB = isset($_POST['name']) ? $_POST['name'] : '';
                $emailJB = isset($_POST['email']) ? $_POST['email'] : '';
                $phoneJB = isset($_POST['phone']) ? $_POST['phone'] : '';
                $addressJB = isset($_POST['address']) ? $_POST['address'] : '';
                $locationJB = isset($_POST['location']) ? $_POST['location'] : '';
                $guestsJB = isset($_POST['guests']) ? $_POST['guests'] : '';
                $arrivalsJB = isset($_POST['arrivals']) ? $_POST['arrivals'] : '';
                $leavingJB = isset($_POST['leaving']) ? $_POST['leaving'] : '';

                $sqlRequest = "INSERT INTO book_form (name, email, phone, address, location, guests, arrivals, leaving) VALUES ('$nameJB', '$emailJB', '$phoneJB', '$addressJB', '$locationJB', '$guestsJB', '$arrivalsJB', '$leavingJB')";

                mysqli_query($connection, $sqlRequest); // connects to db
                
            }
            ?>
            <div class="containerJB">
                <div class="bookingContainerJB">
                    <div class="containerBooking">
                        <h2>Book your flight</h2>
                        <form action="jetBirdMain.php" method="post" class="bookingFormGrpJB">
                            <div class="formGroupJB">
                                <label for="name">Full Name</label>
                                <input type="text" placeholder="enter your name" name="name">
                            </div>
                            <div class="formGroupJB">
                                <<label for="email">Email</label>
                                <input type="email" placeholder="enter your email" name="email">
                            </div>
                            <div class="formGroupJB">
                                <label for="phone">Phone Number</label>
                                <input type="number" placeholder="enter your number" name="phone">
                            </div>
                            <div class="formGroupJB">
                                <label for="address">Address</label>
                                <input type="text" placeholder="enter your address" name="address">
                            </div>
                            <div class="formGroupJB">
                                <label for="location">where to</label>
                                <input type="text" placeholder="place you want to visit" name="location">
                            </div>
                            <div class="formGroupJB">
                                <label for="people">How many</label>
                                <input type="number" placeholder="number of guests" name="guests">
                            </div>
                            <div class="formGroupJB">
                                <label for="arrival">Arriving</label>
                                <input type="date" name="arrivals">
                            </div>
                            <div class="formGroupJB">
                                <label for="leaving">Leaving</label>
                                <input type="date" name="leaving">
                            </div>
                            <button class="bookBttn" type="submit" value="submit" name="send">Book Now</button>
                        </form>
                    </div>
                    <div class="textSectionJB">
                        <h2 class="containerTitleJB">Booking</h2>
                        <p>
                            If you have chossen a place for your holiday from the places that we have in our services then you can
                            start booking now and we will find the best flights for you with the best price that suits your. However!, if
                            you have not found a place for your holiday yet, then that is no big deal. You can still book today and we will
                            find the best location for your holidays! Just fill in the details in our booking system.
                            We will contact you through your mobile phone or email when we have found the best location for you! So sit back and relax, no 
                            need to stress yourself in searching for a hidden place when we can do that for you! sit back and relax and leave everything
                            else to us.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why jetbird -->
        <section class="aboutJB" id="why">
            <h2 class="containerTitleJB">Why Us?</h2>
            <div class="containerJB">
                <div class="aboutContainerJB">
                    <div class="aboutItemsJB">
                        <img src="imagesJB/w1.jpg" alt="Delicious" />
                        <div class="aboutTextJB">
                            <h3>Tailored Travel Experiences</h3>
                            <p>
                                At JetBird, we tailor your journey to match your preferences, making sure every aspect is in line with your wishes.
                            </p>
                        </div>
                    </div>
                    <div class="aboutItemsJB">
                        <img src="imagesJB/2.jpg" alt="Pleasant" />
                        <div class="aboutTextJB">
                            <h3>Seamless Planning</h3>
                            <p>
                                Our team of experts handles all the details for you from booking flights and accommodations to planning out your itinerary allowing you to simply sit back, relax, and fully immerse yourself in the journey.
                            </p>
                        </div>
                    </div>
                    <div class="aboutItemsJB">
                        <img src="imagesJB/w2.jpg" alt="Hospitality" />
                        <div class="aboutTextJB">
                            <h3>Best Value</h3>
                            <p>
                                Enjoy competitive pricing and exclusive deals, giving you more value for your travel investment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Jetbird Gallery  -->
        <section class="galleryJB" id="gallery">
            <h2 class="containerTitleJB">Gallery</h2>
            <div class="containerJB">
                <div class="galleryContainerJB">
                    <div class="galleryItemsJB">
                        <img src="imagesJB/p1.jpg" alt="Gallery Image" />
                    </div>
                    <div class="galleryItemsJB">
                        <img src="imagesJB/p2.jpg" alt="Gallery Image" />
                    </div>
                    <div class="galleryItemsJB">
                        <img src="imagesJB/p3.jpg" alt="Gallery Image" />
                    </div>
                    <div class="galleryItemsJB">
                        <img src="imagesJB/p4.jpg" alt="Gallery Image" />
                    </div>
                    <div class="galleryItemsJB">
                        <img src="imagesJB/p5.jpg" alt="Gallery Image" />
                    </div>
                    <div class="galleryItemsJB">
                        <img src="imagesJB/p6.jpg" alt="Gallery Image" />
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact jetbird -->
        <section class="contactJB" id="contact">
    <?php
    $connection = mysqli_connect('localhost', 'root', '', 'book_db');
    $namecontJB = $emailcontJB = $numbercontJB = $messagecontJB = ''; // Initialize variables

    if (isset($_POST['send'])) {
        $namecontJB = isset($_POST['namecont']) ? $_POST['namecont'] : '';
        $emailcontJB = isset($_POST['emailcont']) ? $_POST['emailcont'] : '';
        $numbercontJB = isset($_POST['numbercont']) ? $_POST['numbercont'] : '';
        $messagecontJB = isset($_POST['messagecont']) ? $_POST['messagecont'] : '';

        $sqlRequest = "INSERT INTO contact_info (namecont, emailcont, numbercont, messagecont) VALUES ('$namecontJB', '$emailcontJB', '$numbercontJB', '$messagecontJB')";
        mysqli_query($connection, $sqlRequest); // connects to db

        echo "<div class='alert alert-success'>Message Sent!</div>";
    }
    ?>
    <h2 class="containerTitleJB">Contact Us</h2>
    <div class="containerJB">
        <div class="contactContainerJB">
            <div class="contactFormJB">
                <form action="jetBirdMain.php#contact" method="post" class="bookingFormGrpJB">
                    <div class="fieldJB">
                        <label for="Name">Full Name</label>
                        <input type="text" id="Name" placeholder="Your Name" required name="namecont"/>
                    </div>
                    <div class="fieldJB">
                        <label for="email">Your Email</label>
                        <input type="text" id="email" placeholder="Your Email" required name="emailcont"/>
                    </div>
                    <div class="fieldJB">
                        <label for="number">Your Number</label>
                        <input type="number" id="number" placeholder="Your Contact Number" required name="numbercont"/>
                    </div>
                    <div class="fieldJB">
                        <label for="textarea">Your Message</label>
                        <textarea id="textarea" placeholder="Message" required name="messagecont"></textarea>
                    </div>
                    <button class="BttnJB" id="submit" type="submit" value="submit" name="send">Submit</button>
                </form>
            </div>
            <div class="contactTextJB">
                <div class="contactItemsJB">
                    <i class="bx bx-current-location"></i>
                    <div class="contact_details">
                        <h3>Our Location</h3>
                        <p>Dublin, Ireland</p>
                    </div>
                </div>
                <div class="contactItemsJB">
                    <i class="bx bxs-envelope"></i>
                    <div class="contact_details">
                        <h3>General Enquries</h3>
                        <p>jetbird@gmail.com</p>
                    </div>
                </div>
                <div class="contactItemsJB">
                    <i class="bx bxs-phone-call"></i>
                    <div class="contact_details">
                        <h3>Call Us</h3>
                        <p>+353 838105465</p>
                    </div>
                </div>
                <div class="contactItemsJB">
                    <i class="bx bxs-time-five"></i>
                    <div class="contact_details">
                        <h3>Our Timing</h3>
                        <p>Mon-Sun : 10:00 AM - 7:00 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- jetbird footer -->
        <footer>
            <div class="containerJB">
                <div class="footerSectionJB">
                    <div class="footerLogoJB">
                        <a href="index.html">
                            <img src="imagesJB/logo.png" alt="Jetbird logo" />
                            <h2>JetBird</h2>
                        </a>
                    </div>
                    <div class="linksJB">
                        <h3>Useful Links</h3>
                        <ul>
                            <li><a href="#booking">Booking</a></li>
                            <li><a href="#service">Services</a></li>
                            <li><a href="#why">Why Us</a></li>
                            <li><a href="#gallery">Gallery</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <div class="contactUsJB">
                        <h3>Contact</h3>
                        <ul>
                            <li>
                                <i class="bx bx-current-location"></i>
                                <span>Location : Dublin, Ireland</span>
                            </li>
                            <li>
                                <i class="bx bxs-phone-call"></i> <span>Phone : +353 838105465</span>
                            </li>
                            <li>
                                <i class="bx bxs-time-five"></i>
                                <span>Mon-Sun : 10:00 AM - 7:00 PM</span>
                            </li>
                        </ul>
                    </div>
                    <div class="followUsJB">
                        <h3>Follow</h3>
                        <p> Coming soon! </p>
                        <i class="bx bxl-facebook-circle"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>