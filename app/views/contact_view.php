<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 23.03.2016
 * Time: 19:44
 */
?>
<h3>Type your message bellow and we'll get back to you !</h3>
<p><?php echo $this->message;?></p>


    <form class="contact-form" role="form" action="/blog_scoala/Contact/sendMessage/" method="POST">
        <div class="form-group">
            <label> To: </label>
            <input type="text" class="form-control" name="receiver" placeholder="AUTHOR to receive message">
        </div>
        <div class="form-group">
            <label>Your email here :</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Your message here :</label>
            <textarea name="body" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit">Send Message</button>
        </div>
    </form>

