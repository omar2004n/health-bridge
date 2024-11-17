<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment Landing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<style>
  @import url("https://fonts.googleapis.com/css?family=Lato:300,400,900");
* {
  box-sizing: border-box;
}

html, body {
  font-family: "Lato", sans-serif;
}

a {
  text-decoration: none;
  color: black;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.container {
  width: 960px;
  max-width: 90%;
  margin: 0 auto;
}

.main-header {
  position: relative;
  background-image: url(https://previews.123rf.com/images/michaeljung/michaeljung1302/michaeljung130200296/17781867-handsome-african-american-medical-doctor-with-colleagues-in-background.jpg);
  background-size: cover;
}
.main-header .menu {
  display: none;
}
.main-header .app-icons {
  position: absolute;
  max-width: 450px;
  top: 40%;
  right: 20px;
  opacity: 0.4;
}
.main-header .overlay {
  background: rgba(62, 209, 204, 0.9);
  padding: 0px 0px 80px 0px;
}

.container header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 50px 0px;
}
.container header .logo {
  display: flex;
  align-items: center;
}
.container header .logo img {
  width: 50px;
  margin-right: 10px;
}
.container header .logo span {
  font-size: 40px;
  color: white;
  width: 50px;
}
.container header .nav a {
  display: inline-block;
  padding: 15px 20px;
  margin-left: 20px;
  color: white;
  text-transform: uppercase;
  font-size: 12px;
}
.container header .nav a.active {
  background: rgba(0, 0, 0, 0.3);
  border-radius: 20px;
}

.content .content-wrapper {
  width: 500px;
}
.content .content-wrapper .blob {
  font-size: 50px;
  font-weight: 300;
  text-align: left;
  margin-bottom: 20px;
  color: white;
}
.content .content-wrapper .button-wrapper {
  margin-top: 50px;
  display: flex;
}
.content .content-wrapper .button-wrapper .button {
  margin-right: 20px;
  padding: 25px 30px;
  background: #ec2c82;
  color: white;
  text-transform: uppercase;
  border-radius: 50px;
  cursor: pointer;
  font-size: 10px;
  font-weight: 400;
  letter-spacing: 2px;
}
.content .content-wrapper .button-wrapper .button.ask {
  background: rgba(0, 0, 0, 0.4);
}
.content .content-wrapper .button-wrapper .button span {
  margin-left: 20px;
}

.footer {
  padding: 50px 0px;
}

.col-wrapper {
  display: flex;
}
.col-wrapper .col-1 {
  width: 25%;
}
.col-wrapper .col-1 .logo {
  display: flex;
  align-items: center;
}
.col-wrapper .col-1 .logo span {
  font-size: 40px;
  margin-left: 15px;
  color: #3ed1cc;
}
.col-wrapper .col-1 .logo img {
  width: 50px;
}
.col-wrapper .col-1 li {
  margin-bottom: 15px;
}
.col-wrapper .col-1 li a {
  font-size: 14px;
  font-weight: 900;
  color: #999;
  transition: all ease-in-out 300ms;
}
.col-wrapper .col-1 li a:hover {
  color: #3ed1cc;
}
.col-wrapper .col-1 li a.header {
  color: black;
  font-size: 16px;
  font-weight: 900;
  letter-spacing: 2px;
  text-transform: uppercase;
}

#social-media {
  padding: 30px 0px;
}
#social-media .social-wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
#social-media .social-wrapper .copyright {
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 700;
  color: #999;
  letter-spacing: 2px;
}
#social-media .social-wrapper .icons i {
  display: inline-block;
  width: 40px;
  height: 40px;
  text-align: center;
  border: 1px solid #999;
  margin: 0px 10px;
  border-radius: 50%;
  line-height: 40px;
  font-size: 20px;
  color: #3ed1cc;
  cursor: pointer;
  transition: all ease-in-out 300ms;
}
#social-media .social-wrapper .icons i:hover {
  background: #3ed1cc;
  color: white;
  border: 1px solid white;
}
#social-media .slug {
  display: flex;
  align-items: center;
}
#social-media .slug span {
  color: #999;
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 900;
}
#social-media .slug img {
  width: 20px;
  margin-left: 15px;
}

