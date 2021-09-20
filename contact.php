<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="/endpoints/endpoints.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Maven+Pro:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/components/contact_card/contact_card_styles.css">
    <link rel="stylesheet" href="./components/add_contact/add_contact.css">
    <link rel="stylesheet" href="./pages/contact_page/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
</head>
<body>
  <script type="text/javascrip">
    document.onload = function()
    {
      getVars();
    }
    
</script>
<div>
  <div id="contact-header">
    <text> Contacts </text>
  </div>
  <hr>
  
  <div id="search-div">
      <div id="actions">
      <input placeholder="Search..." id="search"/>
      <button id="addContact" onclick="showAddContact()">
          <text> + </text>
      </button>
    </div>
</div>

<div id="action-div"></div>

<div id="contact-div" class="con">
<div id="something"></div>
<div id="contact-list">
</div></div>

</div>
  
</div>
</body>
</html>