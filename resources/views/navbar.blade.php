
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark " style="margin-bottom: 20px">
    <a class="navbar-brand" href="{{route('app')}}">CoinGate</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Source code</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">Info</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Currency
                </a>
               <div class="dropdown-menu text-center" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="{{route('setCurrency',['type'=>"USD"])}}">USD</a>
                    <a class="dropdown-item" href="{{route('setCurrency',['type'=>"EUR"])}}">EURO</a>
                    <a class="dropdown-item" href="{{route('setCurrency',['type'=>"BTC"])}}">BTC</a>
                    <a class="dropdown-item" href="{{route('setCurrency',['type'=>"ETH"])}}">ETH</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    My Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="">My Settings</a>
                    <a class="dropdown-item" href="">Cart</a>
                    <a class="dropdown-item" href="">Orders</a>
                    <a class="dropdown-item" href="https://coingate.com/sign_up">Sign Up</a>
                </div>
            </li>
        </ul>
    </div>
</nav>