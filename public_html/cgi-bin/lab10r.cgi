#!/usr/bin/ruby -w

require 'cgi'

cgi = CGI.new
city = cgi['city'].capitalize
province = cgi['province'].capitalize
country = cgi['country'].capitalize
image_url = cgi['image_url']

puts "Content-type: text/html\n\n"
puts "<html>"
puts "<head>"
puts "  <title>City Information</title>"
puts "  <style>"
puts "    body { font-family: Arial, sans-serif; padding: 0px; margin: 0px; text-align: center; font-size: 64px; }"
puts "    h1 { color: #E0115F; }"
puts "    p { color: #333; }"
puts "    img { max-width: 100%; height: auto; width: 100vw; }"
puts "    .header { display: flex; align-items: center; justify-content: center; background-color: #D8FFB1; }"
puts "  </style>"
puts "</head>"
puts "<body>"
puts "<div class='header'>"
puts "  <h1>#{city}, #{province}, #{country}</h1>"
puts "</div>"

puts "<img src='#{image_url}' alt='City Image'>"

puts "</body>"
puts "</html>"