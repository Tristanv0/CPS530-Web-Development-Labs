#!/usr/bin/perl -wT

use warnings;
use CGI ':standard';
use strict;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

my $first_name    = param('firstName');
my $last_name     = param('lastName');
my $street_name   = param('streetName');
my $city          = param('city');
my $postal_code   = param('postalCode');
my $province      = param('province');
my $phone_number  = param('phoneNumber');
my $email         = param('email');
my $upload_dir = "/class-years/y2022/t27cheng/public_html/Lab07imgs";
my $filename = param('photograph');
my $upload_file = File::Spec->catfile($upload_dir, $filename);

open my $upload_fh, '>', $upload_file or die "Cannot open file: $!";
while (my $chunk = upload('photograph')->getline) {
    print $upload_fh $chunk;
}
close $upload_fh;
my $phone_error  = '';
my $postal_error = '';
my $email_error  = '';

if ($phone_number !~ /^\d{10}$/) {
    $phone_error .= "Invalid phone number. ";
}

if ($postal_code !~ /^[A-Za-z]\d[A-Za-z] \d[A-Za-z]\d$/) {
    $postal_error .= "Invalid postal code. ";
}

if ($email !~ /^[^\s@]+@[^\s@]+\.[^\s@]+$/) {
    $email_error .= "Invalid email address. ";
}

print header;
print start_html(
    -title => 'Lab07b',
    -style => {
        'src' => '../Lab07/lab07b.css',
        -code => '
            @import url("https://fonts.googleapis.com/css2?family=Agbalumo&display=swap");
        '
    },
);

print "<div class='center-box'>";
print "<h1>Form Submission: </h1>";
print "<p>First Name: $first_name </p>";
print "<p>Last Name: $last_name </p>";
print "<p>Street Name: $street_name </p>";
print "<p>City: $city </p>";

if ($postal_error) {
    print "<p><span>Postal Code: </span><span class='error'>$postal_code => $postal_error </span></p>";
} else {
    print "<p>Postal Code: $postal_code </p>";
}

print "<p>Province: $province </p>";

if ($phone_error) {
    print "<p><span>Phone Number: </span><span class='error'>$phone_number => $phone_error </span></p>";
} else {
    print "<p>Phone Number: $phone_number </p>";
}

if ($email_error) {
    print "<p><span>Email: </span><span class='error'>$email => $email_error </span></p>";
} else {
    print "<p>Email: $email </p>";
}

print "<p>Photo: </p>";
print "<img src='../Lab07imgs/$filename'>";
print "</div>";

print end_html;



