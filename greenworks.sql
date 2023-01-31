-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 26 juin 2022 à 17:39
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cc2_tarikb`
--

-- --------------------------------------------------------

--
-- Structure de la table `greenworks`
--

CREATE TABLE `greenworks` (
  `idGreen` int(11) NOT NULL,
  `id_User_Green` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `ingredients` varchar(250) NOT NULL,
  `etapes` varchar(1000) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `greenworks`
--

INSERT INTO `greenworks` (`idGreen`, `id_User_Green`, `title`, `ingredients`, `etapes`, `image`, `date_creation`) VALUES
(3, 1, 'LES BOÎTES DE CÉRÉALES', '1-Boites de céréales\r\n2-Ciseaux\r\n3-Imagination', 'À moins que toute votre cuisine soit passée en mode zéro déchets, les boîtes de céréales font partie de votre quotidien. Saviez-vous qu’il était possible de créer du matériel original avec ce carton rigide? Avec un peu d’imagination et quelques talents de base en bricolage, vous pourrez créer de jolies pochettes ou bac de rangement. Parfait pour les enfants, c’est un bricolage de récupération assez amusant!', '619252832.png', '2022-06-24 22:07:06'),
(4, 2, 'LES VIEUX JEANS', '1-Jeans\r\n2-Ciseaux\r\n', 'Le jeans est un matériel résistant et surtout très populaire! Pourquoi ne pas le recycler? Pensez à envoyer vos vieux jeans aux banques vestimentaires ou encore de vous en servir pour des projets de bricolage. Le jeans peut servir à recouvrir des objets comme des pots à crayon, à fabriquer des petits sacs à main, fabriquer des petits coussins décoratifs, ou encore de magnifiques petits sacs à lunch! Bref, c’est un matériel multi-usage, soyez originaux dans votre façon de récupérer vos vieux jeans! ', '723659713.png|||588345671.png', '2022-06-25 15:40:18'),
(5, 5, 'Les capsules Nespresso', '1-Capsules nesspresso\r\n2-Ciseaux', ' En toute simplicité, vous pourrez faire ramasser vos capsules gratuitement via UPS. Outre ce programme, il est aussi possible de recycler vos capsules à une boutique ou un point de collecte ou encore de créer des projets comme l’exemple plus haut. Ces mignons petits pots pour jeunes pousses sont faciles à faire, incluant le support. Une bonne idée!', '111557078.png', '2022-06-25 15:42:48'),
(6, 5, 'LES BOÎTES DE LIVRAISON', '1-Boites\r\n2-Ciseaux', 'Puisque les commandes en ligne ont pris de l’importance dans les dernières années, les boîtes de carton reçues à la maison s’accumulent. Avant de les déposer systématiquement au bac de récupération, pensez à créer différents électroménagers pour les enfants. Vous pourrez même utiliser vos restants de peinture pour peindre les détails sur vos créations. Un beau projet à faire en famille!', '120396351.png', '2022-06-25 15:44:19'),
(7, 5, 'LES VIEUX PNEUS', '1-Pneus\r\n2-Imagination', 'Les pneus hors d’usage sont nombreux et ne cesseront de croitre puisque l’industrie automobile est là pour rester. Plusieurs programmes ont été mis en place par le gouvernement pour stimuler le recyclage et d’autres continuent de voir le jour. Un exemple : le programme québécois de gestion intégrée des pneus hors d’usage 2015-2020, qui fait partie des initiatives responsables et essentielles. Outre ces initiatives, vous pouvez user d’imagination pour réutiliser vos vieux pneus comme dans l’exemple ci-dessus. La création de poufs conçus à partir de pneus est une idée pratique et surtout esthétique. Une belle façon d’embellir le décor de votre terrasse extérieure à petit prix.', '573703530.png', '2022-06-25 16:01:04'),
(8, 5, 'LES CONTENANTS DE PLASTIQUE', '1-Contenants de plastique\r\n2-Imagination', 'Votre avez de la difficulté à garder votre établi en ordre? Utilisez des contenants de plastique pour y mettre de l’ordre! Vissez simplement le couvercle des chacun des contenants à une planche de bois. Vous n’aurez qu’à classer tous les petits objets comme les vis ou les clous qui encombrent votre surface de travail.', '770302053.png', '2022-06-25 16:04:06'),
(9, 1, 'LES POTS MASSON', '1-Pots Masson\r\n2-Imagination', 'Voilà on objet que l’on accumule en grande quantité dans le garde-manger.Pour transformer cet objet du quotidien en quelque chose d’utile, pensez jardinage ou contenant à plantes!', '625319005.png', '2022-06-25 16:05:34'),
(10, 1, 'LES CONSERVES', '1-Conserves\r\n2-Imagination', 'Les conserves font partie de notre quotidien. Notre garde-manger en est rempli! Le réflexe veut que lorsqu’elle est vide, on la rince pour ensuite la déposer dans le bac à récupération. C’est une excellente habitude, mais avec un peu de créativité, on peut réutiliser facilement les conserves. Celles-ci, une fois décorées, font d’excellents rangements pour les crayons, les petits articles de bricolage, les ustensiles ou autres. Avec un peu de créativité, vous pourriez les rendre utiles!', '969704909.png', '2022-06-25 16:06:51'),
(11, 1, 'LES ROULEAUX DE PAPIER DE TOILETTE', '1-Rouleaux de papier de toilet\r\n2-Imagination', ' Si jamais l’envie vous dit de bricoler avec les enfants, ou si vous avez un projet qui inclut des éléments décoratifs, penser à récupérer et réutiliser vos rouleaux de papier de toilette ou essuie-tout. C’est fou ce qu’on peut faire avec ces simples rouleaux! Des petites boîtes cadeaux, des chapeaux de fête pour enfants… même des contenants pour les boutures ou les semis comme dans l’exemple ci-dessus! ', '112990067.png|||973249792.png', '2022-06-25 16:12:41'),
(12, 2, 'LES BOUCHONS ET BOUTEILLES EN PLASTIQUE', '1-Bouchons ou bouteilles en plastique\r\n2-Imagination', 'Pour attirer les oiseaux à la maison, rien de plus simple! Ajouter des graines à une bouteille de plastique lavée à laquelle vous avez ajouté un crochet et un perchoir. Si vous êtes plutôt amateur de peinture ou jeune peintre en herbe, ce petit projet est simple et fantastique! Récupérez les vieux bouchons de bouteille et accumulez-les pour fabriquer une palette pour la peinture. Toujours utile pour la création d’une potentielle œuvre d’art, qui sait!? Une belle façon de réutiliser les bouchons.', '67800109.png|||927990042.png', '2022-06-25 16:29:21'),
(13, 2, 'LES BOUCHONS DE LIÈGE', '1-Bouchons de lièges\r\n2-Imagination', 'Un bon moyen de récupérer les bouchons de liège résultant de vos nombreuses soirées de dégustations de vins entre amis est de les utiliser pour concevoir un support à téléphone intelligent. Une idée non seulement esthétique, mais très pratique pour déposer votre cellulaire. Plusieurs autres projets sont possibles, comme la fabrication d’un babillard en bouchons de liège par exemple! Vous en voulez encore plus? Essayez de créer un tapis de douche en liège. En plus d’être confortable, il sera fait de matière recyclée à 100%.', '205298508.png|||536120946.png|||678297053.png|||596422579.png', '2022-06-25 16:31:38'),
(14, 2, 'LES BOUTEILLES DE SHAMPOING', '1-Bouteilles de shampoing\r\n2-Imagination', 'Ces petits monstres de plastique sont très pratiques pour ranger les crayons et accessoires de bricolage. Croyez-le ou non, ils ont été conçus à partir de bouteilles de shampoing vides. Suivez le lien en dessous de l’image pour savoir comment réaliser ce projet tout simple, mais ô combien amusant et utile!', '977846409.png', '2022-06-25 16:32:27'),
(15, 1, 'LES ÉPINGLES À LINGE', '1-Epingles à linge\r\n2-Imagination', 'Avec un peu d’imagination, on peut fabriquer une foule d’objets décoratifs et pratiques à partir d’épingles à linge. Vous n’avez plus de corde à linge ou vous avez trop d’épingles pour l’espace disponible? Prenez une petite boîte de conserve ou un petit contenant en plastique et accrochez des épingles tout le tour pour créer des petits pots à fleurs comme dans l’image ci-haut ou même des petits chandeliers!', '203510028.png', '2022-06-25 16:34:27'),
(16, 1, 'LES CINTRES EN MÉTAL', '1-Cintres en metal\r\n2-Imagination', 'Vos vieux cintres en métal inutilisés peuvent avoir plusieurs usages autres que servir de supports à linge. Une belle façon de les réutiliser est de les transformer en support à revue. Une fois bien disposés, ils s’agenceront très joliment à votre décor, comme dans l’image ci-dessus par exemple. Facile à réaliser et pratique!', '137097980.png', '2022-06-25 16:35:06'),
(17, 1, 'LES CONSERVES DE CAFÉ', '1-Les conserves de café\r\n2-Imagination', 'Avec son couvercle, une conserve vide de café peut faire des miracles. Comme l’image le démontre, transformez-la en distributeur de sacs à poubelle avec seulement un peu de peinture. Fini les boîtes de sacs à poubelle qui prennent beaucoup trop d’espace… En plus d’être pratique, avouez que c’est indéniablement plus beau!', '54164039.png', '2022-06-25 16:36:58'),
(18, 1, 'DES T-SHIRTS', '1-T-shirts\r\n2-Imagination', 'Vous avez des vêtements troués ou trop usés pour être donné au suivant? Voici une bonne idée pour les transformer en collier ou bracelet. Tressez simplement des morceaux de tissu de la grandeur et couleur désirée et le tour est joué!', '325653335.png', '2022-06-25 16:40:16'),
(19, 1, 'LES CONTENANTS DE LAIT OU BOISSON DE SOYA', '1-Contenants de lait\r\n2-Imagination', 'Parfaits pour contenir le matériel de bricolage, les contenants de lait ou boisson de soya peuvent être transformés en jolis contenants. Peinturez-les simplement (avec vos restants de peinture!) et ajoutez de petites décorations. Demandez aux enfants de les personnaliser. Ils pourront ensuite y déposer tout le matériel nécessaire pour compléter leur coin devoir à la maison.', '254269416.png', '2022-06-25 16:55:57');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_User` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_User`, `nom`, `prenom`, `email`, `login`, `password`) VALUES
(1, 'tarik', 'bouchaala', 'tarikbouchaala@gmail.com', 'tarik123', '12345678'),
(2, 'tarik', 'ef', 'tarik@gmail.com', 'tarik1234', '12345678'),
(5, 'tarik', 'ef', 'tariktest@gmail.com', 'tariktest', '12345678');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `greenworks`
--
ALTER TABLE `greenworks`
  ADD PRIMARY KEY (`idGreen`),
  ADD KEY `fk_idGreen_id_User_greenworks` (`id_User_Green`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `greenworks`
--
ALTER TABLE `greenworks`
  MODIFY `idGreen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `greenworks`
--
ALTER TABLE `greenworks`
  ADD CONSTRAINT `fk_idGreen_id_User_greenworks` FOREIGN KEY (`id_User_Green`) REFERENCES `users` (`id_User`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
