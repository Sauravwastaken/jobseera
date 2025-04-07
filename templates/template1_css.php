<?php
$realPath = realpath(__DIR__ . '/assets/fonts/EBGaramond');
$fontPath = $realPath ? 'file://' . $realPath : '../assets/fonts/EBGaramond';
?>

@page {
margin:1in;
}


@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-Regular.ttf') format('truetype');
font-weight: 400;
font-style: normal;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-Bold.ttf') format("truetype");
font-weight: 700;
font-style: normal;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-Italic.ttf') format("truetype");
font-weight: 400;
font-style: italic;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-BoldItalic.ttf')
format("truetype");
font-weight: 700;
font-style: italic;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-Medium.ttf') format("truetype");
font-weight: 500;
font-style: normal;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-MediumItalic.ttf')
format("truetype");
font-weight: 500;
font-style: italic;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-SemiBold.ttf') format("truetype");
font-weight: 600;
font-style: normal;
}

@font-face {
font-family: "EBGaramond";
src: url('<?= $fontPath ?>/EBGaramond-SemiBoldItalic.ttf')
format("truetype");
font-weight: 600;
font-style: italic;
}


body, p, h1, h2, h3, h4, h5, h6, ul, ol, li, div, a, table, td, th {
margin: 0;
padding: 0;
box-sizing: border-box;
}

body {
font-family: "EBGaramond", "sans-serif";
line-height: 1;

}

a {
color: black;
}

.debug {
border: 2px solid red;
}

.no-page-break {
page-break-inside: avoid;
break-inside: avoid;
}

.font-bold {
font-weight: 700;
}

.w-full {
width: 100%;
}

.align-top {
vertical-align: top;
}

.text-right {
text-align: right;
}

.ml-4 {
margin-left: 2em;
}

.text-lg {
font-size: 18px;
}

.heading {
font-size: 18.72px;
font-weight: 700;
margin-top:4px;
}

.sub-heading {
font-size: 14.72px;
font-weight: 700;
}

.text-base {
font-size: 14.72px;
}