#how-it-works {
  padding: 100px 0px;
}
#how-it-works .intro {
  margin-bottom: 100px;
  font-size: 25px;
  color: #999;
  display: flex;
  align-items: center;
}
#how-it-works .intro span {
  color: #3ed1cc;
  margin-left: 20px;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  font-size: 16px;
  font-weight: 900;
}
#how-it-works .intro span i {
  font-size: 10px;
  margin-left: 10px;
}
#how-it-works .slug {
  text-transform: uppercase;
  text-align: center;
  color: #999;
  letter-spacing: 2px;
}
#how-it-works .title {
  font-size: 50px;
  letter-spacing: 2px;
  text-align: center;
  margin-bottom: 20px;
}
#how-it-works .content {
  width: 740px;
  margin: 0 auto 100px;
  text-align: center;
  font-size: 20px;
  line-height: 1.4;
}
#how-it-works .icon-wrapper {
  display: flex;
  justify-content: space-around;
  width: 900px;
  margin: 0 auto;
  max-width: 95%;
}
#how-it-works .icon-wrapper .icon {
  text-align: center;
}
#how-it-works .icon-wrapper .icon i {
  display: inline-block;
  width: 75px;
  height: 75px;
  margin-bottom: 15px;
  line-height: 75px;
  border-radius: 50%;
  background: white;
  font-size: 30px;
  box-shadow: 0px 5px 10px 3px rgba(0, 0, 0, 0.2);
  color: #3ed1cc;
  cursor: pointer;
  transition: all ease-in-out 300ms;
}
#how-it-works .icon-wrapper .icon i:hover {
  background: #3ed1cc;
  color: white;
}
#how-it-works .icon-wrapper .icon p {
  text-transform: uppercase;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 2px;
}

#question {
  background: #3ed1cc;
  padding: 150px 0px;
}
#question .title {
  font-size: 40px;
  font-weight: 300;
  text-align: center;
  margin-bottom: 20px;
  color: white;
}
#question .content {
  width: 640px;
  margin: 0 auto;
  text-align: center;
  line-height: 1.2;
  font-size: 18px;
  margin-bottom: 80px;
  color: white;
}
#question .form {
  width: 640px;
  margin: 0 auto;
  position: relative;
}
#question .form input {
  width: 100%;
  padding: 20px 0px;
  outline: none;
  border: none;
  text-indent: 20px;
  border-radius: 5px;
  box-shadow: 0px 2px 3px 5px rgba(0, 0, 0, 0.1);
}
#question .form i {
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
  color: #3ed1cc;
  font-size: 18px;
}

#talk .col-wrapper {
  display: flex;
  min-height: 500px;
}
#talk .col-wrapper .col-50 {
  width: 50%;
  padding: 50px;
}
#talk .col-wrapper .col-50:nth-child(2) {
  background-image: url(https://stage.webpsychology.com/sites/default/files/article_images/shutterstock_84259324.jpg);
  size: cover;
  position: top;
}
#talk .title {
  font-size: 40px;
  margin: 80px 0px 20px 20px;
}
#talk .content {
  font-size: 18px;
  line-height: 1.3;
  max-width: 540px;
}
#talk .options {
  margin-top: 50px;
}
#talk .options li {
  font-size: 14px;
  font-weight: 700;
  margin-bottom: 10px;
  letter-spacing: 2px;
  text-transform: uppercase;
}
#talk .options li span {
  margin-right: 10px;
  color: #3ed1cc;
}

#signup {
  padding: 100px 0px;
}
#signup .slug {
  text-transform: uppercase;
  color: #999;
  text-align: center;
  margin-bottom: 20px;
}
#signup .title {
  font-size: 40px;
  text-align: center;
  margin-bottom: 20px;
}
#signup .content {
  max-width: 640px;
  margin: 0 auto 50px;
  text-align: center;
  line-height: 1.5;
}
#signup .button-wrapper {
  text-align: center;
}
#signup .button-wrapper button {
  outline: none;
  padding: 30px 50px;
  margin: 0px 20px;
  text-transform: uppercase;
  border-radius: 50px;
  background: white;
  color: #3ed1cc;
  border: 2px solid #3ed1cc;
  cursor: pointer;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 2px;
  transition: all ease-in-out 300ms;
}
#signup .button-wrapper button:hover {
  background: #3ed1cc;
  color: white;
}

