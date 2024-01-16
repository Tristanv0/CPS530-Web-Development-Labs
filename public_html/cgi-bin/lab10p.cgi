#!/usr/bin/env python

import cgi

form = cgi.FieldStorage()

img = form.getvalue('image_url', '')

country = form.getvalue('country', '').upper()

if 'province' in form:
  province = form.getvalue('province', '').upper()
else:
  province = ""

city = form.getvalue('city', '').upper()

print "Content-type: text/html\n\n"

print """
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CGI/Python</title>
  <style>
    body {{
        font-family: Arial, sans-serif;
        padding: 0;
        margin: 0;
        }}
        .title {{
        text-align: center;
        font-size: 60px;
        background-color: #AFF8DB; 
        color: #3a3b3c;
        }}
        .img-container {{
        width: 80%;
        margin: 20px auto;
        border: 10px solid #AFF8DB;
        }}
        img {{
        width: 100%;
        height: auto;
        display: block;
        }}
  </style>
</head>
<body>
    <div class="title">
    {0}, {1}
    </div>
    <div class="img-container">
        <img src='{2}' alt="image of city">
    </div>
</body>
</html>
""".format(city, country, img)