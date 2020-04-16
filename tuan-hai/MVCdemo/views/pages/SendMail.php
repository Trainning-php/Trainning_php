<div class="container">
    <div class="row">
        <div class="col-md-4">
            <form method="POST" class="form_sendmail" id="form_sendmail" action=" index.php?&Controller=PDOhome&action=sendmail" id="form_sendmail">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Enter email" name="email" id="email">
                </div>
                  <div class="form-group">
                    <label for="exampleInputPhone">Subject</label>
                    <input type="text" class="form-control"  placeholder="Subject" name="subject" id="subject">
                </div>
                <div class="form-group">
                	<label for="exampleInputcomment">Comment</label>
                	<textarea name="comment" class="form-control" id="comment"></textarea>
                </div>
                <input type="submit" name="sendMail" id="sendMail" value="sendmail">
            </form>
        </div>
    </div>
</div>