@media (max-width: 750px) {
  .main-header .app-icons {
    display: none;
  }
  .main-header .nav {
    display: none;
  }
  .main-header .menu {
    display: block;
    font-size: 40px;
    color: white;
    cursor: pointer;
  }
  .main-header .container .logo img {
    width: 40px;
  }
  .main-header .container .logo span {
    font-size: 30px;
    margin-left: 10px;
  }
  .main-header .content .content-wrapper .blob {
    font-size: 40px;
    text-align: center;
  }
  .main-header .content .content-wrapper .button-wrapper {
    justify-content: center;
  }
  .main-header .content .content-wrapper .button-wrapper .button {
    font-size: 10px;
    padding: 20px 10px;
  }

  .footer {
    padding: 10px 0px;
  }
  .footer .col-wrapper {
    display: block;
  }
  .footer .col-wrapper .col-1 {
    width: 90%;
    text-align: center;
    margin-bottom: 20px;
  }
  .footer .col-wrapper .col-1:last-child {
    margin-bottom: 0px;
  }
  .footer .col-wrapper .logo {
    display: block;
  }
  .footer .col-wrapper .logo img {
    width: 50px;
    display: block;
    margin: 0 auto;
  }
  .footer .col-wrapper .logo span {
    font-size: 40px;
  }

  #social-media {
    padding: 0px;
  }
  #social-media .social-wrapper {
    display: block;
    text-align: center;
  }
  #social-media .social-wrapper .slug {
    display: block;
  }
  #social-media .social-wrapper .icons {
    margin: 20px 0px;
  }

  #how-it-works {
    padding: 40px 20px;
  }
  #how-it-works .intro {
    font-size: 20px;
    margin-bottom: 30px;
  }
  #how-it-works .intro span {
    margin-left: 5px;
    font-size: 12px;
  }
  #how-it-works .slug {
    color: black;
    font-size: 14px;
  }
  #how-it-works .title {
    font-size: 30px;
  }
  #how-it-works .content {
    max-width: 360px;
    margin-bottom: 20px;
    font-size: 18px;
  }
  #how-it-works .icon-wrapper {
    display: block;
    width: 100%;
  }
  #how-it-works .icon-wrapper .icon {
    width: 100%;
  }
  #how-it-works .icon-wrapper .icon i {
    font-size: 20px;
    width: 60px;
    height: 60px;
    line-height: 60px;
  }
  #how-it-works .icon-wrapper .icon p {
    font-weight: 300;
  }

  #question {
    padding: 20px 0px 80px;
  }
  #question .title {
    font-size: 30px;
  }
  #question .content {
    max-width: 450px;
    font-size: 16px;
    margin-bottom: 30px;
  }
  #question .form {
    max-width: 360px;
  }
  #question .form input {
    padding: 10px;
  }

  #talk {
    padding: 20px 30px;
  }
  #talk .title {
    margin-top: 20px;
    text-align: center;
    margin-bottom: 10px;
    font-size: 30px;
  }
  #talk .content {
    text-align: center;
    font-weight: 300;
    font-size: 16px;
    line-height: 1.5;
  }
  #talk .col-wrapper {
    display: block;
  }
  #talk .col-wrapper .col-50 {
    width: 100%;
    padding: 20px 0px;
  }
  #talk .col-wrapper .col-50:last-child {
    min-height: 400px;
    padding: 0px 30px;
    background-position: top left;
  }

  #signup {
    padding: 20px;
  }
  #signup .slug {
    font-size: 14px;
    margin-bottom: 10px;
  }
  #signup .title {
    font-size: 30px;
  }
  #signup .content {
    font-size: 14px;
  }
  #signup .button-wrapper button {
    font-size: 12px;
    padding: 20px 20px;
    margin: 0px 5px;
  }
}
</style>
</head>
<body>
    
