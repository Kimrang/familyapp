<?php
    echo 
    "
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playwrite+CA:wght@100..400&display=swap');

            .great-vibes-regular {
                font-family: \"Great Vibes\", cursive;
                font-size: 2.3em;
                font-weight: 400;
                font-style: normal;
            }
        </style>

        <header class=\"navbar shadow-sm d-flex justify-content-between align-items-baseline p-3 border\">
            <div class=\"navbar-brand great-vibes-regular\">
                <a href=\"home.php\">
                    MyFamily
                </a>
            </div>
            <nav class=\"navbar-nav\">
                <ul class=\"d-flex p-0\">
                    <li class=\"mx-5\">
						<a href=\"home.php\" title=\"Home\">
							<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-house-heart\" viewBox=\"0 0 16 16\">
                                <path d=\"M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982\"/>
                                <path d=\"M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z\"/>
                            </svg>
						</a>
					</li>
                    <li class=\"mx-5\">
						<a href=\"gallery.php\" title=\"Gallery\">
							<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-camera\" viewBox=\"0 0 16 16\">
                                <path d=\"M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z\"/>
                                <path d=\"M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0\"/>
                            </svg>
						</a>
					</li>
                    <li class=\"mx-5\">
                        <a href=\"messages.php\" title=\"Messages\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-chat-dots\" viewBox=\"0 0 16 16\">
                                <path d=\"M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2\"/>
                                <path d=\"m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2\"/>
                            </svg>
                        </a>
                    </li>
                    <li class=\"mx-5\">
                        <a href=\"profile.php\" title=\"Profile\">
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"currentColor\" class=\"bi bi-person-circle\" viewBox=\"0 0 16 16\">
                                <path d=\"M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0\"/>
                                <path fill-rule=\"evenodd\" d=\"M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1\"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
    ";
?>