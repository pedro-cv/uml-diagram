<section id="contact" class="contact section-bg">
    <div class="container">

        <div class="section-title" data-aos="fade-up">
            <h2>Contactanos</h2>
        </div>

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
                <div class="info">
                    <div class="address">
                        <i class="icofont-google-map"></i>
                        <h4>Location:</h4>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>

                    <div class="email">
                        <i class="icofont-envelope"></i>
                        <h4>Email:</h4>
                        <p>focus@enterprise.com</p>
                    </div>

                    <div class="phone">
                        <i class="icofont-phone"></i>
                        <h4>Call:</h4>
                        <p>+591 551 5548 552</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d748.4587967664854!2d-63.19545732804706!3d-17.77622015898616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e7fd905c1d73%3A0x4f31e8b222580b58!2sFacultad%20FICCT!5e0!3m2!1ses!2sbg!4v1665380245646!5m2!1ses!2sbg"
                        frameborder="0" style="border:0; width: 100%; height: 290px;"
                        allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                <form action="{{asset('forms/contact.php')}}" method="post" role="form" class="php-email-form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Tu nombre</label>
                            <input type="text" name="name" class="form-control" id="name"
                                data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                            <div class="validate"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="name">Tu Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                data-rule="email" data-msg="Please enter a valid email" />
                            <div class="validate"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Motivo</label>
                        <input type="text" class="form-control" name="subject" id="subject"
                            data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                        <div class="validate"></div>
                    </div>
                    <div class="form-group">
                        <label for="name">Mensaje</label>
                        <textarea class="form-control" name="message" rows="10" data-rule="required"
                            data-msg="Please write something for us"></textarea>
                        <div class="validate"></div>
                    </div>
                    <div class="mb-3">
                        <div class="loading">Loading</div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
                </form>
            </div>

        </div>

    </div>
</section>