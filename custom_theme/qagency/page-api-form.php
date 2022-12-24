<?php
/*
    Template Name: API FORM
 */
if(isset($_COOKIE['q_token_key'])) {
  header('Location: /profile');
} else{
    get_header();
?>  
  <div class="container">
    <form id="api-login" method="POST">
      <div class="form-group">
        <label for="emailLogin">Email address</label>
        <input type="email" name="email" class="form-control" id="emailLogin" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="passwordLogin">Password</label>
        <input type="password" name="password" class="form-control" id="passwordLogin" placeholder="Password">
      </div>
      <div class="g-recaptcha" data-sitekey="6LdZy6MjAAAAAHR5H3xrBzCMCRbVU88ewTTPXdET"></div>
      <br/>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://www.google.com/recaptcha/api.js"></script>


  </div>
<?php
    
    get_footer();
  }