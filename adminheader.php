<header>
    <div class="logo">
        <a href="home.php"><img src="../resources/images/rectangularlogo.png"></a>
    </div>
    <nav>
        <ul>
            <li><a href="analytics.php" class="anractive">Analytics</a></li>
            <li><a href="addemployee.php" class="emplactive">employees</a>
                <div class="sub-menu-records">
                    <ul class="sub-ul">
                        <li class="sub-li"><a class="sub-a" href="addemployee.php" class="addempactive">Add Employee</a></li>
                        <li class="sub-li"><a class="sub-a" href="addprivilege.php" class="addprivactive">Add Privilege</a></li>
                        <li class="sub-li"><a class="sub-a" href="removeprivilege.php" class="remprivactive">Remove Privilege</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="viewcommissions.php" class="comactive">commissions</a>
                <div class="sub-menu-records">
                    <ul class="sub-ul">
                        <li class="sub-li"><a class="sub-a" href="viewcommissions.php" class="vicoactive">View Commissions</a></li>
                        <li class="sub-li"><a class="sub-a" href="calculatewages.php" class="cawaactive">Calculate Wages</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="employeerecords.php" class="ractive">records</a>
                <div class="sub-menu-records">
                    <ul class="sub-ul">
                        <li class="sub-li"><a class="sub-a" href="employeerecords.php" class="Empreactive">Employee Records</a></li>
                        <li class="sub-li"><a class="sub-a" href="customerrecords.php" class="cureactive">Customer Records</a></li>
                        <li class="sub-li"><a class="sub-a" href="billhistory.php" class="bihiactive">Bill History</a></li>
                        <li class="sub-li"><a class="sub-a" href="paymentrecords.php" class="payreactive">Payment records</a></li>
                        <li class="sub-li"><a class="sub-a" href="services.php" class="seractive">Service records</a></li>
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