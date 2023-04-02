<!DOCTYPE html>
<html>
  <head>
    <title>Contact</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/contact.css">
  </head>
  <body>
  <img class="bg-img" src="images/bg-5.jpeg" alt="">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-lg-8">

				<form class="contact-form" action="https://formsubmit.co/shaikat3257@gmail.com" method="post">
                <h2>Let Us Know Anything</h2>
					<div class="form-group mb-4">
						<input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
					</div>

					<div class="form-group mb-4">
						<input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
					</div>

					<div class="form-group mb-4">
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Your Phone Number" required>
					</div>

					<div class="form-group mb-4">
						<textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message.." required></textarea>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary btn-lg">Send Message</button>
					</div>
                    <!--<div class="success-message"></div>
                    <div class="error-message"></div>-->

				</form>

			</div>
		</div>
	</div>

	<!-- Bootstrap 5 JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


