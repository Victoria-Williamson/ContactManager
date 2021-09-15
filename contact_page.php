<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="/endpoints/endpoints.js"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/components/contact_card/contact_card_styles.css">
    <link rel="stylesheet" href="/components/edit_contact/edit_contact_styles.css">
    <link rel="stylesheet" href="./pages/contact_page/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>
<div>
<div class="alert">
  <div id="contact-header">
    <text> Contacts </text>
  </div>
  <hr>
  
  <div id="search-div">
      <div id="actions">
      <input id="search"/>
      <button id="addContact" onclick="addContact('Victoria','Williamson','1234567899','something@domain.com')">
          <text> + </text>
      </button>
    </div>
</div>
<!-- <div id="edit-contact-div" class="modify-div"> -->
  <div id="blur">
        <div id="card">
            <div id="contact-image-big">
                <text id="initials"> VW </text>
            </div>
            <div class="form">
                <label for="name">First Name</label>
                <input id="name" type="text" value="" placeholder="John" name="name">
              </div>
              <div class="form">
                <label for="name">Lirst Name</label>
                <input id="name" type="text" value="" placeholder="Doe" name="name">
              </div>
              <div class="form">
                <label for="name">Phone Number</label>
                <input id="name" type="text" value="" placeholder="555-555-5555" name="number">
              </div>
              <div class="form">
                <label for="name">Email</label>
                <input id="name" type="text" value="" placeholder="email@domain.com" name="email">
              </div>
                <div id="modify-buttons">
                   <button id="save"> Save </button>
                   <button id="delete"> Delete </button>
                </div>
                <div id="exit">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 2.01429L17.9857 0L10 7.98571L2.01429 0L0 2.01429L7.98571 10L0 17.9857L2.01429 20L10 12.0143L17.9857 20L20 17.9857L12.0143 10L20 2.01429Z" fill="#919191"/>
                        </svg>                    
                </div>
</div>
        <!-- </div> -->
</div>
<!-- <div id="add-contact-div" class="modify-div">
<?php  include('../../components/add_contact/add_contact.html')?>
</div> -->
<div id="contact-list">
</div>
</div>
  
</div>
</body>
</html>