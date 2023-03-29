<?php
session_start();

if(!isset($_SESSION["username"])) {
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Top Touch Car Wash</title>
    <link rel="stylesheet" type="text/css" href="../resources/css/header.css">
    <link rel="stylesheet" type="text/css" href="../resources/css/admin/home.css">
</head>

<body>
    <?php
    include "../adminheader.php";
    ?>
    <main class="main-container">
        <div class="main-header"><img src="../resources/images/bmwcarwash.jpg"
                alt="a photo of a bmw getting washed in an automatic car wash">
            <p class="company-title">Top Touch Car Wash</p>
            <a href="services.php">
                <p class="view-services-btn">view services</p>
            </a>
        </div>
        <p id="ourvalues-text">Our Values:</p>
        <div class="external-items-container">
            <div class="item-container item-container-1">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                        d="M7 16.488l1.526-.723c1.792-.81 2.851-.344 4.349.232 1.716.661 2.365.883 3.077 1.164 1.278.506.688 2.177-.592 1.838-.778-.206-2.812-.795-3.38-.931-.64-.154-.93.602-.323.818 1.106.393 2.663.79 3.494 1.007.831.218 1.295-.145 1.881-.611.906-.72 2.968-2.909 2.968-2.909.842-.799 1.991-.135 1.991.72 0 .23-.083.474-.276.707-2.328 2.793-3.06 3.642-4.568 5.226-.623.655-1.342.974-2.204.974-.442 0-.922-.084-1.443-.25-1.825-.581-4.172-1.313-6.5-1.6v-5.662zm-1 6.538h-4v-8h4v8zm1-7.869v-1.714c-.006-1.557.062-2.447 1.854-2.861 1.963-.453 4.315-.859 3.384-2.577-2.761-5.092-.787-7.979 2.177-7.979 2.907 0 4.93 2.78 2.177 7.979-.904 1.708 1.378 2.114 3.384 2.577 1.799.415 1.859 1.311 1.853 2.879 0 .13-.011 1.171 0 1.665-.483-.309-1.442-.552-2.187.106-.535.472-.568.504-1.783 1.629-1.75-.831-4.456-1.883-6.214-2.478-.896-.304-2.04-.308-2.962.075l-1.683.699z" />
                </svg>
                <p>Customer Service</p>
            </div>
            <div class="item-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M23.334 11.96c-.713-.726-.872-1.829-.393-2.727.342-.64.366-1.401.064-2.062-.301-.66-.893-1.142-1.601-1.302-.991-.225-1.722-1.067-1.803-2.081-.059-.723-.451-1.378-1.062-1.77-.609-.393-1.367-.478-2.05-.229-.956.347-2.026.032-2.642-.776-.44-.576-1.124-.915-1.85-.915-.725 0-1.409.339-1.849.915-.613.809-1.683 1.124-2.639.777-.682-.248-1.44-.163-2.05.229-.61.392-1.003 1.047-1.061 1.77-.082 1.014-.812 1.857-1.803 2.081-.708.16-1.3.642-1.601 1.302s-.277 1.422.065 2.061c.479.897.32 2.001-.392 2.727-.509.517-.747 1.242-.644 1.96s.536 1.347 1.17 1.7c.888.495 1.352 1.51 1.144 2.505-.147.71.044 1.448.519 1.996.476.549 1.18.844 1.902.798 1.016-.063 1.953.54 2.317 1.489.259.678.82 1.195 1.517 1.399.695.204 1.447.072 2.031-.357.819-.603 1.936-.603 2.754 0 .584.43 1.336.562 2.031.357.697-.204 1.258-.722 1.518-1.399.363-.949 1.301-1.553 2.316-1.489.724.046 1.427-.249 1.902-.798.475-.548.667-1.286.519-1.996-.207-.995.256-2.01 1.145-2.505.633-.354 1.065-.982 1.169-1.7s-.135-1.443-.643-1.96zm-12.584 5.43l-4.5-4.364 1.857-1.857 2.643 2.506 5.643-5.784 1.857 1.857-7.5 7.642z" />
                </svg>
                <p>Integrity</p>
            </div>
            <div class="item-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M3.44 2l-.439-2h17.994l-.439 2h-17.116zm-1.44 3l-.439-2h20.879l-.44 2h-20zm10.099 10.716l.004.283h-5.939l-.048-.292c-.133-.779-.177-1.224.582-1.43.842-.227 1.684-.429 1.168-1.289-1.627-2.546-.849-3.99.634-3.99 1.454 0 2.516 1.39 1.355 3.99-.348.854.5 1.056 1.401 1.289.801.208.834.655.843 1.439zm6.628-4.716h-4.784l-.028 1h4.675l.137-1zm.273-2h-5l-.028.999h4.892l.136-.999zm-.548 4h-4.566l-.029.999h4.459l.136-.999zm-.273 2h-4.351l-.028.999h4.241l.138-.999zm5.821 3h-24l2 6h20l2-6zm-20.625-2l-1.085-8.001h19.411l-1.119 8.001h2.021l1.397-10h-24l1.356 10h2.019z" />
                </svg>
                <p>Accountability</p>
            </div>
            <div class="item-container">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path
                        d="M16 16c0 1.104-.896 2-2 2h-12c-1.104 0-2-.896-2-2v-8c0-1.104.896-2 2-2h12c1.104 0 2 .896 2 2v8zm8-10l-6 4.223v3.554l6 4.223v-12z" />
                </svg>
                <p>Security</p>
            </div>
        </div>
        <div class="address-container">
            <h1>Address:</h1>
            <p>Location: Nyayo Estate before Seasons Hotel </p>
            <p>Email: toptouchcarwash@gmail.com</p>
            <p>cell:(254)701606299</p>
            <p>Nairobi - Kenya</p>
        </div>
    </main>
    <footer>&copy; Copyright 2022 Top Touch Agencies Ltd.</footer>
</body>

</html>