<?php
include "../../config/config.php";
include "../../template/header.php";
include "../../template/menu.php";

check_login();

?>
<br>
<br>
<br>
<h2 class="text-center mb-4">Contact Us</h2>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="custom-container">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <i class="bi bi-geo-alt contact-icon"></i>
                            <p>123 Music Street, Melody City</p>
                        </div>
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <i class="bi bi-telephone contact-icon"></i>
                            <p>+1 (555) 123-4567</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <i class="bi bi-envelope contact-icon"></i>
                            <p>info@musicshop.com</p>
                        </div>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d21426.192003806085!2d99.39575704603203!3d18.317542718002187!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30d96f264a1dd1f9%3A0xf0346c6d9b33150!2z4Lih4Lir4Liy4Lin4Li04LiX4Lii4Liy4Lil4Lix4Lii4LiY4Lij4Lij4Lih4Lio4Liy4Liq4LiV4Lij4LmMIOC4qOC4ueC4meC4ouC5jOC4peC4s-C4m-C4suC4hw!5e0!3m2!1sth!2sth!4v1724481257101!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
<?php
include "../../template/footer.php";
?>