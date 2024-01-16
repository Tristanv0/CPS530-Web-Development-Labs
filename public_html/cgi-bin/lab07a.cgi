#!/usr/bin/perl -wT
use CGI ':standard';
use strict;
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print header;

print start_html(
    -title => 'Lab07a',
    -style => {
        'src' => '../Lab07/lab07a.css',
        -code => '
            @import url("https://fonts.googleapis.com/css2?family=Agbalumo&display=swap");
        '
    },
);

print "<h1>This is my first Perl program.</h1>";
print "<p><a href='https://www2.cs.ryerson.ca/~t27cheng/Lab07/lab07b.html'>Lab07 Part B</a></p>";

print end_html;
