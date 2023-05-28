<?php

$db_name = 'mysql:host=localhost;dbname=contact_db';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if(isset($_POST['send'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $courses = $_POST['courses'];
   $courses = filter_var($courses, FILTER_SANITIZE_STRING);
   $gender = $_POST['gender'];
   $gender = filter_var($gender, FILTER_SANITIZE_STRING);

   $select_contact = $conn->prepare("SELECT * FROM `students` WHERE name = ? AND number = ? AND email = ? AND courses = ? AND gender = ?");
   $select_contact->execute([$name, $number, $email, $courses, $gender]);

   if($select_contact->rowCount() > 0){
      $message[] = 'already sent message!';
   }else{
      $insert_message = $conn->prepare("INSERT INTO `students`(name, number, email, courses, gender) VALUES(?,?,?,?,?)");
      $insert_message->execute([$name, $number, $email, $courses, $gender]);
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Languges Acdemey Website Design</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>


<header class="header">

   <section class="flex">

      <a href="#home" class="logo">Global Academy</a>

      <nav class="navbar">
         <a href="#home">home</a>
         <a href="#about">about</a>
         <a href="#courses">courses</a>
         <a href="#teachers">teachers</a>
         <a href="#reviews">reviews</a>
         <a href="#contact">contact</a>
      </nav>

      <div id="menu-btn" class="fas fa-bars"></div>

   </section>

</header>



<section class="home" id="home">

   <div class="row">

      <div class="content">
         <h3>online <span>education</span></h3>
         <a href="#contact" class="btn">contact us</a>
      </div>

      <div class="image">
         <img src="images/homg-img.svg" alt="">
      </div>

   </div>

</section>



<section class="count">

   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div class="content">
            <h3>150+</h3>
            <p>courses</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-user-graduate"></i>
         <div class="content">
            <h3>1300+</h3>
            <p>students</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-chalkboard-user"></i>
         <div class="content">
            <h3>80+</h3>
            <p>teachers</p>
         </div>
      </div>

      <div class="box">
         <i class="fas fa-face-smile"></i>
         <div class="content">
            <h3>100%</h3>
            <p>satisfaction</p>
         </div>
      </div>

   </div>

</section>



<section class="about" id="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>why choose us?</h3>
         <p>We have a selection of the best trainers in the world to get you to the best levels of education</p>
         <a href="#contact" class="btn">contact us</a>
      </div>

   </div>

</section>


<section class="courses" id="courses">

   <h1 class="heading">our <span>courses</span></h1>

   <div class="swiper course-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images\english-1.png" alt="">
            <h3>English</h3>
            <p>Curriculum suitable for all ages, from beginning to professional</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images\Spanish-2.png" alt="">
            <h3>Spanish</h3>
            <p>Curriculum suitable for all ages, from beginning to professional</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images\Turkish-3.PNG" alt="">
            <h3>Turkish</h3>
            <p>Curriculum suitable for all ages, from beginning to professional</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images\arabic-4.png" alt="">
            <h3>Arabic</h3>
            <p>Curriculum suitable for all ages, from beginning to professional</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images\French-5.png" alt="">
            <h3>French</h3>
            <p>Curriculum suitable for all ages, from beginning to professional</p>
         </div>

         <div class="swiper-slide slide">
            <img src="images\russian-6.png" alt="">
            <h3>Russian</h3>
            <p>Curriculum suitable for all ages, from beginning to professional</p>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<section class="teachers" id="teachers">

   <h1 class="heading">expert <span>tutors</span></h1>

   <div class="swiper teachers-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images\Bashar.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Bashar Kabala</h3>
         </div>
         
         <div class="swiper-slide slide">
            <img src="images\khaled.jpg" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>Halid Acac </h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-3.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>tony smith</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-4.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>elin rymen</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-5.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>locas Hrnandis</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="images/tutor-6.png" alt="">
            <div class="share">
               <a href="#" class="fab fa-facebook-f"></a>
               <a href="#" class="fab fa-twitter"></a>
               <a href="#" class="fab fa-instagram"></a>
               <a href="#" class="fab fa-linkedin"></a>
            </div>
            <h3>sylina uldai</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>


<section class="reviews" id="reviews">

   <h1 class="heading"> student's <span>reviews</span></h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <p>My English became better and this helped me get better opportunities in my life. thanks global academy</p>
            <div class="user">
               <img src="images/pic-1.png" alt="">
               <div class="user-info">
                  <h3>john deo</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Türkçe dilim daha iyidir oldu . teşekkürler global.</p>
            <div class="user">
               <img src="images/pic-2.png" alt="">
               <div class="user-info">
                  <h3>Sara Frank</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Mein Deutsch wurde besser.  Danke global.</p>
            <div class="user">
               <img src="images/pic-3.png" alt="">
               <div class="user-info">
                  <h3>Mohammed saeed</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Мой русский стал хорошим.  Спасибо глобально .</p>
            <div class="user">
               <img src="images/pic-4.png" alt="">
               <div class="user-info">
                  <h3>Malak kaya</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>لغتي العربية اصبحت افضل شكرا لكم</p>
            <div class="user">
               <img src="images/pic-5.png" alt="">
               <div class="user-info">
                  <h3>john Smith</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

         <div class="swiper-slide slide">
            <p>Mi español mejoró.  gracias globales</p>
            <div class="user">
               <img src="images/pic-6.png" alt="">
               <div class="user-info">
                  <h3>Lekim son</h3>
                  <div class="stars">
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star"></i>
                     <i class="fas fa-star-half-alt"></i>
                  </div>
               </div>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>



<section class="contact" id="contact">

   <h1 class="heading"><span>contact</span> us</h1>

   <div class="row">

      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <span>your name</span>
         <input type="text" required placeholder="enter your full name" maxlength="50" name="name" class="box">
         <span>your number</span>
         <input type="number" required placeholder="enter your valie number" max="9999999999" min="0" name="number" class="box" onkeypress="if(this.value.length == 10) return false;">
         <span>your email</span>
         <input type="email" required placeholder="enter your valie email" maxlength="50" name="email" class="box">
         <span>select course</span>
         <select name="courses" class="box" required>
            <option value="" disabled selected>select the course --</option>
            <option value="English">English</option>
            <option value="Spanish">Spanish</option>
            <option value="Turkish">Turkish</option>
            <option value="Arabic">Arabic</option>
            <option value="French">French</option>
            <option value="German">German</option>
            <option value="Italian">Italian</option>
            <option value="Russian">Russian</option>
            <option value="Chinese">Chinese</option>
         </select>
         <span>select gender</span>
         <div class="radio">
            <input type="radio" name="gender" value="male" id="male">
            <label for="male">male</label>
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">female</label>
         </div>
         <input type="submit" value="send message" class="btn" name="send">
      </form>

   </div>

</section>



<footer class="footer">

   <section>

      <div class="share">
         <a href="#" class="fab fa-facebook-f"></a>
         <a href="#" class="fab fa-twitter"></a>
         <a href="#" class="fab fa-linkedin"></a>
         <a href="#" class="fab fa-instagram"></a>
         <a href="#" class="fab fa-youtube"></a>
      </div>

      <div class="credit">&copy; copyright @ 2023 by <span>Bashar Kabala and Halid Acac</span> | all rights reserved!</div>

   </section>

</footer>
















<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

</body>
</html>