   <!DOCTYPE html>
<!--
user : Sarah
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
 session_start();
 $_SESSION['user']="sarah";
if (!isset($_SESSION['user']))
{
    header("Location: connexion.php");
}
// On démarre la session AVANT d'écrire du code HTML

$bdd = new PDO ('mysql: host = localhost ; dbname=annonces', 'root','');
if(isset($_SESSION['user']))
{
    $recup = $bdd->prepare("SELECT * FROM annonces WHERE id=1"); 
    $recup->execute(array($_SESSION['user']));
            $donnees = $recup->fetch();
            
            
             if(isset($_POST['creationannonce'])){
                $titre = htmlspecialchars($_POST['titre']);
                $contenu = htmlspecialchars($_POST['contenu']);
                $niveau = htmlspecialchars($_POST['niveau']);
                if(!empty($_POST['titre']) AND !empty($_POST['contenu']) AND !empty($_POST['niveau'])) 
                {
                    $insert = $bdd->prepare("INSERT INTO annonces(titre, contenu, niveau) VALUES (?,?,?)");
                    $insert->execute(array($titre, $contenu,$niveau));
                    
                }
                //header("Location : index.php");
            }
            
?>

<html>
    <head>
        <title>MeetBand</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <script src="jquery.min.js"></script>
  <script src="bootstrap.min.js"></script>
   
  <style>
       *{margin:0;padding:0;}
            footer{position:absolute;bottom:0;width:100%;padding-top:50px;height:50px;}
      input[type="range"] {
    position: relative;
    margin-left: 1em;
}
input[type="range"]:after,
input[type="range"]:before {
    position: absolute;
    top: 1em;
    color: #aaa;
}
input[type="range"]:before {
    left:0em;
    content: attr(min);
}
input[type="range"]:after {
    right: 0em;
    content: attr(max);
}

.item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 15px 0;
}

.item span {
    font-style: normal;
} 
  .navbar {
    padding-top: 15px;
    padding-bottom: 0px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
}

.navbar-nav li a:hover {
    color: #1abc9c !important;
} 
  
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 500px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>



<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
    </br>
    </br>
    </br>
    </br>
    </br>
      <h4>Recherche</h4>
      </br>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Lieu..">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button">
            <span class="glyphicon-search"></span>
          </button>
        </span>
      </div>
      </br>
      
       <form>
        <label for="instruments">Instruments :</label>
    <div class="checkbox">
      <label><input type="checkbox" value="">Guitare</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" value="">Saxophone</label>
    </div>
    <div class="checkbox ">
      <label><input type="checkbox" value="">Chant</label>
    </div>
    <div class="checkbox ">
      <label><input type="checkbox" value="">Batterie</label>
    </div>
    <div class="checkbox ">
      <label><input type="checkbox" value="">Flûte</label>
    </div>
  </form>
  
  <label for="sel1">Niveau de performance:</label>
  <input type="range" value="1" max="5" min="0" step="1"  style="width:85px">
      <br>
      
       
            </br>
            </br>
            </br>
            </br>
            <a href="#" class="btn btn-default btn-lg">
  		      <span class="glyphicon-search"></span> Search
		    </a>
            
    </div>

    <div class="col-sm-9">
    </br>
    </br>
    </br>
    </br>
      <h4><small>Annonces</small></h4>
      <hr>
     
 <p>
    Titre:
</p>   
    
<form action="" method="post">
<p>
   
    <input type="text" name="titre" />
    </br>
    </br>
 <textarea name="contenu" rows="8" cols="45">
Votre annonce ici.
</textarea>
    </br>
    </br>
    
<p> Indiquez votre niveau ou le niveau recherché : </p>

</br>
    
    <select name="niveau">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="4">5</option>
</select>

</br>
    </br>

     <input type="submit" value="Valider" name="creationannonce"/>
     </br>
    
</form>
      
      <hr>

  
     
            
          </div>
        </div>
      </div>
    </div>
 



 
<footer class="container-fluid">
 <h2> Avis </h2>
<div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <h4>"Excellent site!"<br><span style="font-style:normal;">Michael Roe, Vice President, Comment Box</span></h4>
    </div>
    <div class="item">
      <h4>"Un mot... WOW!!"<br><span style="font-style:normal;">John Doe, Salesman, Rep Inc</span></h4>
    </div>
    <div class="item">
      <h4>"J'ai rencontré un très bon chanteur qui est aujourd'huui l'amour de ma vie Zidane !"<br><span style="font-style:normal;">Julie , chanteuse</span></h4>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="fa fa-arrow-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="fa fa-arrow-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> 
</footer>
        
<?php
}
?>
</body>
   </html>

    
 