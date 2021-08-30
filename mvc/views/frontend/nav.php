<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="/MVP_auctionmarket">Logo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Paintings</a>
                <a class="dropdown-item" href="#">Photographs</a>
                <a class="dropdown-item" href="#">Prints</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/MVP_auctionmarket/product/show/endsoon">End Soon</a>
                <a class="dropdown-item" href="/MVP_auctionmarket/product/show/highbid">High Bids</a>
                <a class="dropdown-item" href="/MVP_auctionmarket/product/show/mostbidded">Most Bidded</a>
            </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="/MVP_auctionmarket/customer">Profile</a>
            </li>
            <?php 
            if(isset($_SESSION['id'])){
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/MVP_auctionmarket/admin/logout'>Log Out</a>";
                echo "</li>";
            }
            ?>
        </ul>
        <form class="d-flex">
            <input class="form-control me-sm-2" type="text" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
    </div>
</nav>