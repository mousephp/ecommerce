@include('client.layouts.header')
@include('client.layouts.navbar')

{{-- CONTACT --}}
<div class="contact-form">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p>Swing by for a cup of coffee, or leave us a message:</p>
  </div>
  <div class="row contact-form__row">
    <div class="column  contact-form__row--columm">
      <img src="https://www.w3schools.com/w3images/map.jpg" style="width:100%">
    </div>
    <div class="column contact-form__row--columm">
      <form action="">
        <label for="fname" class=" ">First Name</label>
        <input type="text" class=" contact-form__row--input row--text" id="fname" placeholder="Your name..">
        <label for="lname" class="">Last Name</label>
        <input type="text" class=" contact-form__row--input row--text" id="lname"  placeholder="Your last name..">
        <br>
        <label for="email" class="">Email</label>
        <input type="email" class=" contact-form__row--input" id="email" placeholder="Your last email..">
        <br>
        <label for="country">Country</label>
        <select id="country" class="row--text">
          <option value="australia">Vietnamese</option>
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
        </select>
        <label for="subject">Subject</label>
        <textarea id="subject" class="row--text" name="subject" placeholder="Write something.." style="height:170px"></textarea>
        <input type="submit" class="contact-form__row--submit" value="Submit">
      </form>
    </div>
  </div>
</div>
{{-- END CONTACT --}}


@include('client.layouts.footer')