<section class="main-header">
  <div class="overlay">
    <div class="container">
      <header>
        <div class="logo"><img src="https://images.vexels.com/media/users/3/142777/isolated/preview/84711206e52e0d4ff6c793cb476ea264-heartbeat-star-medical-logo-by-vexels.png" alt=""/><span>Sansa</span></div>
        <div class="nav"><a href="">Blog</a><a href="/register">Register</a><a class="active" href="/login">Login</a></div>
        <div class="menu"><i class="fa fa-bars"></i></div>
      </header>
      <div class="content">
        <div class="content-wrapper">
          <h2 class="blob">Get Answers to medical questions by medical expert, quickly and free.</h2>
          <div class="button-wrapper">
            <div class="button work">How it works<span><i class="fa fa-arrow-down"></i></span></div>
            <div class="button ask">Ask Your First Question</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="how-it-works">
  <div class="container">
    <div class="intro">Are you a doctor or a medical expert?<span>Become an Expert<i class="fa fa-arrow-right"></i></span></div>
    <div class="slug">getting started only takes a minute</div>
    <div class="title">How it does it Work?</div>
    <div class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam esse autem amet, voluptatibus tempora fugiat rem atque vitae deserunt ratione. Quisquam animi vel distinctio, natus laboriosam molestias reiciendis quidem ullam.</div>
    <div class="icon-wrapper">
      <div class="icon"><i class="fa fa-heart"></i>
        <p>Create Medical File</p>
      </div>
      <div class="icon"><i class="fa fa-question"></i>
        <p>Ask Your Question</p>
      </div>
      <div class="icon"><i class="fa fa-comments"></i>
        <p>Talk to an expert</p>
      </div>
      <div class="icon"><i class="fa fa-coffee"></i>
        <p>Have a better life</p>
      </div>
    </div>
  </div>
</section>
<section id="question">
  <div class="title">Ask your Medical Question</div>
  <div class="content">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus aut, error provident fugit expedita autem aliquam! Minus, nam! Ut porro quae blanditiis hic cumque sit itaque ipsa commodi laboriosam. Necessitatibus.</div>
  <div class="form">
    <input type="text" placeholder="My Stomach hurts bad"/><i class="fa fa-arrow-right"></i>
  </div>
</section>
<section id="talk">
  <div class="col-wrapper">
    <div class="col-50">
      <div class="title">Talk to an Expert</div>
      <div class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque optio odio, laudantium a omnis animi aliquid nemo laboriosam ab, reiciendis debitis vitae sequi distinctio dolore quisquam nesciunt sunt pariatur id?</div>
      <div class="options">
        <ul>
          <li> <span><i class="fa fa-check"></i></span>Chat with an expert</li>
          <li> <span><i class="fa fa-check"></i></span>Send photos with your question</li>
        </ul>
      </div>
    </div>
    <div class="col-50"></div>
  </div>
</section>
<section id="signup">
  <div class="slug">Seen enough and reay to get started</div>
  <div class="title">Talk to a medical expert right now!</div>
  <div class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed maxime quasi earum magnam consequuntur sapiente harum, quia itaque at labore. Laudantium, minus assumenda eligendi rerum quaerat nemo ipsam voluptas eum.</div>
  <div class="button-wrapper">
    <button class="highlight">Signup Now</button>
    <button>Contact Us</button>
  </div>
</section>
<section class="footer">
  <div class="container">
    <div class="col-wrapper">
      <div class="col-1">
        <div class="logo"><img src="https://images.vexels.com/media/users/3/142777/isolated/preview/84711206e52e0d4ff6c793cb476ea264-heartbeat-star-medical-logo-by-vexels.png" alt=""/><span>Sansa</span></div>
      </div>
      <div class="col-1">
        <ul>
          <li><a class="header" href="">More info</a></li>
          <li><a href="">About Sansa</a></li>
          <li><a href="">Terms and Condition</a></li>
          <li><a href="">Frequently asked Questions</a></li>
        </ul>
      </div>
      <div class="col-1">
        <ul>
          <li><a class="header" href="">Contact Us</a></li>
          <li><a href="">kofiarhin@gmail.com</a></li>
          <li><a href="">checkout projects</a></li>
        </ul>
      </div>
      <div class="col-1">
        <ul>
          <li><a class="header" href="">Medical Advisor</a></li>
          <li><a href="/login">Login</a></li>
          <li><a href="">Dashboard</a></li>
          <li><a href="">Become one</a></li>
        </ul>
      </div>
    </div>
  </div>
</section>
<section id="social-media">
  <div class="container">
    <div class="social-wrapper">
      <div class="copyright">Copyright © 2016f</div>
      <div class="icons"><i class="fa fa-facebook"></i><i class="fa fa-twitter"></i></div>
      <div class="slug"><span>Made with Love By</span><img src="https://images.vexels.com/media/users/3/142777/isolated/preview/84711206e52e0d4ff6c793cb476ea264-heartbeat-star-medical-logo-by-vexels.png" alt=""/></div>
    </div>
  </div>
</section>
</body>
</html>