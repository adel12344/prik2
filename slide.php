<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database is hosted elsewhere
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "mysql"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the comments table exists, if not, create it
$table_check_query = "SHOW TABLES LIKE 'comments'";
$table_check_result = $conn->query($table_check_query);

if ($table_check_result->num_rows == 0) {
    // Table doesn't exist, create it
    $create_table_query = "CREATE TABLE comments (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        comment TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($create_table_query) === TRUE) {
        echo "Table 'comments' created successfully.<br>";
    } else {
        echo "Error creating table: " . $conn->error . "<br>";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $comment = htmlspecialchars($_POST['comment']);

    // Prepare SQL statement to insert comment
    $stmt = $conn->prepare("INSERT INTO comments (email, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $comment);

    // Execute the statement
    $stmt->execute();

    // Close statement
    $stmt->close();
}

// Read existing comments
$sql = "SELECT email, comment FROM comments";
$result = $conn->query($sql);

$comments = "";
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $comments .= "Email: " . $row["email"] . "<br>Comment: " . $row["comment"] . "<br><br>";
    }
} else {
    $comments = "No comments yet.";
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/slide/slide.css" />
</head>

<body>
    <header>
        <h1 id="logo">img+NAME</h1>

        <button id="openNav" onclick="openNav()">
            <img class="imgg"
                src="png-transparent-hamburger-button-computer-icons-menu-navigation-angle-white-text-thumbnail.png"
                width="30" height="30" style="position: absolute; top: 5px; left: 5px" />
        </button>
        <nav>
            <button id="close-nav" onclick="closeNav()">
                <svg fill="#ffffff" height="30px" width="30px" version="1.1" id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 460.775 460.775" xml:space="preserve">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path
                            d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z">
                        </path>
                    </g>
                </svg>
            </button>
            <h2>NOM PRENOM</h2>
            <h2>EMAIL</h2>
            <h2>MATRICULE</h2>
            <div>
                <a href="">ARTICLE1</a>
                <a href="">ARTICLE2</a>
                <a href="">ARTICLE3</a>
            </div>
        </nav>
        <div id="overlay" onclick="closeNav()"></div>

        <div class="carousel">
            <div class="carousel-inner">
                <img class="carousel-item" src="https://cdn.takeoutcentral.com/restlogos/rest839menu_hero32.jpg"
                    alt="" />

                <img class="carousel-item"
                    src="https://www.hotelterrano.cl/wp-content/uploads/2021/10/top-restaurant-hotel.jpg" alt="" />

                <img class="carousel-item"
                    src="https://www.jimprimeenfrance.fr/Content/images/landing-page/bandeaux-titre/imprimeur-restauration.jpg"
                    alt="" />
            </div>
            <div class="carousel-controls">
                <button class="carousel-control prev">&lt;</button>
                <button class="carousel-control next">&gt;</button>
            </div>
        </div>
    </header>

    <h1 id="titre">Bienvenu dans notre École</h1>

    <main>
        <section id="articles">
            <div class="article">
                <h2>Introduction</h2>
                <div class="article-content">
                    <h3>
                        Bienvenue à la formation "Exploration de l'univers culinaire" !
                        Cette formation est conçue pour vous plonger dans le monde
                        fascinant de la nourriture, où chaque saveur, chaque ingrédient et
                        chaque technique de cuisine racontent une histoire unique. Au
                        cours de cette session, nous allons explorer les fondements de la
                        gastronomie, découvrir les secrets des cuisines du monde entier,
                        et apprendre à transformer des ingrédients simples en plats
                        extraordinaires.
                    </h3>
                    <img width="300px" src="about us/1700920871203.jpg" alt="" />
                </div>
            </div>

            <div class="article">
                <h2>Objectifs de la formation</h2>
                <div class="article-content">
                    <h3>
                        <ol>
                            <li>
                                Comprendre les bases de la gastronomie et de l'art culinaire.
                            </li>
                            <li>
                                Explorer les différentes cuisines régionales à travers le
                                monde.
                            </li>
                            <li>
                                Maîtriser les techniques de préparation et de cuisson des
                                aliments.
                            </li>
                            <li>
                                Développer votre créativité en cuisine et apprendre à
                                improviser.
                            </li>
                            <li>
                                Apprendre à apprécier la diversité des saveurs et des
                                textures.
                            </li>
                        </ol>
                    </h3>
                    <img width="400px" src="about us/YlKJRdlVRgehVg8JX1fDzg.png" alt="" />
                </div>
            </div>

            <article>

                <div>
                    <h2>formation Art culinaire</h2>
                    <p>
                        Bienvenue à notre formation en art culinaire, où la passion pour
                        la cuisine rencontre l'expertise technique. Que vous soyez un
                        amateur enthousiaste ou un professionnel cherchant à perfectionner
                        vos compétences, cette formation est conçue pour vous inspirer,
                        vous enseigner et vous guider à travers les merveilles de la
                        gastronomie
                    </p>
                    <h4>Plus d'infos: <a href="blwa.html">ici</a></h4>
                </div>
            </article>
            <article>
                <a href="clwa.html"><img width="200px" src="ramen.webp" alt="" /></a>
                <div>
                    <h2>cuisine japonaise</h2>
                    <p>
                        La cuisine japonaise est fraîche, équilibrée et joliment
                        présentée. Des sushis aux ramens, elle offre une grande variété de
                        plats délicieux. Les ingrédients sont frais et préparés avec soin
                        pour éveiller vos papilles. C'est une cuisine où l'attention à la
                        présentation est importante. Que vous aimiez les sushis ou les
                        plats chauds comme les ramens, la cuisine japonaise est une
                        expérience culinaire délicieuse à découvrir.
                    </p>
                    <h4>Plus d'infos: <a href="clwa.html">ici</a></h4>
                </div>
            </article>
            <article>
                <a href="alwa.html"><img width="200px" src="7lwa.jpg" alt="" /></a>
                <div>
                    <h2>Formation en pâtisserie classique</h2>
                    <p>
                        La pâtisserie, c'est l'art de créer des desserts délicieux. Des
                        gâteaux aux biscuits en passant par les tartes, chaque recette est
                        une explosion de saveurs sucrées. Que vous aimiez décorer des
                        gâteaux ou préparer des petits gâteaux pour une fête, la
                        pâtisserie offre une multitude de possibilités créatives. C'est un
                        monde sucré où chacun peut exprimer sa créativité et régaler ses
                        papilles.
                    </p>
                    <h4>Plus d'infos: <a href="alwa.html">ici</a></h4>
                </div>
            </article>
        </section>

        <aside>
            <h1>THIS IS AN AD</h1>
            <div id="carousel2" class="carousel">
                <div class="carousel-inner2">
                    <div class="carousel-item2">
                        <img width="70%"
                            src="https://static.vecteezy.com/system/resources/previews/011/297/521/original/promotion-30-number-percent-png.png"
                            alt="Image 1" />
                        <div class="carousel-description">
                            Formation Art Culinaire - 30% de réduction
                        </div>
                    </div>
                    <div class="carousel-item2">
                        <img width="70%"
                            src="https://static.vecteezy.com/system/resources/previews/011/288/009/original/promotion-50-number-percent-png.png"
                            alt="Image 2" />
                        <div class="carousel-description">
                            Cuisine Japonaise - 50% de réduction
                        </div>
                    </div>
                    <div class="carousel-item2">
                        <img width="70%"
                            src="https://static.vecteezy.com/system/resources/previews/008/880/262/non_2x/discount-70-percent-red-offer-in-3d-png.png"
                            alt="Image 3" />
                        <div class="carousel-description">
                            Formation en Pâtisserie Classique - 70% de réduction
                        </div>
                    </div>
                </div>
                <div class="carousel-controls2">
                    <button class="carousel-control2 prev2">&lt;</button>
                    <button class="carousel-control2 next2">&gt;</button>
                </div>
            </div>
        </aside>

        <footer>
            <h1>Leave a comment</h1>
            <div id="comments">
                <h2>Comments</h2>
                <pre><?php echo $comments; ?></pre>
            </div>
            <form action="slide.php" method="POST">
                <div>
                    <label for="email">Email</label>
                    <input placeholder="Ajouter votre email" type="email" id="email" name="email" required />
                </div>
                <div>
                    <label for="comment">Comment</label>
                    <textarea placeholder="Entrez votre commentaire ici" name="comment" id="comment"
                        required></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </footer>
    </main>
    <script src="script.js"></script>
</body>

</html>