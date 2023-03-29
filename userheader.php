<header>
    <div class="logo">
        <a href="home.php"><img src="../resources/images/rectangularlogo.png"></a>
    </div>
    <nav>
        <ul>
            <li><a href="user_services.php" class="sactive">services</a></li>
            <li><a href="billing.php" class="bactive">billing</a></li>
            <li><a href="customerrecords.php" class="ractive">records</a>
                <div class="sub-menu-records">
                    <ul class="sub-ul">
                        <li class="sub-li"><a class="sub-a" href="customerrecords.php" class="cactive">Customer
                                Records</a></li>
                        <li class="sub-li"><a class="sub-a" href="billinghistory.php" class="biactive">Billing
                                History</a></li>
                    </ul>
                </div>
            </li>
            <li><a class="logout" href="../logout.php">log out</a></li>
        </ul>
    </nav>
    <p>
        <?php  echo "<p class='username'>Active User: " . $_SESSION["username"]. "</p>"?>
    </p>
</header>