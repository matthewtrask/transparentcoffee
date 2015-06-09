<div class="row">
    <h1 class="pageHeader text-center">Contact Us!</h1>
</div>

<div class="row">
    <p class="text-center">We are always interested in questions, comments and ideas from others who are interested in promoting transparency within specialty coffee markets. If you are one of these people and have something to share, please contact us using the link below.</p>
</div>


<div class="row">
    <div class="small-3 medium-3 large-3">

    </div>
    <div class="small-6 medium-6 large-6 small-centered medium-centered large-centered columns">
        <form action="" method="POST" data-abide class="custom">
            <div class="row">
                <div class="small-3 large-3 columns">
                    <label for="Name" class="inline">Name:</label>
                </div>
                <div class="small-9 large-9 columns">
                    <input name="Name" class="formInput" type="text" placeholder="Name" for="Name" id="Name" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 large-3 centered columns">
                    <label for="Email" class="inline">Email</label>
                </div>
                <div class="small-9 large-9 centered columns input">
                    <input name="Email" class="formInput" type="text" placeholder="Email" for="Name" id="Name" required>
                </div>
            </div>
            <div class="row">
                <div class="small-3 large-3 centered columns">
                    <label for="Message" class="inline">Message:</label>
                </div>
                <div class="small-9 large-9 centered columns input">
                    <textarea name="Message" class="formInput" type="text" placeholder="Message" for="Message" id="Message" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="small-12 large-12 centered columns">
                    <input id="submitButton" type="submit" value="Submit" class="button expand white-button">
                </div>
            </div>
        </form>
    </div>
    <div class="small-3 medium-3 large-3">

    </div>
</div>


<div class="row">
  <?php print_r($_POST['name']);?>
</div>